<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\HelloBackendRestApi\Controller;

use Generated\Shared\Transfer\HelloRestAttributesTransfer;
use Spryker\Glue\Kernel\Backend\Controller\AbstractController;

/**
 * @method \Spryker\Glue\HelloBackendRestApi\HelloBackendRestApiFactory getFactory()
 */
class HelloResourceController extends AbstractController
{
    /**
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction()
    {
        $response = $this->getFactory()->getResourceBuilder()->createRestResponse();
        $healthCheck = $this->getFactory()->getHealthCheckFacade()->executeHealthCheck('storage');

        $response->addResource(
            $this->getFactory()->getResourceBuilder()->createRestResource(
                'hello',
                'backend',
                (new HelloRestAttributesTransfer())
                    ->setMessage('Welcome to the backend API')
                    ->setStorageHealth('Storage health: ' . $healthCheck->getStatus())
            )
        );

        return $response;
    }
}
