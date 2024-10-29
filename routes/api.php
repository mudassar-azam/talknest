<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/data', function () {
    return response()->json([
        'message' => 'This is a sample API response',
        'data' => [
            'foo' => 'bar',
            'baz' => 'qux'
        ]
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [APIController::class, 'register']);
Route::post('login', [APIController::class, 'login']);
Route::post('update/{id}', [APIController::class, 'update']);
Route::get('getalluser', [APIController::class, 'getalluser']);
Route::get('user/{id}', [APIController::class, 'show']);

//category route

Route::get('categories', [APIController::class, 'getCategoryData']);
Route::get('/blogs/category/{categoryId}', [APIController::class,  'getBlogsByCategory']);
Route::get('/blogs/{blogId}', [APIController::class, 'getBlog']);
Route::get('getallblogs', [APIController::class, 'getallblogs']);




//comment api routes
Route::post('postComment', [APIController::class, 'postComment']);
Route::get('comments', [APIController::class, 'allcomments']);
Route::put('/comment/{id}', [APIController::class, 'updateComment']);
Route::delete('/comment/{id}', [APIController::class, 'deleteComment']);

Route::post('aboutus', [APIController::class, 'aboutus']);

Route::post('/submit-form', [\App\Http\Controllers\APIController::class, 'submitForm'])->name('submit.form');


//

Route::post('/comment/replay', [\App\Http\Controllers\APIController::class, 'postCommentReplay']);
Route::put('/comment/replay/{id}', [\App\Http\Controllers\APIController::class, 'updateReplay']);
Route::delete('/comment/replay/{id}', [\App\Http\Controllers\APIController::class, 'deleteReplay']);


//chat API


Route::post('sendMessage', [APIController::class, 'sendMessage']);
Route::get('getallchat', [APIController::class, 'getallchat']);
Route::get('room_messages/{id}', [APIController::class, 'room_messages']);
Route::get('chats/{from_id}/{to_id}', [APIController::class, 'getChatsBetweenUsers']);

//members post

Route::get('/test-cors', function (Request $request) {
    return response()->json(['message' => 'CORS Test'], 200)->header('Access-Control-Allow-Origin', 'http://localhost:9000');
});
Route::post('memberpost', [APIController::class, 'memberpost']);
Route::get('getallmemberpost', [APIController::class, 'getallmemberpost']);



Route::post('/send-friend-request', [\App\Http\Controllers\FriendRequestController::class, 'sendRequest']);
Route::get('/user/{userId}/recive-requests-from', [\App\Http\Controllers\FriendRequestController::class, 'receiveRequests']);
Route::put('/accept-friend-request/{id}', [\App\Http\Controllers\FriendRequestController::class, 'acceptRequest']);
Route::get('/user/{userId}/accepted-friends', [\App\Http\Controllers\FriendRequestController::class, 'getAcceptedFriends']);



Route::get('posts',  [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::post('post',  [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::put('post/{id}',  [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('post/{id}',  [\App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');



Route::get('/nests', [\App\Http\Controllers\NestController::class, 'index']);
Route::get('/nest/{id}', [\App\Http\Controllers\NestController::class, 'show']);
Route::post('/nest', [\App\Http\Controllers\NestController::class, 'store']);
Route::put('/nest/{id}', [\App\Http\Controllers\NestController::class, 'update']);
Route::delete('/nest/{id}', [\App\Http\Controllers\NestController::class, 'destroy']);


Route::post('/RequestToNest', [\App\Http\Controllers\NestPeopleController::class, 'sendRequest']);
Route::get('/user/{userId}/nest-pending-requests', [\App\Http\Controllers\NestPeopleController::class, 'showUserPendingRequests']);
Route::put('/update-nest-request/{id}', [\App\Http\Controllers\NestPeopleController::class, 'updateRequest']);
Route::post('/direct-join', [\App\Http\Controllers\NestPeopleController::class, 'directJoinNest']);








Route::get('Category/api' , [GroupApiController::class , 'index']);
Route::post('create/category', [GroupApiController::class , 'create']);
Route::put('cateory/edit/{id}' , [GroupApiController::class , 'edit']);
Route::delete('cateory/delete/{id}' , [GroupApiController::class , 'delete']);



Route::get('group/api/{id}' , [GroupApiController::class , 'groupindex']);
Route::post('group/create' , [GroupApiController::class , 'groupcreate']);
Route::put('group/edit/{id}' , [GroupApiController::class , 'groupedit']);
Route::delete('group/delete/{id}' , [GroupApiController::class , 'groupdelete']);



Route::get('group/comment/{id}' , [GroupApiController::class , 'commentindex']);
Route::post('create/comment' , [GroupApiController::class , 'createcomments']);
Route::put('edit/comment/{id}' , [GroupApiController::class , 'editcomment']);
Route::delete('delete/comment/{id}' , [GroupApiController::class , 'deletecomment']);

Route::get('/categories-with-comments-replies', [APIController::class, 'getCategoryDataWithCommentsAndReplies']);

Route::get('group/comments', [GroupApiController::class, 'commentindeex']);


