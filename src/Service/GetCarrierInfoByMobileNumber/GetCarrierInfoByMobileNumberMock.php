<?php
/*
 * LICENSE: This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
 * @copyright 2017 Copyright(c) - All rights reserved.
 *
 * @author YNLO-Ultratech Development Team <developer@ynloultratech.com>
 * @package prepaynation-api
 * @version 1.0.x-dev
 */

namespace YnloUltratech\PrepayNation\Service\GetCarrierInfoByMobileNumber;


use YnloUltratech\PrepayNation\PrepayNationApiMock;

class GetCarrierInfoByMobileNumberMock extends PrepayNationApiMock
{
    /**
     * {@inheritdoc}
     */
    protected function mockService($data)
    {
        return $this->loadFixture('GetCarrierInfoByMobileNumber.xml');
    }
}