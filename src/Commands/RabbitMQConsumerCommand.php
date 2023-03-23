<?php
namespace SR\Leads\Commands;

use Illuminate\Console\Command;

class RabbitMQConsumerCommand extends Command
{
    protected $signature = "rabbit-mq:listner {queueName}";

    protected $description = " --- RabbitMQ listener --- ";

    public function handle()
    {
        \Log::info($this->description);

        $queueName = $this->argument('queueName');

        $this->info("Listening: " . $queueName);

        $receiver = new $queueName();
        $receiver->listen();

    }
}