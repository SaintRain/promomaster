<?php

namespace Core\DynamicBindingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Query\ResultSetMapping;
use Core\DynamicBindingBundle\Entity\Binding;

class AjaxController extends Controller
{
    public function testAction()
    {
        //$date = time() - 24 * 60* 60;
        $em = $this->getDoctrine()->getManager();
        //$rsm = new ResultSetMapping();
        //$orders = $em->getRepository('CoreOrderBundle:Order')->findForAskForReview($date);
        //ldd($orders);
        //ldd($orders[0]->getId());
        //$query = $em->createNativeQuery('SELECT o.id, o.fromEntityId, o.fromEntityType, o.toEntityId, o.toEntityType FROM core_binding o WHERE o.id = ?', $rsm);
        //$query->setParameter(1, 1);
        //$query = $em->createNativeQuery('SELECT id, indexPosition, createdDateTime, name, type, caption, data FROM core_config', $rsm);
        //ld($query->getResult());

        $data = $em->getRepository('CorePropertyBundle:DataProperty')->find(31);
        //$data = $em->getRepository('CorePropertyBundle:DataProperty')->massQuery(['31', 32]);
        //ldd($data);
        //$article = $em->getRepository('CoreFaqBundle:Article')->find(31);
        /*
        foreach($data->getDynamicFields() as $val) {
            ld($val);
        }*/
//        $dymamicField  = new Binding();
//
//        $dymamicField->setFromEntity($data)
//                ->setToEntity($article)
//        ;
        //ldd($dymamicField);
        /*$data->addDynamicField($dymamicField);
         * 
         */
        //$em->persist($dymamicField);
        //$em->flush();
        //echo 'bind';
        //$bind = $em->getRepository('CoreDynamicBindingBundle:Binding')->findAll();
        //ldd($data->getDynamicFields());
        /*
        foreach ($data->getDynamicFields() as $val) {
            ldd($val->getId());
        }*/
        
        return $this->render('CoreDynamicBindingBundle::layout.html.twig', array(
            'data' => (isset($data)) ? $data : 'empty data'
        ));

    }
}
