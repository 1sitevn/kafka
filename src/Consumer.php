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
        $consumer->start(function ($topic, $part, $response) {
            $fp = fopen('data.txt', 'a');

            $data = json_encode([
                'topic' => $topic,
                'part' => $part,
                'response' => $response,
            ]);

            fwrite($fp, $data);

            fclose($fp);

            echo $data;
        });
    }
}
