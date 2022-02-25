<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use DB;

class AuthController extends Controller {

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function getLogin() {
        return view('backend.auth.login');
    }

    public function postLogin(Request $request) {
        $input = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($input)) {
            
            return Redirect::route('admin.index');
        }
        return Redirect::route('login')->with('error', 'Wrong login account');
    }
  
    public function logout() {
        session_start();
        unset($_SESSION);
        session_destroy();
        Auth::logout();
        return Redirect::route('login');
    }

    public function get_otp() {
        return view('backend.auth.forgot_password');
    }

     public function send_otp(Request $request) {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if($user){
            $otp = rand(100000, 999999);
            User::where('email', $email)->update([ 'otp' => $otp, 'otp_term' => Carbon::now()->addMinutes(15)]);
            Mail::send('mail.forgot_password', ['active_code' => $otp], function($message) use ($user){
            $message->to($user->email, $user->full_name)
                ->subject('Mã xác thực mật khẩu mới');
        });
            return redirect()->route('forgot_password');
        }else{
            return redirect()->back()->with('error',"Tài khoản không tồn tại");
        }
    }

    public function forgot_password(Request $request){
        return view('backend.auth.change_password');
    }

    public function change_password(Request $request){
        $otp = $request->otp;
        if($otp != 0 && $otp != null){
            $active = DB::table('user')->where('otp', $otp)->first();
            if($active && $active->otp_term >= Carbon::now()){
            $validator = Validator::make($request->all(),
                [
                    'otp' => 'required',
                    'password' => 'required|min:6|max:32',
                    'c_password' => 'required|same:password|min:6|max:32'
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $record = User::where('otp', $otp);
            $record->update(['password' => bcrypt($request->password) , 'otp' => null ]);
            return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công');
            }
            else{
                 return redirect()->back()->with('error', 'Mã otp sai hoặc đã hết hiệu lực');
            }
        }else{
            return redirect()->back()->with('error', 'Vui lòng nhập otp');
        }
    }
}
