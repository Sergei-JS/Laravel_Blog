<?php


use App\Http\Middleware\AdminMiddleware;


use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('maine.index');


});
Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/post', 'IndexController')->name('post.index');
    Route::get('/post/{post}', 'ShowController')->name('post.show');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//1
//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');
//
////2
//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//
//    return redirect('/home');
//})->middleware(['auth', 'signed'])->name('verification.verify');
//
////3
//Route::post('/email/verification-notification', function (Request $request) {
//    $request->user()->sendEmailVerificationNotification();
//
//    return back()->with('message', 'Verification link sent!');
//})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//admin

Route::group(array(['namespace' => 'App\Http\Controllers\Personal']), function () {
    Route::group(['namespace' => 'App\Http\Controllers\Personal\Main'], function () {
        Route::get('/personal', 'IndexController')->middleware('auth','verified')->name('personal.main.index');
    });
    Route::group(['namespace' => 'App\Http\Controllers\Personal\Like'], function () {
        Route::get('/likes', 'IndexController')->name('personal.liked.index');
        Route::delete('/likes/{post}', 'DeleteController')->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'App\Http\Controllers\Personal\Comment'], function () {
        Route::get('/comments', 'IndexController')->name('personal.comment.index');
        Route::delete('comments/{comment}', 'DeleteController')->name('personal.comment.delete');
    });

});

Route::group(array(['namespace' => 'App\Http\Controllers\Admin']), function () {
    Route::group(['namespace' => 'App\Http\Controllers\Admin\Main'], function () {
        Route::get('/admin', 'IndexController')->middleware('auth','admin','verified')->name('admin.main.index');
    });
    Route::group(['namespace' => 'App\Http\Controllers\Admin\Post', 'prefix=' => 'posts'], function () {
        Route::get('/posts', 'IndexController')->name('admin.post.index');
        Route::get('posts/creat', 'CreatController')->middleware('auth','admin','verified')->name('admin.post.creat');
        Route::post('posts/store', 'StoreController')->middleware('auth','admin','verified')->name('admin.post.store');
        Route::get('posts/{post}', 'ShowController')->middleware('auth','admin','verified')->name('admin.post.show');
        Route::get('posts/{post}/edit', 'EditController')->middleware('auth','admin','verified')->name('admin.post.edit');
        Route::patch('posts/{post}', 'UpdateController')->middleware('auth','admin','verified')->name('admin.post.update');
        Route::delete('posts/{post}', 'DeleteController')->middleware('auth','admin','verified')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Admin\Category', 'prefix=' => 'categories'], function () {
        Route::get('/categories', 'IndexController')->middleware('auth','admin','verified')->name('admin.category.index');
        Route::get('categories/creat', 'CreatController')->middleware('auth','admin','verified')->name('admin.category.creat');
        Route::post('categories/store', 'StoreController')->middleware('auth','admin','verified')->name('admin.category.store');
        Route::get('categories/{category}', 'ShowController')->middleware('auth','admin','verified')->name('admin.category.show');
        Route::get('categories/{category}/edit', 'EditController')->middleware('auth','admin','verified')->name('admin.category.edit');
        Route::patch('categories/{category}', 'UpdateController')->middleware('auth','admin','verified')->name('admin.category.update');
        Route::delete('categories/{category}', 'DeleteController')->middleware('auth','admin','verified')->name('admin.category.delete');
    });
    Route::group(['namespace' => 'App\Http\Controllers\Admin\Tag', 'prefix=' => 'tags'], function () {
        Route::get('/tags', 'IndexController')->middleware('auth','admin','verified')->name('admin.tag.index');
        Route::get('tags/creat', 'CreatController')->middleware('auth','admin','verified')->name('admin.tag.creat');
        Route::post('tags/store', 'StoreController')->middleware('auth','admin','verified')->name('admin.tag.store');
        Route::get('tags/{tag}', 'ShowController')->middleware('auth','admin','verified')->name('admin.tag.show');
        Route::get('tags/{tag}/edit', 'EditController')->middleware('auth','admin','verified')->name('admin.tag.edit');
        Route::patch('tags/{tag}', 'UpdateController')->middleware('auth','admin','verified')->name('admin.tag.update');
        Route::delete('tags/{tag}', 'DeleteController')->middleware('auth','admin','verified')->name('admin.tag.delete');
    });
    Route::group(['namespace' => 'App\Http\Controllers\Admin\User', 'prefix=' => 'users', 'middleware'=>['auth','admin','verified']], function () {
        Route::get('/users', 'IndexController')->middleware('auth','admin','verified')->name('admin.user.index');
        Route::get('users/creat', 'CreatController')->middleware('auth','admin','verified')->name('admin.user.creat');

        Route::post('users/store', 'StoreController')->middleware('auth','admin','verified')->name('admin.user.store');
        Route::get('users/{user}', 'ShowController')->middleware('auth','admin','verified')->name('admin.user.show');
        Route::get('users/{user}/edit', 'EditController')->middleware('auth','admin','verified')->name('admin.user.edit');
        Route::patch('users/{user}', 'UpdateController')->middleware('auth','admin','verified')->name('admin.user.update');
        Route::delete('users/{user}', 'DeleteController')->middleware('auth','admin','verified')->name('admin.user.delete');
    });
});


Auth::routes(['verify'=>true]) ;


