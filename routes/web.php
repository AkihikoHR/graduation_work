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
    
  Route::get('group/{group}/join', [MemberController::class, 'store'])->name('join');
  Route::get('group/{group}/exit', [MemberController::class, 'destroy'])->name('exit');
  
  Route::get('/group/mygroup', [GroupController::class, 'mygroup'])->name('group.mygroup');
  Route::get('/group/admin', [GroupController::class, 'admin'])->name('group.admin');
  Route::get('/group/{group}/room', [GroupController::class, 'room'])->name('group.room');
  
  Route::resource('group', GroupController::class);
  Route::resource('post', PostController::class);
  
  Route::get('/mypage/index', function(){return view('mypage.index');})->name('mypage.index');
  Route::get('/mypage/profile', function(){return view('mypage.profile');})->name('mypage.profile');
  
});

Route::get('/', function () {
      $groups = Group::getAllOrderByUpdated_at();
      return view('top', [
      'groups' => $groups
      ]);
});

Route::get('/dashboard', function () 
{
//    if (Auth::user()->id === 1){
       return view('dashboard');
//    } else {
//       return view('mypage.profile');
//    }
})->middleware(['auth'])->name('dashboard');
    
    
//   return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
