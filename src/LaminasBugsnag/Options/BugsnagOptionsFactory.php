<?php
namespace LaminasBugsnag\Options;

use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;
use Psr\Container\ContainerInterface;

class BugsnagOptionsFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, BugsnagOptions::class);
    }

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        return new BugsnagOptions($config['laminas-bugsnag']);
    }
}
