<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\TestCase;

class ReplyTest extends TestCase
{
//    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function ReplyHasOwner()
    {
//        $this->assertTrue(true);
        $reply = factory('App\Reply')->create();

        $this->assertInstanceOf('App\User', $reply->owner);
    }
}
