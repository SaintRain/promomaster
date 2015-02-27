<?php

/**
 * Блок для вывода статистики на главной странице админки
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\BlockBundle\Block\Service;

use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BaseBlockService;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StatisticsBlockService extends BaseBlockService {

    private $dashboard_statistics_logic;

    public function __construct($name, $templating, $dashboard_statistics_logic) {
        $this->dashboard_statistics_logic = $dashboard_statistics_logic;
        parent::__construct($name, $templating);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null) {
        $statistics = $this->dashboard_statistics_logic->getGeneralStatistics();
        return $this->renderResponse($blockContext->getTemplate(), array(
                    'block' => $blockContext->getBlock(),
                    'statistics' => $statistics,
                        ), $response);
    }

    /**
     * {@inheritdoc}
     */
    public function validateBlock(ErrorElement $errorElement, BlockInterface $block) {
        // TODO: Implement validateBlock() method.
    }

    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $formMapper, BlockInterface $block) {
        $formMapper->add('settings', 'sonata_type_immutable_array', array(
            'keys' => array(
            //    array('content', 'textarea', array()),
            )
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'Statisticks Result';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultSettings(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'template' => 'SonataBlockBundle:Block:block_statistics.html.twig',
        ));
    }

}
