<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Client;

class ClientTest extends TestCase
{
    public function testCinGetterSetter()
    {
        $client = new Client();
        $client->setCin(123);

        $this->assertEquals(123, $client->getCin());
    }
}
