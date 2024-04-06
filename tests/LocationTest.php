<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Location;

class LocationTest extends TestCase
{
    public function testCodeAttribute()
    {
        $location = new Location();

        $codeValue = 'ABC123';
        $location->setCode($codeValue);

        $this->assertEquals($codeValue, $location->getCode());
    }
}
