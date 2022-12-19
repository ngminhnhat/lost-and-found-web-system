<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('account.login');
    }
    #Hàm xử lí đăng nhập
    public function login_process(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 0) {
                toast('Xin chào! ' . Auth::user()->name, 'success');
                return redirect()->route('admin.index');
            }
            Auth::logout();
            session()->flush();
            toast('Tài khoản đã bị vô hiệu hoá, vui lòng liên hệ Quản trị viên để biết thêm chi tiết!', 'error');
            return redirect()->route('dang-nhap');
        }
        Alert::error('Đăng nhập thất bại!', 'Vui lòng kiểm tra lại tên đăng nhập và mật khẩu!');
        return redirect()->route('dang-nhap');
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        toast('Đã đăng xuất!', 'success');
        return redirect()->route('dang-nhap');
    }

    public function forget()
    {
        return view('account.forget');
    }
    #Hàm xử lí quên mật khẩu
    public function forget_process(Request $request)
    {
        return view('account.forget');
    }

    public function index()
    {
        $postList0 = Post::where('user_id', Auth::user()->id)->where('status', 0)->orderBy('created_at', 'DESC')->get();
        $postList_1 = Post::where('user_id', Auth::user()->id)->where('status', -1)->orderBy('created_at', 'DESC')->get();
        $postList1 = Post::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('created_at', 'DESC')->get();
        $postList2 = Post::where('user_id', Auth::user()->id)->where('status', 2)->orderBy('created_at', 'DESC')->get();
        toast('Xin chào '.Auth::user()->name);
        return view('account.index', ['postList0' => $postList0, 'postList_1' => $postList_1, 'postList1' => $postList1, 'postList2' => $postList2,]);
    }
    public function indexPost()
    {
        $listPost = Post::with('post_type', 'item_type', 'user')->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('account.post.index', ['listPost' => $listPost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("account.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $userPhone = User::where('phone', $request->phone)->first();
        $userEmail = User::where('email', $request->email)->first();
        //dd((!$userPhone && !$userEmail));
        if (!$userPhone && !$userEmail) {
            $user = User::create([
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "name" => $request->name,
                "phone" => $request->phone,
                "address" => $request->address
            ]);
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                $filename = Carbon::now()->format('YmdHisu');
                $fileExtension = $file->getClientOriginalExtension();
                $storename = $filename . '.' . $fileExtension;
                $file->storeAs('UserAvatar', $storename);
                $user->avatar = $storename;
            }
            $user->save();
            toast('Đăng ký thành công!', 'success');
            return redirect()->route('dang-nhap');
        } else {
            Alert::error('Thất bại!', 'Đã có tài khoản sử dụng số điện thoại hoặc email này.');
            return redirect()->route('dang-ki');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('account.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('account.edit', compact('user'));
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
        $user = User::find($id);
        if ($user != null) {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            toast('Cập nhật tài khoản thành công!', 'success');
            return redirect()->route('tai-khoan.chi-tiet', ['id' => $user->id]);
        }
        Alert::error('Cập nhật thất bại!', 'Có lỗi xảy ra!');
    }
    public function postComplete(Request $request)
    {
        $post = Post::find($request->id);
        if ($post != null) {
            $post->status = 2;
            $post->save();
            toast('Bài viết đã được đánh dấu hoàn tất! Cảm ơn bạn đã đăng bài viết này!', 'success');
            return redirect()->route('tai-khoan.bai-dang.index');
        }
        Alert::error('Thất bại!', 'Bài viết đã không còn tồn tại.');
        return redirect()->route('tai-khoan.bai-dang.index');
    }

    public function edit_password($id)
    {
        $user = User::find($id);
        return view('account.edit_password', compact('user'));
    }

    public function update_password(Request $request, $id)
    {
        if (Hash::check($request->password_old, Auth::user()->password)) {
            $user = User::find($id);
            $user->password = Hash::make($request->password_new);
            $user->save();
            Auth::logout();
            session()->flush();
            Auth::login($user);
            toast('Cập nhật thành công!', 'success');
            return redirect()->route('trang-chu');
        }
        toast('Cập nhật không thành công! Mật khẩu cũ không khớp', 'success');
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
    public function search(Request $request)
    {
        $user = User::query();
        if ($request->phone != null) {
            $user->where('phone', 'LIKE', '%' . $request->phone . '%');
        }

        if ($request->status != null) {
            $user->where('status', $request->status);
        }
        $listUser =  $user->where('id', '!=', Auth::id())->get();
        return view('admin.account.index', compact('listUser'));
    }
}
