<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//admin panel routes

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function(){
        if (Auth::user()->role_as !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.admin');
    });

    Route::get('/homepage', function(){
        if (Auth::user()->role_as !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.homepage');
    });

    Route::get('/category', function(){
        if (Auth::user()->role_as !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        $posts = category::all();

        return view('admin.category', compact('posts'));
    });

    // Route::get('/blog', function(){
    //     if (Auth::user()->role_as !== 'admin') {
    //         abort(403, 'Unauthorized action.');
    //     }

    //     return view('admin.blogs');
    // });

    Route::get('/blog', [AdminController::class , 'blogview']);

    //add routes

    Route::post('/addonesection',[AdminController::class, 'store'])->name('store');
    //category

    Route::post('/addcategory',[AdminController::class, 'category']);
    Route::delete('/category/{id}',[AdminController::class, 'destroycategory'])->name('category.destroycategory');
    Route::post('/editcategory/{id}',[AdminController::class, 'editCategory'])->name('editcategory');
    //blog routes
    Route::post('/addblog',[AdminController::class, 'blog']);
    Route::delete('/blog/{id}',[AdminController::class, 'deleteblog'])->name('blog.deleteblog');
    Route::match(['get', 'post'], '/blog/{id}/edit', [AdminController::class, 'editblog'])->name('blog.edit');



});




//auth routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//view pages route
Route::get('/', function () {
    return view('front.home');
});

Route::get('/stock', function () {
    return view('front.stocksource');
});

Route::get('/about', function () {
    return view('front.aboutus');
});

Route::get('/profile', [FrontController::class, 'profile'])->name('profile');

Route::get('/editProfile', function () {
    return view('front.editProfile');
});


Route::get('/signin', function () {
    return view('front.signin');
});

Route::get('/signup', function () {
    return view('front.signup');
});


Route::get('/dashboard', function () {
    return view('front.dashboard');
})->name("dashboard");


Route::get('/frontblog/{id}', function ($id) {
    $posts = category::join('blogs','blogs.category_id','=','categories.id')->where('blogs.category_id','=',$id)->get();
    $post = category::find($id);
    return view('front.frontblog', ['posts' => $posts, 'post' => $post]);
})->name('frontblog');

Route::get('blogdetail/{id}',[FrontController::class,'blogdetail'])->name('blogdetail');
//comment Route
Route::post('addComment',[FrontController::class,'addComment'])->name('addComment');
//Edit user Routes

Route::post('/update', [RegisteredUserController::class,'update'])->name('update');
Route::post('/upload', [RegisteredUserController::class, 'upload']);
Route::get('/showimage', [FrontController::class, 'showimage']);

