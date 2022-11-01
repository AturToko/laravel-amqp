<?php

namespace AturToko\Laravel\Amqp\Facades;

use AturToko\Amqp\Exchanges\Exchange;
use AturToko\Amqp\Qos\Qos;
use AturToko\Amqp\Queues\Queue;
use AturToko\Laravel\Amqp\AmqpFake;
use AturToko\Laravel\Amqp\AmqpPubSub;
use Illuminate\Support\Facades\Facade;

/**
 * @method static AmqpPubSub connection(?string $name = null)
 * @method static bool publish($messages, string $routingKey = '', ?Exchange $exchange = null, array $options = [])
 * @method static void consume($handler, string $bindingKey = '', ?Exchange $exchange = null, ?Queue $queue = null, ?Qos $qos = null, array $options = [])
 *
 * @method static void assertPublishedOnConnection(string $name)
 * @method static void assertPublishedOnExchange(string $name)
 * @method static void assertPublishedOnExchangeType(string $type)
 * @method static void assertPublishedWithRoutingKey(string $key)
 * @method static void assertPublished($message = null)
 * @method static void assertPublishedCount(int $count, $message = null)
 * @method static void assertNotPublished($message = null)
 */
class Amqp extends Facade
{
    public static function fake(): AmqpPubSub
    {
        static::swap($fake = new AmqpFake(static::getFacadeApplication()));

        return $fake;
    }

    protected static function getFacadeAccessor(): string
    {
        return 'amqp';
    }
}
