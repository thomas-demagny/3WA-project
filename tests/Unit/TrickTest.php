<?php

namespace App\Tests\Unit;

use App\Entity\Category;
use App\Entity\Trick;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class TrickTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->trick = new Trick();
    }


    public function testGetTitle(): void{
        $value = 'Test for a Title';

        $response = $this->trick->setTitle($value);

        self::assertInstanceOf(Trick::class, $response);
        self::assertEquals($value, $this->trick->getTitle());
    }

    public function testGetDescription() :void
    {
        $value = 'A super trick test';
        $response = $this->trick->setDescription($value);

        self::assertInstanceOf(Trick::class, $response);
        self::assertEquals($value, $this->trick->getDescription());
    }

    public function testGetAuthor(): void{
        $value = new User();

        $response = $this->trick->setAuthor($value);


        self::assertInstanceOf(Trick::class, $response);
        self::assertEquals($value, $this->trick->getAuthor());
    }

}