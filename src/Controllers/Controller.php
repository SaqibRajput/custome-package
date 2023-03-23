<?php

    namespace SR\Leads\Controllers;

    use Laravel\Lumen\Routing\Controller as LumenController;
    use PhpAmqpLib\Message\AMQPMessage;

    class Controller extends LumenController
    {
        public const RESPONSE_SUCCESS = true;
        public const RESPONSE_FAILED = false;

        const STATUS_CODE_SUCCESS = 200;
        const STATUS_CODE_AUTHENTICATION_FAILED = 401;
        const STATUS_CODE_SERVICE_FAILED = 421;
        const STATUS_CODE_CURL_FAILED = 408;

        public function __construct()
        {

        }

        public function apiResponse($data)
        {
            return $data;
        }
    }
