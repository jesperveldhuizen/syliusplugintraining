<?php

declare(strict_types=1);

use Sylius\Bundle\CoreBundle\Application\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

final class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles(): array
    {
        $bundles = [
            new \Sylius\Bundle\OrderBundle\SyliusOrderBundle(),
            new \Sylius\Bundle\MoneyBundle\SyliusMoneyBundle(),
            new \Sylius\Bundle\CurrencyBundle\SyliusCurrencyBundle(),
            new \Sylius\Bundle\LocaleBundle\SyliusLocaleBundle(),
            new \Sylius\Bundle\ProductBundle\SyliusProductBundle(),
            new \Sylius\Bundle\ChannelBundle\SyliusChannelBundle(),
            new \Sylius\Bundle\AttributeBundle\SyliusAttributeBundle(),
            new \Sylius\Bundle\TaxationBundle\SyliusTaxationBundle(),
            new \Sylius\Bundle\ShippingBundle\SyliusShippingBundle(),
            new \Sylius\Bundle\PaymentBundle\SyliusPaymentBundle(),
            new \Sylius\Bundle\MailerBundle\SyliusMailerBundle(),
            new \Sylius\Bundle\PromotionBundle\SyliusPromotionBundle(),
            new \Sylius\Bundle\AddressingBundle\SyliusAddressingBundle(),
            new \Sylius\Bundle\InventoryBundle\SyliusInventoryBundle(),
            new \Sylius\Bundle\TaxonomyBundle\SyliusTaxonomyBundle(),
            new \Sylius\Bundle\UserBundle\SyliusUserBundle(),
            new \Sylius\Bundle\CustomerBundle\SyliusCustomerBundle(),
            new \Sylius\Bundle\UiBundle\SyliusUiBundle(),
            new \Sylius\Bundle\ReviewBundle\SyliusReviewBundle(),
            new \Sylius\Bundle\CoreBundle\SyliusCoreBundle(),
            new \Sylius\Bundle\ResourceBundle\SyliusResourceBundle(),
            new \Sylius\Bundle\GridBundle\SyliusGridBundle(),
            new \winzou\Bundle\StateMachineBundle\winzouStateMachineBundle(),

            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),

            new \Sonata\CoreBundle\SonataCoreBundle(),
            new \Sonata\BlockBundle\SonataBlockBundle(),
            new \Sonata\IntlBundle\SonataIntlBundle(),
            new \Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle(),
            new \JMS\SerializerBundle\JMSSerializerBundle(),
            new \FOS\RestBundle\FOSRestBundle(),

            new \Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
            new \Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new \Liip\ImagineBundle\LiipImagineBundle(),
            new \Payum\Bundle\PayumBundle\PayumBundle(),
            new \Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new \WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),

            new \Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new \Sylius\Bundle\FixturesBundle\SyliusFixturesBundle(),
            new \Sylius\Bundle\PayumBundle\SyliusPayumBundle(), // must be added after PayumBundle.
            new \Sylius\Bundle\ThemeBundle\SyliusThemeBundle(), // must be added after FrameworkBundle

            new \Symfony\Bundle\WebServerBundle\WebServerBundle(), // allows to run build in web server. Not recommended for prod environment

            new \Sylius\Bundle\AdminBundle\SyliusAdminBundle(),
            new \Sylius\Bundle\ShopBundle\SyliusShopBundle(),

            new \FOS\OAuthServerBundle\FOSOAuthServerBundle(), // Required by SyliusApiBundle
            new \Sylius\Bundle\AdminApiBundle\SyliusAdminApiBundle(),

            new \Acme\SyliusExamplePlugin\AcmeSyliusExamplePlugin(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test', 'test_cached'], true)) {
            $bundles[] = new \Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new \Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new \Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        }

        return $bundles;
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load($this->getRootDir() . '/config/config.yml');
    }
}
