<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Inspections\Spam;
use App\Thread;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\User;
use App\Notifications\YouWereMentioned;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($channelId,Thread $thread)
    {
        return $thread->replies()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  /*  public function store($channelId,Thread $thread,Request $request)
    {

//        dd($thread);
        //
//        $data =request('body');
//        dd($data);
        $this->validate($request,['body' => 'required',]);
        $thread->addReply([
            'body'=>request('body'),
            'user_id'=>auth()->id(),
        ]);

        return back()
            ->with('flash','您的回复已留下。');
    }*/
    public function store($channelId,Thread $thread,CreatePostRequest $request)
    {
       /* $this->validate(request(),['body' => 'required|spamfree']);

        $spam->detect(request('body'));*/



       return $reply = $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ])->load('owner');

        /*$reply =  $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        preg_match_all('/\@([^\s\.]+)/',$reply->body,$matches);

        $names = $matches[1];

        // And then notify user
        foreach ($names as $name){
//            $user = User::whereName($name)->first();

//这样写也行。。
            $user = User::where('name', $name)->first();
            if($user){
                $user->notify(new YouWereMentioned($reply));
            }
        }

        return $reply->load('owner');*/




        /*try {
            $this->authorize('create', Reply::class);
        } catch (\Exception $e) {
            return response(
                'Sorry,回复太频繁.',422
            );
        }
        try {
//            $this->validateReply();


            $this->validate(request(),['body' => 'required|spamfree']);

            $reply = $thread->addReply([
                'body' => request('body'),
                'user_id' => auth()->id(),
            ]);
        } catch (\Exception $e) {
            return response(
                'Sorry,your reply 存在非法字符.',422
            );

        }

        if(request()->expectsJson()){
            return $reply->load('owner');
        }*/

//        return back()->with('flash','Your reply has been left.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {


//        $this->authorize('update',$reply);
       /* $this->validate(request(),['body' => 'required']);

        $spam->detect(request('body'));*/

        /*try {
//            $this->validateReply();
            $this->validate(request(),['body' => 'required|spamfree']);

            $reply->update(request(['body']));
        } catch (\Exception $e) {
            return response(
                'Sorry,your reply 非法.',422
            );

        }*/

        $this->authorize('update',$reply);
        $this->validate(request(),['body' => 'required|spamfree']);
        $reply->update(request(['body']));
    }


    protected function validateReply()
    {
        $this->validate(request(),['body' => 'required']);

        resolve(Spam::class)->detect(request('body'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $rely
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $rely
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        /*if($reply->user_id != auth()->id()){
            return response([],403);
        }*/

        $this->authorize('update',$reply);

        $reply->delete();

        if (request()->expectsJson()) {
            return response(['status'=>'Reply deleted']);
        }

        return back();

    }
}
