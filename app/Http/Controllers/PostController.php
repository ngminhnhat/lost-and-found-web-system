<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\ItemType;
use App\Models\Post;
use App\Models\PostType;
use App\Models\RejectMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemTypeList = ItemType::all();
        $postTypeList = PostType::all();
        $postList = Post::where('status', '1')->orderBy('created_at', 'DESC')->get();
        return view('post.index', ['postList' => $postList, 'postTypeList' => $postTypeList, 'itemTypeList' => $itemTypeList]);
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
    public function store(CreatePostRequest $request)
    {

        $post = Post::create([
            "user_id" => Auth::user()->id,
            "title" => $request->title,
            "post_type_id" => $request->post_type_id,
            "item_type_id" => $request->item_type_id,
            "found_address" => $request->found_address,
            "content" => $request->content,
        ]);
        if ($request->hasFile('image_1')) {
            $file = $request->image_1;
            $filename = Carbon::now()->format('YmdHisu');
            $fileExtension = $file->getClientOriginalExtension();
            $storename = $filename . '.' . $fileExtension;
            $file->storeAs('PostImage', $storename);
            $post->image_1 = $storename;
        }
        if ($request->hasFile('image_2')) {
            $file = $request->image_2;
            $filename = Carbon::now()->format('YmdHisu');
            $fileExtension = $file->getClientOriginalExtension();
            $storename = $filename . '.' . $fileExtension;
            $file->storeAs('PostImage', $storename);
            $post->image_2 = $storename;
        }
        if ($request->hasFile('image_3')) {
            $file = $request->image_3;
            $filename = Carbon::now()->format('YmdHisu');
            $fileExtension = $file->getClientOriginalExtension();
            $storename = $filename . '.' . $fileExtension;
            $file->storeAs('PostImage', $storename);
            $post->image_3 = $storename;
        }
        if ($request->hasFile('image_4')) {
            $file = $request->image_4;
            $filename = Carbon::now()->format('YmdHisu');
            $fileExtension = $file->getClientOriginalExtension();
            $storename = $filename . '.' . $fileExtension;
            $file->storeAs('PostImage', $storename);
            $post->image_4 = $storename;
        }
        if ($request->hasFile('image_5')) {
            $file = $request->image_5;
            $filename = Carbon::now()->format('YmdHisu');
            $fileExtension = $file->getClientOriginalExtension();
            $storename = $filename . '.' . $fileExtension;
            $file->storeAs('PostImage', $storename);
            $post->image_5 = $storename;
        }
        $post->save();
        toast('Thêm thành công!','success');
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
        $post = Post::with('post_type', 'item_type', 'user')->find($id);
        
        $rejectMsg = new RejectMessage();
        if($post->status == -1){
            $rejectMsg = null;
            $rejectMsg = RejectMessage::where('post_id',$id)->first();
        }
        if(Auth::check()){
            return view('post.show', ['post' => $post,'rejectMsg' => $rejectMsg]);
        }
        if ($post->status == 1) {
            return view('post.show', ['post' => $post,'rejectMsg' => $rejectMsg]);
        }
        return redirect()->route('trang-chu');
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

    public function searchGlobal(Request $request)
    {
        $itemTypeList = ItemType::all();
        $postTypeList = PostType::all();
        $post = Post::query();
        if ($request->title != null) {
            $post->where('title', 'LIKE', '%' . $request->title . '%');
        };
        if ($request->post_type_id != null) {
            $post->where('post_type_id', $request->post_type_id);
        };
        if ($request->item_type_id != null) {
            $post->where('item_type_id', $request->item_type_id);
        };
        if ($request->order != null) {
            if ($request->order == 0) {
                $post->orderBy('created_at', 'DESC');
            } elseif ($request->order == 1) {
                $post->orderBy('created_at');
            }
        };
        $postList = $post->get();
        return view('post.index', ['postList' => $postList, 'postTypeList' => $postTypeList, 'itemTypeList' => $itemTypeList]);
    }

    public function searchAdmin(Request $request)
    {
        $itemTypeList = ItemType::all();
        $postTypeList = PostType::all();
        $post = Post::query();
        $post->with('post_type', 'item_type', 'user');
        if ($request->title != null) {
            $post->where('title', 'LIKE', '%' . $request->title . '%');
        };
        if ($request->post_type_id != null) {
            $post->where('post_type_id', $request->post_type_id);
        };
        if ($request->item_type_id != null) {
            $post->where('item_type_id', $request->item_type_id);
        };
        if ($request->status != null) {
            $post->where('status', $request->status);
        };
        if ($request->order != null) {
            if ($request->order == 0) {
                $post->orderBy('created_at', 'DESC');
            } elseif ($request->order == 1) {
                $post->orderBy('created_at');
            }
        };
        $postList = $post->get();
        return view('admin.post.index', ['postList' => $postList, 'postTypeList' => $postTypeList, 'itemTypeList' => $itemTypeList]);
    }
}
