<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin'; //Sau khi đăng nhập thành công, sẽ tự động trỏ về trang /admin/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Hàm trả về tên cột dùng để tìm `Tên đăng nhập`.
     * Thông thường là cột `username` hoặc cột `email`
     */
    public function username(){
        return 'nv_taiKhoan';
    }  

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $cred = $request->only($this->username(), 'nv_matKhau');
        return $cred;
    }

    /**
     * Hàm dùng để Kiểm tra tính hợp lệ của dữ liệu (VALIDATE) khi Xác thực tài khoản
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string', // tên tài khoản bắt buộc nhập
            'nv_matKhau' => 'required|string',      // mật khẩu bắt buộc nhập
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
}
