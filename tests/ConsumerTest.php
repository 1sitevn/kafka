<?php


namespace OneSite\Kafka;


use PHPUnit\Framework\TestCase;

require_once "helpers.php";

/**
 * Class ConsumerTest
 * @package OneSite\Kafka
 */
class ConsumerTest extends TestCase
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

        $this->service = new Consumer();
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
     * PHPUnit test: vendor/bin/phpunit --filter testListener tests/ConsumerTest.php
     */
    public function testListener()
    {
        $data = $this->service->listener();

        echo "\n" . json_encode($data);

        return $this->assertTrue(true);
    }

}
