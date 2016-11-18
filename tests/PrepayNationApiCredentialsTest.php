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

namespace YnloUltratech\PrepayNation\Tests;

use YnloUltratech\PrepayNation\PrepayNationApiCredentials;

/**
 * Class PrepayNationApiCredentialsTest
 */
class PrepayNationApiCredentialsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * makeCredentials
     *
     * @return PrepayNationApiCredentials
     */
    public static function makeCredentials()
    {
        return new PrepayNationApiCredentials(getenv('API_USERNAME'), getenv('API_PASSWORD'));
    }
}