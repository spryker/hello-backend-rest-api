<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace Spryker\Glue\HelloBackendRestApi;

use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Backend\Container as BackendContainer;
use Spryker\Glue\Kernel\Container;

class HelloBackendRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    //@todo overwrite bundle dependency provider
    public const FACADE_HEALTH_CHECK = 'FACADE_HEALTH_CHECK';

    public function provideDependencies(Container $container)
    {
        $container = parent::provideDependencies($container);
        $container = $this->addHealthFacade($container);

        return $container;
    }

    protected function addHealthFacade(Container $container)
    {
        $container->set(static::FACADE_HEALTH_CHECK, function (BackendContainer $container) {
            return $container->getLocator()->HealthCheck()->facade();
        });

        return $container;
    }

}
