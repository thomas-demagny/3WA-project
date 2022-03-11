<?php

namespace App\Tests\Unit;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\User;
use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = new User();
    }

    public function testGetEmail(): void{
        $value = 'test@test.fr';

        $response = $this->user->setEmail($value);
        $getEmail = $this->user->getEmail();

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $getEmail);
    }

    public function testGetRoles() :void
    {
        $value = ['ROLE_ADMIN'];
        $response = $this->user->setRoles($value);

        self::assertInstanceOf(User::class, $response);
        self::assertContains('ROLE_USER', $this->user->getRoles());
        self::assertContains('ROLE_ADMIN', $this->user->getRoles());
    }

    public function testGetPassword(): void{
        $value = 'password';

        $response = $this->user->setPassword($value);
        $getPassword = $this->user->getPassword();

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $getPassword);
    }

    public function testGetTrick() : void
    {
        $value = new Trick();

        $response = $this->user->addTrick($value);
        self::assertInstanceOf(User::class, $response);
        self::assertCount(1, $this->user->getTricks());
        self::assertTrue($this->user->getTricks()->contains($value));

        $response = $this->user->removeTrick($value);

        self::assertInstanceOf(User::class, $response);
        self::assertCount(0, $this->user->getTricks());
        self::assertFalse($this->user->getTricks()->contains($value));
    }

    public function testGetComment() : void
    {
        $value = new Comment();

        $response = $this->user->addComment($value);
        self::assertInstanceOf(User::class, $response);
        self::assertCount(1, $this->user->getComments());
        self::assertTrue($this->user->getComments()->contains($value));

        $response = $this->user->removeComment($value);

        self::assertInstanceOf(User::class, $response);
        self::assertCount(0, $this->user->getComments());
        self::assertFalse($this->user->getComments()->contains($value));
    }

}