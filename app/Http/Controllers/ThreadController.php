<?php

namespace App\Http\Controllers;

use App\Filters\ThreadsFilters;
use App\Thread;
use App\Channel;
use Illuminate\Http\Request;
use App\Inspections\Spam;

class ThreadController extends Controller
{

    public function __construct()
    {
        // 白名单，意味着仅 store 方法需要登录
//        $this->middleware('auth')->only('store');

        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index($channelSlug=null)
//    {
//        //
////        $threads = Thread::latest()->get();
////        dd($threads);
//        if($channelSlug){
//            $channelId = Channel::where('slug',$channelSlug)->first()->id;
//
//            $threads = Thread::where('channel_id',$channelId)->latest()->get();
//        }else{
//            $threads = Thread::latest()->get();
//        }
//        return view('threads.index',compact('threads'));
//
//    }



    public function index(Channel $channel,ThreadsFilters $filters)
    {

        /*if ($channel->exists) {
            $threads = $channel->threads()->latest()->get();
        } else {
            $threads = Thread::latest()->get();
        }

        按用户名筛选帖子
        if($username = request('by')){
            $user = \App\User::where('name',$username)->firstOrFail();

            $threads = $threads->where('user_id',$user->id);

        }
        $threads = $this->getThreads($channel);

注意⚠️筛选latest（）方法后面没有get（）方法！！！！！！！⬇️，，得到的类型不同。。

        if ($channel->exists) {
            $threads = $channel->threads()->latest();
        } else {
            $threads = Thread::latest();
        }
//        dd($threads);
//        dd($filters);
        $threads = $threads->filter($filters)->get();*/


        $threads = $this->getThreads($channel, $filters);

        return view('threads.index', compact('threads'));
    }

    protected function getThreads(Channel $channel, ThreadsFilters $filters)
    {


//        $threads = Thread::with('channel')-> latest()->filter($filters);
        $threads = Thread::latest()->filter($filters);


        if ($channel->exists) {
            $threads->where('channel_id', $channel->id);
        }
//        dd($threads);
        $threads = $threads ->paginate(5);
        return $threads;

    }

/*
//    protected function getThreads(Channel $channel, ThreadsFilters $filters)
//    {
//        $threads = Thread::latest()->filter($filters);
//
//        if ($channel->exists) {
//            $threads->where('channel_id', $channel->id);
//        }
//        $threads = $threads -> get();
//        return $threads;
//
//    }

//    protected function getThreads(Channel $channel)
//    {
//        if ($channel->exists) {
//            $threads = $channel->threads()->latest()->get();
//        } else {
//            $threads = Thread::latest()->get();
//        }
//
//        if($username = request('by')){
//            $user = \App\User::where('name',$username)->firstOrFail();
//
//            $threads = $threads->where('user_id',$user->id);
//
//        }
//        return $threads;
//    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $threads = Thread::all();
//        return view('threads.create',compact('threads'));
        return view('threads.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Spam $spam)
    {
        //
        $this->validate($request,[
            'title' => 'required|spamfree',
             'body' => 'required|spamfree',
        'channel_id' => 'required|exists:channels,id'
        ]);

//        $spam->detect($request,['body','title']);
//        $spam->detect($request['title']);
//        $spam->detect($request['body']);

//        $spam->detect(request(['body','title']));

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),

            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect($thread->path())
            ->with('flash','您的帖子已发布！');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId,Thread $thread)
    {
//        dd($thread);

        if(auth()->check()){
            auth()->user()->read($thread);
        }

        return view('threads.show2', compact('thread'));

        /*return view('threads.show2',[
            'thread' => $thread,
//            'replies' => $thread->replies()->paginate(4),

            'replies' => $thread->replies()->get()
        ]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel,Thread $thread)
    {
//        if($thread->user_id != auth()->id()){
//            if(request()->wantsJson()){
//                return response(['status' => 'Permission Denied'],403);
//            }
//
//            return redirect('/login');
//        }

//        if($thread->user_id != auth()->id()){
//            abort(403,"You do not have permission to do this.");
//        }



        //应用授权策略
        $this->authorize('update', $thread);

//        $thread->replies()->delete();

        $thread->delete();

        if(request()->wantsJson()){
            return response([],204);
        }

        return redirect('/threads');
    }


}
