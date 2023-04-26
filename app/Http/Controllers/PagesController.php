<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\QLDT\SinhVien;
use App\Models\QLDT\User_ChiTiet;
use App\Models\QLDT\User;


class PagesController extends Controller
{
    public function index() {  

        return User::where([
            ['Username', '202200477']
        ])->select('Username')->get();
        //  return  SinhVien::where([
        //     ['Address','like','%Đồng Nai'],
        //     ['Username','like','14%'],
        //     ['ClassCode','like','18DTH%'],
        //  ])->select(md5('Password'))->get();
        
        // return  User_ChiTiet::where('ChuyenNganh','công nghệ thông tin')->get();

        // return view('index');
    }
    public function about() {
        $name = 'duy';
        $names = [
            'duy'
            ,'phương'
            ,'hoàng'
            ,'Nguyễn'
        ];
        return view('about', compact('name', 'names'));
    }
}
