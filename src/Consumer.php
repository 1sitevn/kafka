<?php


namespace OneSite\Kafka;


/**
 * Class Consumer
 * @package OneSite\Kafka
 */
class Consumer
{
    /**
     *
     */
    public function listener()
    {
        $config = \Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('127.0.0.1:9092');
        $config->setGroupId('test');
        $config->setBrokerVersion('1.0.0');
        $config->setTopics(['test']);

        $consumer = new \Kafka\Consumer();
        $consumer->start(function ($topic, $part, $message) {
            var_dump($topic, $part, $message);
        });
    }
}
