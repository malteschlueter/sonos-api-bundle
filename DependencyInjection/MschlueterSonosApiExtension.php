<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class MschlueterSonosApiExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter('mschlueter_sonos_api.refresh_token', $config['refresh_token']);
        $container->setParameter('mschlueter_sonos_api.client_key', $config['client_key']);
        $container->setParameter('mschlueter_sonos_api.client_secret', $config['client_secret']);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yaml');
    }
}
