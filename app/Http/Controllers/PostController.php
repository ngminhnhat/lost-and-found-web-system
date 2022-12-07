<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postList = Post::where('status','1')->orderBy('created_at','DESC')->get();
        return view('post.index', compact('postList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemTypeList = ItemType::all();
        $postTypeList = PostType::all();
        return view('post.create', ['itemTypeList' => $itemTypeList, 'postTypeList' => $postTypeList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            "user_id" => Auth::user()->id,
            "title" => $request->title,
            "post_type_id" => $request->post_type_id,
            "item_type_id" => $request->item_type_id,
            "found_address" => $request->found_address,
            "content" => $request->content,
        ]);
        if($request->hasFile('image_1')){

        }
        if($request->hasFile('image_2')){
            
        }
        if($request->hasFile('image_3')){
            
        }
        if($request->hasFile('image_4')){
            
        }
        if($request->hasFile('image_5')){
            
        }
        $post->save();
        return redirect()->route('tai-khoan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $postType = PostType::find($post->post_type_id);
        $itemType = ItemType::find($post->item_type_id);
        $user = User::find($post->user_id);
        return view('post.show', ['post' => $post, 'postType' => $postType, 'itemType' => $itemType, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
