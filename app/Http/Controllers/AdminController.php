<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Models\Post;
use App\Models\PostType;
use App\Models\RejectMessage;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $postList = Post::with('user')->where('status', 0)->orderBy('created_at', 'DESC')->get();
        $reportList = Report::with('post')->get();
        return view('admin.indexcontent', ['postList' => $postList, 'reportList' => $reportList]);
    }
    public function indexAccount()
    {
        $listUser = User::all()->except(Auth::id());
        return view('admin.account.index', ['listUser' => $listUser]);
    }
    public function indexPost()
    {
        $itemTypeList = ItemType::all();
        $postTypeList = PostType::all();
        $postList = Post::with('post_type', 'item_type', 'user')->orderBy('created_at', 'DESC')->get();
        return view('admin.post.index', ['postList' => $postList, 'postTypeList' => $postTypeList, 'itemTypeList' => $itemTypeList]);
    }
    public function indexPostType()
    {
        $postListType = PostType::all();
        return view('admin.post_type.index', ['postListType' => $postListType]);
    }
    public function indexItemType()
    {
        $listItemType = ItemType::all();
        return view('admin.item_type.index', ['listItemType' => $listItemType]);
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

    public function storePostType(Request $request)
    {
        $check = PostType::where('name', $request->name)->first();
        if (!$check) {
            $postType = PostType::create(['name' => $request->name]);
            if ($postType != null) {
                toast('Th??m th??nh c??ng!', 'success');
                return redirect()->route('admin.loai-bai-viet.index');
            }
        }
        Alert::error('Th???t b???i! T??n ???? t???n t???i!', '');
        return redirect()->route('admin.loai-bai-viet.index');
    }

    public function storeItemType(Request $request)
    {
        $check = ItemType::where('name', $request->name)->first();
        if (!$check) {
            $postType = ItemType::create(['name' => $request->name]);
            if ($postType != null) {
                toast('Th??m th??nh c??ng!', 'success');
                return redirect()->route('admin.loai-do-vat.index');
            }
        }
        Alert::error('Th???t b???i! T??n ???? t???n t???i!', '');
        return redirect()->route('admin.loai-do-vat.index');
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
    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.account.edit', compact('user'));
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

    public function updatePostType(Request $request, $id)
    {
        $postType = PostType::find($id);
        if ($postType != null) {
            $check = PostType::where('name', $request->name)->where('id', '!=', $id)->first();
            if (!$check) {
                $postType->name = $request->name;
                $postType->save();
                toast('C???p nh???t th??nh c??ng!', 'success');
                return redirect()->route('admin.loai-bai-viet.index');
            }
            Alert::error('Th???t b???i!', 'Lo???i b??i vi???t ???? t???n t???i ho???c l???i h??? th???ng.');
            return redirect()->route('admin.loai-bai-viet.index');
        }
        Alert::error('Th???t b???i!', 'Lo???i b??i vi???t ???? kh??ng c??n t???n t???i ho???c l???i h??? th???ng.');
        return redirect()->route('admin.loai-bai-viet.index');
    }

    public function updateItemType(Request $request, $id)
    {
        $itemType = ItemType::find($id);
        if ($itemType != null) {
            $check = ItemType::where('name', $request->name)->where('id', '!=', $id)->first();
            if (!$check) {
                $itemType->name = $request->name;
                $itemType->save();
                toast('C???p nh???t th??nh c??ng!', 'success');
                return redirect()->route('admin.loai-do-vat.index');
            }
            Alert::error('Th???t b???i!', 'Lo???i b??i vi???t ???? t???n t???i ho???c l???i h??? th???ng.');
            return redirect()->route('admin.loai-do-vat.index');
        }
        Alert::error('Th???t b???i!', 'Lo???i b??i vi???t ???? kh??ng c??n t???n t???i ho???c l???i h??? th???ng.');
        return redirect()->route('admin.loai-do-vat.index');
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

    public function destroyPostType($id)
    {
        $postType = PostType::find($id);
        if ($postType != null) {
            $postType->destroy($id);
            toast('Xo?? th??nh c??ng!', 'success');
            return redirect()->route('admin.loai-bai-viet.index');
        }
        Alert::error('Th???t b???i!', 'Lo???i b??i vi???t ???? kh??ng c??n t???n t???i ho???c l???i h??? th???ng.');
        return redirect()->route('admin.loai-bai-viet.index');
    }

    public function destroyItemType($id)
    {
        $itemType = ItemType::find($id);
        if ($itemType != null) {
            $itemType->destroy($id);
            toast('Xo?? th??nh c??ng!', 'success');
            return redirect()->route('admin.loai-do-vat.index');
        }
        Alert::error('Th???t b???i!', 'Lo???i b??i vi???t ???? kh??ng c??n t???n t???i ho???c l???i h??? th???ng.');
        return redirect()->route('admin.loai-do-vat.index');
    }

    public function accept_post(Request $request)
    {
        $post = Post::find($request->id);
        if ($post != null) {
            $post->status = 1;
            $post->save();
            toast('B??i vi???t ???? ???????c ch???p thu???n!', 'success');
            return redirect()->route('admin.bai-dang.index');
        }
        Alert::error('Th???t b???i!', 'B??i vi???t ???? kh??ng c??n t???n t???i.');
        return redirect()->route('admin.bai-dang.index');
    }
    public function decline_post(Request $request)
    {

        $post = Post::find($request->id);
        if ($post != null) {
            $post->status = -1;
            $post->save();
            $rejectMsg = RejectMessage::create(['post_id' => $request->id, 'message' => $request->message]);
            toast('B??i vi???t ???? b??? t??? ch???i!', 'success');
            return redirect()->route('admin.bai-dang.index');
        }
        Alert::error('Th???t b???i!', 'B??i vi???t ???? kh??ng c??n t???n t???i.');
        return redirect()->route('admin.bai-dang.index');
    }
    public function deactivated($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->status = -1;
            $user->save();
            toast('V?? hi???u ho?? t??i kho???n th??nh c??ng!', 'success');
            return redirect()->route('admin.tai-khoan.index');
        }
        Alert::error('C???p nh???t th???t b???i!', 'C?? l???i x???y ra!');
        return redirect()->route('admin.tai-khoan.index');
    }
    public function activated($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->status = 0;
            $user->save();
            toast('C???p nh???t t??i kho???n th??nh c??ng!', 'success');
            return redirect()->route('admin.tai-khoan.index');
        }
        Alert::error('C???p nh???t th???t b???i!', 'C?? l???i x???y ra!');
        return redirect()->route('admin.tai-khoan.index');
    }
}
