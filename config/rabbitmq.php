<?php

    /**
     * Developed by Saqib Rajput.
     * Email: rajput.saqib@hotmail.com
     * Mobile: 00-92-300-6710419
     * Date: 22/03/2023
     * Time: 14:09
     */

     return [
         
         "host" => env('RABBITMQ_HOST'),
         "port" => env('RABBITMQ_PORT', 5672),
         "username" => env('RABBITMQ_USERNAME'),
         "password" => env('RABBITMQ_PASSWORD'),
         "vhost" => env('RABBITMQ_VHOST'),

         "insist" => env('RABBITMQ_INSIST', false),
         "login_method" => env('RABBITMQ_LOGIN_METHOD', 'AMQPLAIN'),
         "login_response" => env('RABBITMQ_LOGIN_RESPONSE', null),
         "locale" => env('RABBITMQ_locale', 'en_US'),
         "connection_timeout" => env('RABBITMQ_CONNECTION_TIMEOUT', 3.0),
         "read_write_timeout" => env('RABBITMQ_READ_WRITE_TIMEOUT', 360),
         "context" => env('RABBITMQ_CONTEXT', null),
         "keepalive" => env('RABBITMQ_KEEPALIVE', true),
         "heartbeat" => env('RABBITMQ_HEARTBEAT', 180),
         "channel_rpc_timeout" => env('RABBITMQ_CHANNEL_RPC_TIMEOUT', 0.0),
         "ssl_protocol" => env('RABBITMQ_SSL_PROTOCOL', null),
         'retryTimeSec' => env('RABBITMQ_RETRY_TIME', 300),
     
         'queuePassive' =>  env('RABBITMQ_QUEUE_PASSIVE', false),
         'queueDurable' =>  env('RABBITMQ_QUEUE_DURABLE', true),
         'queueExclusive' =>  env('RABBITMQ_QUEUE_EXCLUSIVE', false),
         'queueAutoDelete' =>  env('RABBITMQ_QUEUE_DELETE', false),
         'queueWait' =>  env('RABBITMQ_QUEUE_WAIT', false),
     
         'consumerTag' =>  env('RABBITMQ_CONSUMER_TAG', ''),
         'consumerPublish' =>  env('RABBITMQ_CONSUMER_PUBLISH', true),
         'consumerAcknowledge' =>  env('RABBITMQ_CONSUMER_ACKNOWLEDGE', false),
         'consumerExclusive' =>  env('RABBITMQ_CONSUMER_EXCLUSIVE', false),
         'consumerWait' =>  env('RABBITMQ_CONSUMER_WAIT', false),
     ];
     
