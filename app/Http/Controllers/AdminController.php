<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost = Post::with('post_type', 'item_type', 'user')->orderBy('created_at','DESC')->get();
        return view('admin.index', ['listPost' => $listPost]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function accept_post(Request $request)
    {
        $post = Post::find($request->id);
        if ($post != null) {
            $post->status = 1;
            $post->save();
            toast('Bài viết đã được chấp thuận!','success');
            return redirect()->route('admin.index');
        }
        Alert::error('Thất bại!', 'Bài viết đã không còn tồn tại.');
        return redirect()->route('admin.index');
    }
    public function decline_post(Request $request)
    {
        
        $post = Post::find($request->id);
        if ($post != null) {
            $post->status = -1;
            $post->save();
            toast('Bài viết đã bị từ chối!','success');
            return redirect()->route('admin.index');
        }
        Alert::error('Thất bại!', 'Bài viết đã không còn tồn tại.');
        return redirect()->route('admin.index');
    }
}
