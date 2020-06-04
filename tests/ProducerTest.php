<?php


namespace OneSite\Kafka;


use OneSite\Kafka\Producer;
use PHPUnit\Framework\TestCase;

require_once "helpers.php";

class ProducerTest extends TestCase
{

    /**
     * @var Producer
     */
    private $service;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->service = new Producer();
    }

    /**
     *
     */
    public function tearDown(): void
    {
        $this->service = null;

        parent::tearDown();
    }

    /**
     * PHPUnit test: vendor/bin/phpunit --filter testSend tests/ProducerTest.php
     */
    public function testSend()
    {
        $data = $this->service->send();

        echo "\n" . json_encode($data);

        return $this->assertTrue(true);
    }

}
