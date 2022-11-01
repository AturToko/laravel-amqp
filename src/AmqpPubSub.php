<?php

namespace AturToko\Laravel\Amqp;

use AturToko\Amqp\Exchanges\Exchange;
use AturToko\Amqp\Qos\Qos;
use AturToko\Amqp\Queues\Queue;

interface AmqpPubSub
{
    public function publish($messages, string $routingKey = '', ?Exchange $exchange = null, array $options = []): bool;

    public function consume(
        $handler,
        string $bindingKey = '',
        ?Exchange $exchange = null,
        ?Queue $queue = null,
        ?Qos $qos = null,
        array $options = []
    ): void;
}
