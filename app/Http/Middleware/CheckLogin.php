<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz\User as Quiz;
use App\Models\QLDT\User;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $value = $request->session()->get('role')->IsAdmin;
        if($value == 1){
            // echo 'đăng nhập admin';
            return $next($request);
        }
        else{
        //    echo 'đăng nhập user';
           return $next($request);
        } 
        // if($value == 0){
        //     echo 'đăng nhập user';
        // }
        // $user = Auth::user();
        // $username =  $request->username;
        // $password =  $request->password;
        
        // $username = User:: where ([
        //     ['Username', $username],
        //     ['Password', md5($password)]
        // ])->select('Username')->First()->Username;
        // $admin = Quiz::where('UserName',$username)->select('IsAdmin')->first()->IsAdmin;
        // if($admin == 1){
        //     return $next($request);
        // }
        // else if($admin == 0){
        //     return $next($request);
        // }
        // else{
        //     echo 'ra ngoài';
        // }
    }
}
