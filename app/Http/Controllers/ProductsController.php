<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{ 
    public function index() {
        $title = 'đây là tai tồ này';

        // return view('products.index', compact('title')); có thể truyền nhiều biến
        // return view('products.index') -> with('title', $title); chỉ có thể truyền 1 biến và phải đặt key
        // return view('products.index', compact('syphoned'));
        $myphone = [
            'name' => 'ssglxs22',
            'year' => 2022
        ];
        return view('products.index', compact('myphone'));
    }
    public function about() {
        return ('this is about page');
    }
    public function detail($id){
        return ('product id = '.$id);
    }
}
