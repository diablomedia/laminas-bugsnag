<?php

namespace LaminasBugsnag\Options;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class BugsnagOptionsFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        return new BugsnagOptions($config['laminas-bugsnag']);
    }
}
