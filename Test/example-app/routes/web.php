<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use PHPUnit\Framework\Constraint\Count;

use function Psy\debug;

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
/*
Route::get('/', function () {
    return view('welcome');
    //return "Hey";
});

Route::get('/about', function () {
    //return view('welcome');
    return "Hey about page...";
});

Route::get('/contact', function () {
    //return view('welcome');
    return "hi contact page";
});

Route::get('/post/{id}/{name}',function($id,$name){
    return "This is a page for " . $id . " " .$name;

});

Route::get('admin/posts/example',array('as' => 'admin.home',function(){
    $url=route ('admin.home');
    return "this route is ". $url;

}));
*/

//Route::get('/post/{id}','\App\Http\Controllers\PostsController@index');

//Route::resource('posts','App\Http\Controllers\PostsController');

/*
Route::get('/contact', 'App\Http\Controllers\PostsController@myContacts');

Route::get('/post/{id}/{name}/{city}', 'App\Http\Controllers\PostsController@showMyPost');

Route::get('/insert', function () {

    DB::insert('insert into posts(title,content) values(?,?)', ['Python', 'Django mango...']);
});
*/
/*
Route::get('/read', function () {
    $results = DB::select('select * from posts where id=?', [1]);

    return $results;
    /*foreach($results as $result){
        return $result->title;
    }
});
*/
/*
Route::get('/update', function () {
    $update = DB::update('update posts set title="PHP_Updated" where id=?', [1]);
    return $update;
});

Route::get('/delete', function () {
    $delete = DB::delete('delete from posts where id=?', [2]);
    return $delete;
});

Route::get('/findall', function () {
    $posts = Post::all();
    foreach ($posts as $post) {
        return $post->title;
    }
});

Route::get('/findrecord', function () {
    $posts = Post::find(1);
    return $posts->title;
    //foreach ($posts as $post) {
     //   return $post->title;
    //}
});
*/

Route::get('/findrecordid', function () {
    $posts = Post::where('id', 4)->orderBy('id', 'desc')->take(1)->get();
    return $posts;
});

Route::get('/findmore1', function () {
    $posts = Post::findOrFail(2);
    return $posts;
});


/*Route::get('/findmore2', function () {
    $posts = Post::where('user_count','<',50)->firstOrFail();
    return $posts;
});


Route::get('/insert2', function () {
    $post = new Post;
    $post->title = "New PL";
    $post->content = "This is a new programming language";
    $post->save();
});

Route::get('/insert2update', function () {
    $post = Post::find(3);
    $post->title = "Java 2021";
    $post->content = "This is a 2021 model programming language";
    $post->save();
});

Route::get('/create', function () {
    Post::create(['title' => 'test title', 'content' => 'test content']);
});

Route::get('/update3',function(){
    Post::where('id',8)->where('is_admin',0)->update(['title'=>'New One','content'=>'New Software']) ;
});

Route::get('/delete2',function(){
    $post=Post::find(8);
    $post->delete();
});

Route::get('/delete3',function(){
    Post::destroy(10,11);
});

Route::get('/delete4',function(){
    Post::where('is_admin',1)->delete();
});

Route::get('/softdelete',function(){
    Post::find(15)->delete();
});

Route::get('/readsoftdelete',function(){
    return Post::withTrashed()->where('id',16)->get();
    //return Post::onlyTrashed()->where('id',16)->get();

});

Route::get('/restore',function(){
    Post::withTrashed()->where('is_admin',0)->restore();
});

Route::get('/permanantdelete',function(){
    Post::onlyTrashed()->where('is_admin',0)->forceDelete();
});
*/

/*
----------------------
ELAQUENT RELATIONSHIPS
----------------------
*/

//One to one relation
Route::get('/user/{id}/post', function ($id) {

    return User::find($id)->post;
    //return User::find($id)->post->title;

});

Route::get('/post/{id}/user', function ($id) {

    return Post::find($id)->user->name;
});

// One to many relationship
Route::get('/posts', function () {
    $user = User::find(1);

    foreach ($user->posts as $post) {
        echo $post->title . "<br>";
    }
});

Route::get('/user/{id}/role', function ($id) {
    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
    return $user;


    /*$user = User::find($id);
    foreach ($user->roles as $role) {
        return $role->name;
    }*/
});

//Access pivot
Route::get('user/pivot', function () {
    $user = User::find(1);
    foreach ($user->roles as $role) {
        echo $role->pivot->created_at;
    }
});

Route::get('user/{id}/country', function ($id) {
    $country = Country::find($id);
    foreach ($country->posts as $post) {
        return $post->title;
    }
});

Route::get('user/photos',function(){
    $user=User::find(1);
    foreach ($user->photos as $photo) {
        return $photo->path;
    }
});

Route::get('post/photos',function(){
    $post=Post::find(1);
    foreach ($post->photos as $photo) {
        return $photo->path;
    }

    return 'Email will be sent in a couple seconds'; // now it is 5 seconds
});
