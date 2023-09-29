<?php

namespace NumairAwan\EthplorerApi\Tests;

use PHPUnit\Framework\TestCase;
use NumairAwan\EthplorerApi\EthplorerApi;

class EthplorerApiTest extends TestCase
{
    private $ethplorer;

    protected function setUp(): void
    {
        // Replace with your actual API keys
        $apiKeys = ["YOUR_API_KEY_1", "YOUR_API_KEY_2"];
        $this->ethplorer = new EthplorerApi($apiKeys);
    }

    public function testGetLastBlock()
    {
        $result = $this->ethplorer->getLastBlock();
        $this->assertIsArray($result);
    }

    public function testGetTokenInfo()
    {
        $token = "0xYourTokenAddress";
        $result = $this->ethplorer->getTokenInfo($token);
        $this->assertIsArray($result);
    }

    public function testGetTokenPriceHistoryGrouped()
    {
        $token = "0xYourTokenAddress";
        $result = $this->ethplorer->getTokenPriceHistoryGrouped($token);
        $this->assertIsArray($result);
    }
}

