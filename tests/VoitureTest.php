<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Voiture;

class VoitureTest extends TestCase
{
    public function testSerieAttribute()
    {
        $voiture = new Voiture();

        $serieValue = 'XYZ789';
        $voiture->setSerie($serieValue);

        $this->assertEquals($serieValue, $voiture->getSerie());
    }
}
