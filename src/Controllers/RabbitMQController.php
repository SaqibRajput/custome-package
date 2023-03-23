<?php

namespace SR\Leads\Controllers;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQController extends Controller
{
    protected $channel;
    protected $connection;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            config('rabbitmq.host'),
            config('rabbitmq.port'),
            config('rabbitmq.username'),
            config('rabbitmq.password'),
            config('rabbitmq.vhost'),
            config('rabbitmq.insist'),
            config('rabbitmq.login_method'),
            config('rabbitmq.login_response'),
            config('rabbitmq.locale'),
            config('rabbitmq.connection_timeout'),
            config('rabbitmq.read_write_timeout'),
            config('rabbitmq.context'),
            config('rabbitmq.keepalive'),
            config('rabbitmq.heartbeat'),
            config('rabbitmq.channel_rpc_timeout'),
            config('rabbitmq.ssl_protocol')
        );

        $this->channel = $this->connection->channel();
    }
    
    public function AMQPMessage($message) 
    {
        return new AMQPMessage($message);
    }

    public function execute($queueName, $message) 
    {
        // set configuration
        $this->channel->queue_declare($queueName, false, true, false, false);

        // // initiate data in queue
        $msg = $this->AMQPMessage($message);
        
        // // publish queue to sent data to server.
        $this->channel->basic_publish($msg, '', $queueName);

        \Log::info("Message Sent to RabbitMQ ({$queueName})");

        // // close the connection to save resourvces.
        $this->channel->close();
        $this->connection->close();
    }
}