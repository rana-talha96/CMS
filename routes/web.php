<?php

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Photo;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use function PHPUnit\Framework\returnSelf;

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

Route::get('/', function () {
    // echo "Hello World!";
    return view('welcome');
});


// Route::get('/{name}', function($name){
//     return App::call([PostController::class, $name]);

// });

// Route::get('/{name}', [PostController::class, 'index']);


// Route::get('/{first}.{last}/{number}', function($first,$last, $number){
//     return "Hi my first name is ".$first.", my last name is ".$last." and my number is ".$number;
// });

// Route::get('/home/admin/example', array('as'=>'admin.home', function(){
//     return 'Hi this is talha here <a href="route(\'admin.home\')">Click here</a>';
// }));

// Route::resource('posts', PostController::class);

// Route::get('/contact', [PostController::class, 'contact_view']);

// Route::get('/show/{name}/{number}', [PostController::class, 'show_view']);


/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/


// Route::get('/data_in', function(){
//     DB::insert('insert into posts(title, content) values(?,?)', ['Cricket', 'Pakistan cricket team has his first round 12 is with india on 23 Oct and we want and hope pakistan win']);
// });

// Route::get('/insert/{title}/{content}', function($title, $content){
//     DB::insert('insert into posts(title, content) values(?,?)', [
//         $title, 
//         $content
//     ]);
// });

// Route::get('/data_out', function(){
//     $post = DB::table('posts')->select('title','content')->get();
//     return var_dump($post);
// });

// Route::get('/update/{title}/{id}', function($title, $id){
//     $post = DB::update('update posts set title=? where id=?', [$title, $id]);
//     return $post;
// });

// Route::get('/delete/{id}', function($id){
//     $post = DB::delete('delete from posts where id=?', [$id]);
//     return $post;
// });


/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
*/


// Route::get('/read', function(){
//     $post = Post::all();
//     return $post;
// });

// Route::get('/find/{id}', function($id){
//     $post = Post::find($id);
//     return $post;
// });

// Route::get('/findwhere', function(){
//     $post = Post::all()->sortBy('id');
//     return $post;
// });

// Route::get('/findwhere.{id}', function($id){
//     $post = Post::where('id', $id)->orderBy('id', 'desc')->take(1)->get();
//     return $post;
// });

// Route::get('/ORM/insert' ,function(){
//     $post = new Post;
//     $post->title = 'Insert VIA ORM';
//     $post->content = 'This data is inserted by using of ORM method hope we like this';
//     $post->save();
//     return $post;
// });

// Route::get('/ORM/insert/{title}/{content}' ,function($title, $content){
//     $post = new Post;
//     $post->title = $title;
//     $post->content = $content;
//     $post->save();
//     return $post;
// });

// Route::get('/ORM/{id}/{title}/{content}' ,function($id, $title, $content){
//     $post = Post::find($id);
//     $post->title = $title;
//     $post->content = $content;
//     $post->save();
//     return $post;
// // });

// Route::get('/show', function(){
//     return Post::all();
// });

// Route::get('/create', function(){
//     $post = Post::create([  
//         'user_id' => 1,
//         'title' => 'post title 6',
//         'content' => 'this post content is related to post title 6 title',
//     ]);
//     // return redirect('/show');
// });

// Route::get('/update', function(){
//     $post = Post::find(3)->update([
//         'title'=>'Adnan Ranjha',
//         'content'=>'this post content is related to Adnan Ranjha title'
//     ]);
//     return $post; 
// });

// Route::get('/delete/{id}', function($id){
//     $post = Post::find($id);
//     if ($post){
//         $post->delete();
//         return redirect('/show');
//     }else{
//         return "Post Not Found";
//     }
// });

// Route::get('/readdelete', function(){
//     $post = Post::withTrashed()->whereNotNull('deleted_at') ->get();
//     return $post;
// });

// Route::get('/restoredel/{id}', function($id){
//     $post = Post::withTrashed()->whereNotNull('deleted_at')->where('id', $id)->restore();
//     if ($post){
//         return redirect('/show');
//     } else {
//         return "Post Not Found";
//     }
// });

