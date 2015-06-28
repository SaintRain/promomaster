<?php

/**
 * Форма файл для баннера
 * @author  Kaluzhny N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Form\Type;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Core\AdCompanyBundle\Form\DataTransformer\AdCompanyTransformer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Doctrine\ORM\EntityRepository;

class AdCompanyType  extends AbstractType
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    /**
     * @var RequestStack
     */
    private $requestStack;

    public function __construct(EntityManagerInterface $em, RequestStack $requestStack)
    {
        $this->em = $em;
        $this->requestStack = $requestStack;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $siteAdPlace = new \StdClass();
        $siteAdPlace->valid = false;
        /*
        $builder
            ->add('name', 'text', ['label' => 'Название*'])
            ->add('placements', null, ['label' => 'Размещения', 'property'=>'adPlace.name'])
            ->add('defaultCountries', null, ['required' => false])
            ->add('startDateTime', 'text', ['required' => false , 'read_only'=>true])
            ->add('finishDateTime', 'text', ['required' => false, 'read_only'=>true])
            ->add('isEnabled', null, ['label' => 'Рекламная компания активна'])
            ->addModelTransformer(new AdCompanyTransformer())       //трансформер дат
        ;
        */
        $builder
            ->add('name', 'text', ['label' => 'Название*'])
            ->add('defaultCountries', null,[
                'required' => false,
                'withSubset' => true,
                'expanded'  => true,
                'multiple'  => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->select('c, w')
                        ->innerJoin('c.worldSection', 'w')
                        ;
                }
            ])
            ->add('startDateTime', 'text', ['required' => false , 'read_only'=>true])
            ->add('finishDateTime', 'text', ['required' => false, 'read_only'=>true])
            ->add('isEnabled', null, ['label' => 'Рекламная компания активна'])
            ->addModelTransformer(new AdCompanyTransformer())       //трансформер дат
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
            $this->addSite($event);
            $this->addPlaces($event);
            $this->addPlacements($event);
        });

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function(FormEvent $event) use ($siteAdPlace) {
            $data = $event->getData();
            if (isset($data['adPlaces']) && isset($data['site'])) {
                $siteAdPlace->adPlace = $this->em->getReference('CoreSiteBundle:AdPlace', (int)$data['adPlaces']);
                $siteAdPlace->site = $this->em->getReference('CoreSiteBundle:CommonSite', (int)$data['site']);
                $siteAdPlace->valid = true;
            }
        });

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($siteAdPlace) {
            $data = $event->getData();
            if ($siteAdPlace->valid) {

                foreach ($data->getPlacements() as $placement) {
                    $placement->setAdCompany($data);
                    $placement->setAdPlace($siteAdPlace->adPlace);
                }
            }

        });

        //ldd($builder->getForm()->get('placements')->getData());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\AdCompanyBundle\Entity\AdCompany'
        ));
    }


    public function getName()
    {
        return 'ad_company_type';
    }

    private function addPlaces(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        $site = ($data && $data->getId() && count($data->getPlacements())) ?
                    $data->getPlacements()->first()->getAdPlace()->getSite() : null;

        $adPlace = ($data && $data->getId() && count($data->getPlacements())) ?
            $data->getPlacements()->first()->getAdPlace() : null;

        $site = ($site) ? $site : $this->getRequestData($form->getName(), 'site', 'CoreSiteBundle:CommonSite');

        if ($site) {
            $form->add('adPlaces','entity', [
                'label' => 'Рекламные места',
                'required' => true,
                'mapped' => false,
                'class' => 'CoreSiteBundle:AdPlace',
                'property' => 'name',
                'data' => $adPlace,
                'empty_value' => 'Необходимо выбрать или добавить',
                'constraints' => array(new NotBlank()),
                'query_builder' => function (EntityRepository $er) use ($site) {
                    return $er->createQueryBuilder('ap')
                        ->leftJoin('ap.site', 'site')
                        ->where('site.id = :siteId')
                        ->setParameters([
                            ':siteId' => $site->getId()
                        ])
                        ;
                }
            ]);
        } else {
            $form->add('adPlaces','entity', [
                'label' => 'Рекламные места',
                'required' => true,
                'mapped' => false,
                'choices' => new ArrayCollection(),
                'class' => 'CoreSiteBundle:AdPlace',
                'property' => 'name',
                'empty_value' => 'Необходимо выбрать или добавить',
                'constraints' => array(new NotBlank()),
            ]);
        }
    }

    /**
     * @param FormEvent $event
     */
    private function addPlacements(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        $form->add('placements', 'collection', [
            'label' => 'Размещения',
            'type' => new PlacementFormType(),
            'allow_add' => true,
            'allow_delete' => true,
            //'by_reference' => false,
            //'prototype' => '__placement_name__',
            'options'  => array(
                'adCompanyField' => false,
                'adPlaceField' => false,
                'required'  => false,
                'attr'      => array('class' => 'email-box')
            ),
        ]);
        //ldd($data);
        /*
        if ($data && $data->getId() && $data->getSite() && $data->getAdPlacement()) {
            $form->add('placements', 'collection', [
                'label' => 'Размещения',
                'type' => new PlacementFormType(),
                'allow_add' => true,
                'allow_delete' => true,
                'options'  => array(
                    'adCompanyField' => false,
                    'adPlaceField' => false,
                    'required'  => false,
                    'attr'      => array('class' => 'email-box')
                ),
            ]);
        } elseif($adPlace = $this->getRequestData($form->getName(), 'adPlaces')) {
            $form->add('placements', 'collection', [
                'label' => 'Размещения',
                'type' => new PlacementFormType(),
                'allow_add' => true,
                'allow_delete' => true,
                'options'  => array(
                    'adCompanyField' => false,
                    'adPlaceField' => false,
                    'required'  => false,
                    'attr'      => array('class' => 'email-box'),
                    'query_builder' => function (EntityRepository $er) use ($adPlace) {
                        return $er->createQueryBuilder('p')
                            ->leftJoin('p.adPlace', 'adPlace')
                            ->where('adPlace.id = :adPlaceId')
                            ->setParameters([
                                ':adPlaceId' => $adPlace->getId()
                            ])
                            ;
                    }
                )
            ]);
        } else {
            $form->add('placements', 'collection', [
                'label' => 'Размещения',
                'type' => new PlacementFormType(),
                'allow_add' => true,
                'allow_delete' => true,
                'options'  => array(
                    'adCompanyField' => false,
                    'adPlaceField' => false,
                    'required'  => false,
                    'attr'      => array('class' => 'email-box')
                ),
            ]);
        }
        */
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $site = $this->getRequestData($form->getName(), 'site', 'CoreSiteBundle:AdPlace');
        $adPlace = $this->getRequestData($form->getName(), 'adPlaces', 'CoreSiteBundle:AdPlace');

        if ($site && $adPlace) {
            $placements = $this->em->getRepository('CoreAdCompanyBundle:Placement')->findBy(['adPlace' => $adPlace]);
            foreach($placements as $placement) {
                $view->vars['placements'][] = $placement;
            }
        }
    }


    /**
     * @param FormEvent $event
     */
    private function addSite(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        $adPlace = ($data && $data->getId() && count($data->getPlacements())) ? $data->getPlacements()->first()->getAdPlace() : null;
        $site = ($adPlace) ? $adPlace->getSite() : null;
        $form
            ->add('site', 'entity', [
                'label' => 'Площадки',
                'mapped' => false,
                'required' => true,
                'data' => $site,
                'class' => 'CoreSiteBundle:CommonSite',
                'property' => 'name',
                'empty_value' => 'Необходимо выбрать или добавить',
                'constraints' => array(new NotBlank())
            ])
        ;
    }

    /**
     * @param $formName
     * @param $elementName
     * @param $type
     * @return null
     */
    public function getRequestData($formName, $elementName, $type)
    {
        $requestData = $this->requestStack->getCurrentRequest()->request->all();

        if(isset($requestData[$formName]) && isset($requestData[$formName][$elementName])) {
            return $this->em->getReference($type, (int)$requestData[$formName][$elementName]);
        } else {
            return null;
        }
    }
}