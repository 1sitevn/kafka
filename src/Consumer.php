<?php


namespace OneSite\Kafka;


/**
 * Class Consumer
 * @package OneSite\Kafka
 */
class Consumer
{

    public function listener($callback)
    {
        $config = \Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('127.0.0.1:9092');
        $config->setGroupId('test');
        $config->setBrokerVersion('1.0.0');
        $config->setTopics(['test']);

        $consumer = new \Kafka\Consumer();
        $consumer->start(function ($topic, $part, $response) use ($callback) {
            call_user_func($callback, $response);
        });
    }
}