// Route::get('/forcedel/{id}', function($id){
//     $post = Post::withTrashed()->whereNotNull('deleted_at')->where('id', $id)->forceDelete();
//     if ($post){
//         return redirect('/show');
//     } else {
//         $post = Post::find($id)->forceDelete();
//         if ($post){
//             return redirect('/show');
//         } else {
//             return "Post Permnent Deleted for Database";
//         }
//     }
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
*/
// One to One Relation
// Route::get('user/{id}/post', function($id){
//     return User::find($id)->post;
// });

// Route::get('post/{id}/user', function($id){
//     return Post::find($id)->user->name;
// });

// // One to Many Relation
// Route::get('user/{id}/posts', function($id){
//     $user = User::find($id);
//     return $user->posts;
// });

// // Many to Many Relation
// Route::get('user/{id}/role', function($id){
//     $user = User::find($id);
//     foreach ($user->roles as $role){
//         echo "User Name is : ". $user->name . "<br>";
//         echo $user->name ."'s role is : ". $role->name;
//     }
// });

// // Accessing the intermdiiat table/pivot

// Route::get('user/{id}/pivot' , function($id){
//     $user = User::find($id);
//     foreach($user->roles as $role){
//         return $role->pivot;
//     }
// });

// Route::get('user/{id}/country' , function($id){
//     $user = User::find($id);
//     foreach($user->countries as $country){
//         return $country->name;
//     }
// });

// Route::get('country/{id}/posts', function($id){
//     $country = Country::find($id);
//     foreach ($country->posts as $post) {
//         echo $country->name . " has post \"" . $post->title  . " and the post user is " . $post->user->name ."<br>";
//     }
// });

// Polyorphic Relations
// Route::get('user/photo', function(){
//     $user = User::find(1);
//     // dd($user->photos);
//     foreach ($user->photos as $photo){
//         echo $photo->path . "<br>";
//     }
// });

// Route::get('post/photo', function(){
//     $post = Post::find(1);
//     // dd($user->photos);
//     foreach ($post->photos as $photo){
//         echo $photo->path . "<br>";
//     }
// });

// Route::get('photo/{id}/user', function($id){
//     $photo = Photo::find($id);
//     return $photo->imageable;
// });

// Route::get('post/{id}/tag', function($id){
//     $post = Post::find($id);
//     foreach ($post->tags as $tag) {
//         return $tag->name;
//     }
// });

// Route::get('tag/post', function(){
//     $tag = Tag::find(1);
//     foreach ($tag->posts as $post) {
//         return $post;
//     }
// });


// Route::get('/hi', function(){
//     $users = User::all();
//     foreach($users as $user) {
//         echo "ID:- ".$user->id ."<br>";
//         echo "User Name:- " . $user->name . "<br>";
//         echo "User Email:- " . $user->email . "<br>";
//         echo "User Role:- " . $user->roles->first()->name . "<br>";
//         echo "User Country:- " . $user->countries->first()->name . "<br>";
//         echo "User Total Posts:- " . count($user->posts) . "<br>";
//         echo "User Password:- " . $user->password . "<br>";
//         echo "____________________________________<br><br><br>";
//     }
// });

/*
|--------------------------------------------------------------------------
| CRUD Application
|--------------------------------------------------------------------------
*/

// Route::get('/{name}', [PostController::class, 'index']);


// Route::get('/{first}.{last}/{number}', function($first,$last, $number){
//     return "Hi my first name is ".$first.", my last name is ".$last." and my number is ".$number;
// });

// Route::get('/home/admin/example', array('as'=>'admin.home', function(){
//     return 'Hi this is talha here <a href="route(\'admin.home\')">Click here</a>';
// }));

// Route::get('/contact', [PostController::class, 'contact_view']);

// Route::get('/show/{name}/{number}', [PostController::class, 'show_view']);

Route::get('/date', function(){
    $date = new DateTime(now());
    // echo $date->format('d-m-Y h:i A');
    echo Carbon::now()->diffForHumans(); 
});

Route::get('/accesr', function(){
    $user = User::findOrFail(1);

    return $user;
});

Route::get('/mutator', function(){
    $user = User::findOrFail(1);
    $user->name = 'rana talha';
    $user->save();
});



Route::group(['middleware'=>'web'], function(){

    Route::resource('posts', PostController::class);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
