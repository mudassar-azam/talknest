<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\wishlistController;
use  App\Http\Controllers\frontblogController;
use  App\Http\Controllers\GroupCommentReplyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\category;
use App\Models\group;
use App\Http\Controllers\ContactController;


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

Route::get('/chat', function () {
    return view('front.chat');
});

Route::get('/stock', function () {
    return view('front.stocksource');
});

Route::get('/about', function () {
    return view('front.aboutus');
});

Route::get('/terms-of-service', function () {
    return view('front.termsofservice');
});


Route::get('/contact-us', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact-us', [ContactController::class, 'submitForm'])->name('contact.submit');



Route::get('/privacy-policy', function () {
    return view('front.privacypolicy');
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
    $categories = Category::where('add_to_fav', 1)->get();
    $posts = category::join('blogs','blogs.category_id','=','categories.id')->where('blogs.category_id','=',1)->get();
    $blog = category::find(1);
    $groups = group::with(['category' => function($query) {
        $query->where('status', 1);
    }])->whereHas('category', function($query) {
        $query->where('status', 1);
    })->get();
    return view('front.dashboard', compact('categories','posts','blog','groups'));
})->name("dashboard");
//   Add to wish List route

Route::post('/wishlist', [wishlistController::class ,"addwishlist"])->name('add.wishlist');

// Add Comment

Route::post('/tslaComment', [wishlistController::class, 'tslaComment'])->name('tslaComment');
Route::get('/fetchtslaComments', [wishlistController::class, 'fetchtslaComments'])->name('fetchtslaComments');
Route::post('/msftComment', [wishlistController::class, 'msftComment'])->name('msftComment');
Route::get('/fetchmsftComments', [wishlistController::class, 'fetchmsftComments'])->name('fetchmsftComments');
Route::post('/brkComment', [wishlistController::class, 'brkComment'])->name('brkComment');
Route::get('/fetchbrkComments', [wishlistController::class, 'fetchbrkComments'])->name('fetchbrkComments');
Route::post('/vtiComment', [wishlistController::class, 'vtiComment'])->name('vtiComment');
Route::get('/fetchvtiComments', [wishlistController::class, 'fetchvtiComments'])->name('fetchvtiComments');
Route::post('/googlComment', [wishlistController::class, 'googlComment'])->name('googlComment');
Route::get('/fetchgooglComments', [wishlistController::class, 'fetchgooglComments'])->name('fetchgooglComments');
Route::post('/aaplComment', [wishlistController::class, 'aaplComment'])->name('aaplComment');
Route::get('/fetchaaplComments', [wishlistController::class, 'fetchaaplComments'])->name('fetchaaplComments');
Route::post('/amznComment', [wishlistController::class, 'amznComment'])->name('amznComment');
Route::get('/fetchamznComments', [wishlistController::class, 'fetchamznComments'])->name('fetchamznComments');
Route::post('/vooComment', [wishlistController::class, 'vooComment'])->name('vooComment');
Route::get('/fetchvooComments', [wishlistController::class, 'fetchvooComments'])->name('fetchvooComments');


Route::get('/removefav/{id}' , [wishlistController::class ,'removefav'])->name('remove.fav');

Route::post('/joinGroup', [FrontController::class, 'joinGroup'])->name('joinGroup');
Route::post('/leaveGroup', [FrontController::class, 'leaveGroup'])->name('leaveGroup');
Route::post('/commentReply', [GroupCommentReplyController::class, 'commentReply'])->name('comment.reply');

// newWork
Route::post('/addPost', [FrontController::class, 'addPost'])->name('addPost');
Route::get('/fetchtPosts', [FrontController::class, 'fetchtPosts'])->name('fetchtPosts');
Route::get('/editpost/{id}', [FrontController::class, 'editpost'])->name('editpost');
Route::post('/postEdit/{id}', [FrontController::class, 'postEdit'])->name('postEdit');
Route::get('/addToFav/{id}', [FrontController::class, 'addToFav'])->name('addToFav');
Route::get('/removeFromFav/{id}', [FrontController::class, 'removeFromFav'])->name('removeFromFav');



Route::get('/frontblog/{id}', function ($id) {
    $posts = category::join('blogs','blogs.category_id','=','categories.id')->where('blogs.category_id','=',$id)->get();
    $blog = category::find($id);
    $groups = group::where('category_id' , $blog->id )->get();
    return view('front.frontblog', ['posts' => $posts, 'blog' => $blog , 'groups' => $groups]);
})->name('frontblog');
Route::get('blogdetail/{id}',[FrontController::class,'blogdetail'])->name('blogdetail');
//comment Route
Route::post('addComment',[FrontController::class,'addComment'])->name('addComment');
//Edit user Routes

Route::post('/update', [RegisteredUserController::class,'update'])->name('update');
Route::post('/upload', [RegisteredUserController::class, 'upload']);
Route::get('/showimage', [FrontController::class, 'showimage']);




Route::get('/createblog/{id}' , [frontblogController::class , 'index'])->name('front.blog.create');
Route::post('/storeblog' , [frontblogController::class , 'store'])->name('front.blog.store');
Route::get('updateblog/{id}' , [frontblogController::class , 'update'])->name('front.update.show');
Route::post('/blog/update/{id}' , [frontblogController::class , 'storeUpdate'])->name('fornt.update');
Route::get('delete/blog/{id}' , [frontblogController::class , 'destroy'])->name('delete.blog');







Route::post('/addGroupName', [FrontController::class, 'addGroupName'])->name('addGroupName');


Route::post('/blogcomment' , [FrontController::class , 'blogcomment'])->name('blog.comment');

Route::post('update/comment' , [FrontController::class , 'updatecomment'])->name('update.comment');
Route::get('delete/comment/{id}' , [FrontController::class , 'deletecomment'])->name('comment.delete');


Route::post('update/group' , [FrontController::class , 'editblog'])->name('edit.blog');
Route::get('delete/group/{id}' , [FrontController::class , 'deleteblog'])->name('group.delete');




Route::get('/test', function () {
    return view('tester');
});

Route::get('/stock-data',  [\App\Http\Controllers\StockController::class, 'getStockData']);

Route::get('/all-companies', [\App\Http\Controllers\StockController::class, 'getAllCompanies']);


