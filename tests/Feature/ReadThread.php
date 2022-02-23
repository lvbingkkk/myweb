<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadThread extends TestCase
{
    //回滚的连tm的表都没连。。！！！
//    use DatabaseMigrations;

    protected $thread ;
    public function setUp(): void
    {
        //不是很明白这个parent：：

        parent::setUp(); // TODO: Change the autogenerated stub
        $this->thread = factory('App\Thread')->create();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_View_all_threadsTest()
    {

//        $thread = factory('App\Thread')->create();
        $this->get('/threads')
            ->assertSee($this->thread->title);



//        $response->assertStatus(200);
    }
    public function test_read_single_thread_test()
    {

//        $thread = factory('App\Thread')->create();

         $this->get('/threads/' . $this->thread->id)
            ->assertSee($this->thread->title);

//        $response->assertStatus(200);
    }

    public function test_read_replies_test()
    {
        //如果有 thread
        //并且该 thread 有回复
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        //那么当我们看 thread 时
        //我们也要看到回复
        $this->get('/threads/' . $this->thread->id)->
        assertSee($reply->body);

    }

    public function test_thread_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$this->thread->replies);
    }

    public function testReplyHasOwner()
    {
//        $this->assertTrue(true);
        $reply = factory('App\Reply')->create();

        $this->assertInstanceOf('App\User', $reply->owner);
    }

    public function test_thread_has_a_creator()
    {
        $this->assertInstanceOf('App\User',$this->thread->creator);
    }
}
