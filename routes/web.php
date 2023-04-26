<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LoggedIn;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\QuestionComponent;
use App\Http\Livewire\EditquestionComponent;




Route::get('list', [
    LoginController::class,
    'list'
]);
Route::post('postCheck',[
    LoginController::class,
    'postCheck'
])->name('postCheck');

Route::post('postQuestion', [
    LoginController::class,
    'addQuestion'
]);
Route::post('postUpdate', [
    LoginController::class,
    'updateQuestion'
]);
Route::post('postLogout', [
    LoginController::class,
    'Logout'
]);
Route::post('postLogin', [
    LoginController::class,
    'postLogin'
]);
Route::post('session', [
    LoginController::class,
    'session'
]);

Route::post('upload', [
    LoginController::class,
    'uploadimage'
])->name('ckeditor.upload');
Route::get('edit-Question/{id}', [LoginController::class,'editQuestion'])->name('editQuestion');
Route::get('delete-Question/{id}', [LoginController::class,'deleteQuestion'])->name('deleteQuestion');
Route::get('Question/{id}', [LoginController::class,'Question'])->name('Question');
// Route::get('/', [
//     PagesController::class,
//     'index'
// ]);
Route::get('/', [
    LoginController::class,
    'loginPage'
]);
Route::middleware('CheckLogin')->group(function () {
    Route::get('edit', [
        LoginController::class,
        'show'
    ]);
    Route::get('exam/{id}',[
        LoginController::class,
        'examPage'
    ])->name('exam');
    Route::get('question', QuestionComponent::class,'render');
    Route::get('results', [
        LoginController::class,
        'results'
    ])->name('results');
    Route::get('admin', [
        LoginController::class,
        'admin'
    ]);
    Route::get('postReWork', [
        LoginController::class,
        'postReWork'
    ]);
    Route::post('postSearch', [
        LoginController::class,
        'postSearch'
    ]);
    Route::post('import', [
        LoginController::class,
        'import'
    ])->name('import');
});

Route::get('getvalue', [
    LoginController::class,
    'getvalue'
])->name('getValue');
Route::get('topic',[
    LoginController::class,
    'topic'
])->name('topic');
Route::get('infor',[
    LoginController::class,
    'getTopic'
])->name('getTopic');

Route::get('products', [
    ProductsController::class, 
    'index'
]);

Route::get('products/{id}', [
    ProductsController::class, 
    'detail'
]) ->where(['id' => '[0-9]+']);

//      

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! 
|
*/

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/users', function () { 
//     return "users";
// });
// Route::get('/juices', function () {
//      return ["apple","banana","pineapple",]; 
// });
// Route::get('/wrong', function () { 
//     return  redirect('/'); 
// });