<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
    public function login_process(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Alert::success('Xin chào! ' . Auth::user()->name, 'Đăng nhập thành công');

            return redirect()->intended();
        }
        Alert::error('Đăng nhập thất bại!', 'Vui lòng kiểm tra lại tên đăng nhập và mật khẩu!');
        return redirect()->route('dang-nhap');
    }
    public function logout()
    {
        Auth::logout();
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
        $postList = Post::where('user_id', Auth::user()->id)->get();
        return view('account.index', compact('postList'));
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
    public function store(Request $request)
    {
        User::create([
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $request->address
        ]);

        return redirect()->route('dang-nhap');
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
            toast('Cập nhật tài khoản thành công!','success');
            return redirect()->route('tai-khoan.chi-tiet', ['id' => $user->id]);
        } else {
            Alert::error('Cập nhật thất bại!', 'Có lỗi xảy ra!');
        }
    }

    public function edit_password($id){
        $user = User::find($id);
        return view('account.edit_password', compact('user'));
    }

    public function update_password(Request $request, $id){
        $user = User::find($id);
        return view('account.edit_password', compact('user'));
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
