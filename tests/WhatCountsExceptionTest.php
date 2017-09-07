<?php
    /**
     * Created by PhpStorm.
     * Author: Mark Simonds
     * Date: 2/21/17
     * Time: 3:27 PM
     *
     * Copyright 2017 Zaycon Fresh, LLC.
     */

    namespace Zaycon\Whatcounts_Rest;

    class WhatCountsExceptionTest extends WhatCountsTest
    {
        public function setUp()
        {
            parent::setUp();
        }

        public function tearDown()
        {
            parent::tearDown();
        }

        /**
         * @expectedException WhatCountsException
         */
        public function testException()
        {
            throw new WhatCountsException('Some Message', 20);
        }
    }
