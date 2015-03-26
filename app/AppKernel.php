<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{

    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            // FOSUser And Sonata Admin
            new FOS\UserBundle\FOSUserBundle(),
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\MarkItUpBundle\SonataMarkItUpBundle(),
            new Sonata\FormatterBundle\SonataFormatterBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new FM\ElfinderBundle\FMElfinderBundle(),
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new SimpleThings\EntityAudit\SimpleThingsEntityAuditBundle(),
            new Application\SimpleThings\EntityAudit\ApplicationSimpleThingsEntityAuditBundle(),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
            new Application\Sonata\AdminBundle\ApplicationSonataAdminBundle(),
            // Doctrine Addons
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(), // mirgations
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(), // (Sluggable, Translatable, Tree, etc.)
            // Pagination
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Application\Knp\PaginatorBundle\ApplicationKnpPaginatorBundle(),
            // JMS Extra Security
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\I18nRoutingBundle\JMSI18nRoutingBundle(),
            new Core\CategoryBundle\CoreCategoryBundle(),
            new Core\CommonBundle\CoreCommonBundle(),
           // new Core\ProductBundle\CoreProductBundle(),
           // new Core\ManufacturerBundle\CoreManufacturerBundle(),
            //new Core\OrderBundle\CoreOrderBundle(),
            //new Core\PropertyBundle\CorePropertyBundle(),
            new Core\DirectoryBundle\CoreDirectoryBundle(),
            new Core\TroubleTicketBundle\CoreTroubleTicketBundle(),
           // new Core\LogisticsBundle\CoreLogisticsBundle(),
            new Core\FaqBundle\CoreFaqBundle(),
            new Application\ElfinderBundle\ApplicationFMElfinderBundle(),
            // not required, but recommended for better extraction
            //new JMS\TranslationBundle\JMSTranslationBundle(),
            new Symfony\Cmf\Bundle\TreeBrowserBundle\CmfTreeBrowserBundle(),
            new Core\FileBundle\CoreFileBundle(),
            new Core\LanguageBundle\CoreLanguageBundle(),
            new Core\UnionBundle\CoreUnionBundle(),
            new Core\ColorBundle\CoreColorBundle(),
            new Gregwar\CaptchaBundle\GregwarCaptchaBundle(), // каптча
            new Sonata\IntlBundle\SonataIntlBundle(),
            new Core\StatisticsBundle\CoreStatisticsBundle(),
            //new Core\DeliveryBundle\CoreDeliveryBundle(),
            new Core\PaymentBundle\CorePaymentBundle(),
            //new Core\DiscountsBundle\CoreDiscountsBundle(),
            new TFox\MpdfPortBundle\TFoxMpdfPortBundle(),
            new Application\Sonata\BlockBundle\ApplicationSonataBlockBundle(),
            new Beryllium\CacheBundle\BerylliumCacheBundle(),
            new RaulFraile\Bundle\LadybugBundle\RaulFraileLadybugBundle(),
            new Core\ReviewBundle\CoreReviewBundle(),
            new Shtumi\UsefulBundle\ShtumiUsefulBundle(),
            new Application\Shtumi\UsefulBundle\ApplicationShtumiUsefulBundle(),
            new Core\ConfigBundle\CoreConfigBundle(),
            new Liip\MonitorBundle\LiipMonitorBundle(),
            new Ornicar\ApcBundle\OrnicarApcBundle(),
            new Application\IvoryCKEditorBundle\ApplicationIvoryCKEditorBundle(),
            new Presta\SitemapBundle\PrestaSitemapBundle(),
            new Liuggio\ExcelBundle\LiuggioExcelBundle(),
            //new Core\DynamicBindingBundle\CoreDynamicBindingBundle(),
            new Core\SlugHistoryBundle\CoreSlugHistoryBundle(),
            new Core\HolidayBundle\CoreHolidayBundle(),
            new Core\OfficeWorkTimeBundle\CoreOfficeWorkTimeBundle(),
            new FOS\HttpCacheBundle\FOSHttpCacheBundle(),
            new Application\Liuggio\ExcelBundle\ApplicationLiuggioExcelBundle(),
            new Core\CacheBundle\CoreCacheBundle(),


            new Core\BannerBundle\CoreBannerBundle(),
            new Core\SiteBundle\CoreSiteBundle(),
            new Core\AdCompanyBundle\CoreAdCompanyBundle(),
            new Ob\HighchartsBundle\ObHighchartsBundle(),

        );


        if (in_array($this->getEnvironment(), array('dev'))) {
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(); // fixtures
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new CoreSphere\ConsoleBundle\CoreSphereConsoleBundle();
           // $bundles[] = new Jns\Bundle\XhprofBundle\JnsXhprofBundle();
            $bundles[] = new Elao\WebProfilerExtraBundle\WebProfilerExtraBundle();
        }
        else if (in_array($this->getEnvironment(), array('test'))) {
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(); // fixtures
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }

}
