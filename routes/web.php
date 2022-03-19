<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Models\Group;

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

Route::group(['middleware' => 'auth'], function () {
    
  Route::post('group/{group}/join', [MemberController::class, 'store'])->name('join');
  Route::post('group/{group}/exit', [MemberController::class, 'destroy'])->name('exit');
  
  Route::get('/group/mygroup', [GroupController::class, 'mydata'])->name('group.mygroup');
  Route::get('/group/ownergroup', [GroupController::class, 'ownerdata'])->name('group.ownergroup');
  Route::get('/group/{group}/room', [GroupController::class, 'room'])->name('group.room');
  
  Route::resource('group', GroupController::class);
  Route::resource('post', PostController::class);
});

Route::get('/', function () {
      $groups = Group::getAllOrderByUpdated_at();
      return view('top', [
      'groups' => $groups
      ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/mypage/index', function () {
    return view('mypage.index');
})->middleware(['auth'])->name('mypage.index');

require __DIR__.'/auth.php';
