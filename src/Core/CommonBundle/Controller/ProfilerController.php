<?php

/*
 * This file is part of the Doctrine Bundle
 *
 * The code was originally distributed inside the Symfony framework.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 * (c) Doctrine Project, Benjamin Eberlei <kontakt@beberlei.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\CommonBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Response;

//use Doctrine\Bundle\DoctrineBundle\Controller\ProfilerController as ProfController;
/**
 * ProfilerController.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ProfilerController extends ContainerAware
{
    /**
     * Renders the profiler panel for the given token.
     *
     * @param string $token The profiler token
     * @param string $connectionName
     * @param integer $query
     *
     * @return Response A Response instance
     */
    public function totalAction($token, $connectionName, $query)
    {
        /** @var $profiler \Symfony\Component\HttpKernel\Profiler\Profiler */
        $profiler = $this->container->get('profiler');
        $profiler->disable();

        $profile = $profiler->loadProfile($token);
        $queries = $profile->getCollector('db')->getQueries();

        if (!isset($queries[$connectionName][$query])) {
            return new Response('This query does not exist.');
        }

        $query = $queries[$connectionName][$query];
        if (!$query['explainable']) {
            return new Response('This query cannot be explained.');
        }

        /** @var $connection \Doctrine\DBAL\Connection */
        $connection = $this->container->get('doctrine')->getConnection($connectionName);
        try {
            $startProfiling = $connection->executeQuery('SET profiling = 1');
            $results = $connection->executeQuery('EXPLAIN '.$query['sql'], $query['params'], $query['types'])
                ->fetchAll(\PDO::FETCH_ASSOC);
            $getProfiling = $connection->executeQuery('show profile for query 1')->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return new Response('This query cannot be explained.');
        }

        $total = 0;
        foreach($getProfiling as $data) {
            if (isset($data['Duration'])) {
                $total += $data['Duration'];
            }
        }
        return $this->container->get('templating')->renderResponse('CoreCommonBundle:Collector:total.html.twig', array(
            'data'  => $getProfiling,
            'query' => $query,
            'total' => $total
        ));
    }
    /*
    public function odmtotalAction($token, $query, $currentBase = '365domains') {
        
        $profiler = $this->container->get('profiler');
        $profiler->disable();

        $profile = $profiler->loadProfile($token);
        $queries = $profile->getCollector('mongodb')->getQueries();

        if (!isset($queries[$query])) {
            return new Response('This query does not exist.');
        }

        $query = str_replace(';','.explain();',$queries[$query]);


        $connection = $this->container->get('doctrine_mongodb')->getConnection();
        $mongo = $connection->getMongo();
        if(!$mongo){
            $connection->connect();
            $mongo = $connection->getMongo();
        }
        $db = $mongo->selectDB($currentBase);

        $result = $db->execute('return db.orders.find().limit().skip().sort({ "_id": -1 }).explain();');
        //$result = $db->command(array('$eval' => 'return db.orders.find().limit().skip().sort({ "_id": -1 }).explain();'));

        $data = (isset($result['retval'])) ? $result['retval'] : array();

        return $this->container->get('templating')->renderResponse('CoreCommonBundle:Collector:odm_total.html.twig', array(
            'data' => $data,
            'query' => $query,
        ));
    }
     * 
     */
}
