<?php

/*
 * LICENSE: This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
 * @copyright 2016 Copyright(c) - All rights reserved.
 *
 * @author YNLO-Ultratech Development Team <developer@ynloultratech.com>
 * @package prepaynation-api
 * @version 1.0.x-dev
 */

namespace YnloUltratech\PrepayNation\Service\PurchaseRtr;

use YnloUltratech\PrepayNation\PrepayNationApiMock;

/**
 * Class PurchaseRtrMock
 */
class PurchaseRtrMock extends PrepayNationApiMock
{
    /**
     * {@inheritdoc}
     */
    protected function mockService($data)
    {
        return $this->loadFixture('PurchaseRtr2.xml');
    }
}