<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Http\Response;

use App\Models\QLDT\User;
use App\Models\ADMIN\User as ADMINUser;

class HomeController extends Controller
{
    public function loginAjax(Request $request){

        Auth::logout();

        $username = $request->username;
        $password = $request->password;
        $remember = $request->remember;

        $user = User::where('Username', $username)->where('Password', md5($password))
            ->select(['UserID','Username','Lastname','Firstname','Email','Phone'])
            ->first() ?? NULL;

        // try {
            if($user){
                $APIUser = ADMINUser::firstOrCreate(
                                                        [ 'userid' => $user->UserID,
                                                            'username' => $user->Username,
                                                            'fullname' => $user->Lastname . ' ' . $user->Firstname
                                                        ],
                                                        [
                                                            'is_admin' => 0
                                                        ]
                                                    );

                Auth::login($APIUser, $remember);

                $data['success'] = 1;
                $data['msg'] = 'Đăng nhập thành công';
                $data['url'] = url('home');
                $data['user'] = $user;

                // ($type, $msg, $status='OK', $data = '', $table = '' ){
                saveAdminLog('login', 'Đăng nhập thành công');
            }
            else{
                $data['success'] = 0;
                $data['msg'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';

                saveAdminLog('login', "$username : Đăng nhập thất bại ", 'Fail');
            }
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        echo json_encode($data);
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('');
    }

    public function index(){
        echo 'home';
    }
}
