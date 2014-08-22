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
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Ps\PdfBundle\PsPdfBundle(),

            new Iniaf\Bundle\LocalizacionBundle\LocalizacionBundle(),
            new Iniaf\Bundle\SemillaBundle\SemillaBundle(),
            new Iniaf\Bundle\SemilleraBundle\SemilleraBundle(),
            new Iniaf\Bundle\CooperadorBundle\CooperadorBundle(),
            new Iniaf\Bundle\BackendBundle\BackendBundle(),
            new Iniaf\Bundle\MovimientoBundle\MovimientoBundle(),
            new Iniaf\Bundle\ExtranetBundle\ExtranetBundle(),
            new Iniaf\Bundle\CertificacionBundle\CertificacionBundle(),
            new Iniaf\Bundle\FrontendBundle\FrontendBundle(),
            new Iniaf\Bundle\UserBundle\UserBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
