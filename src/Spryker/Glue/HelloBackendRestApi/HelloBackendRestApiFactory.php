<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace Spryker\Glue\HelloBackendRestApi;

use Spryker\Glue\Kernel\Backend\Factory\AbstractFactory;
use Spryker\Zed\HealthCheck\Business\HealthCheckFacadeInterface;

class HelloBackendRestApiFactory extends AbstractFactory
{
    /**
     * @return HealthCheckFacadeInterface
     */
    public function getHealthCheckFacade(): HealthCheckFacadeInterface
    {
        return $this->getProvidedDependency(HelloBackendRestApiDependencyProvider::FACADE_HEALTH_CHECK);
    }
}
