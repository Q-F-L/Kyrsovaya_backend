<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'UserController@register')->name('register');

Route::get('/', function(){
    $touragents = \App\Models\Touragent::all();
    $tours = \App\Models\Tour::all();
    $users = \App\Models\Users::all();
    $courses = \App\Models\Courses::all();

    //Один к одному

    // foreach($touragents as $touragent){
    //     echo 'Touragent name '.$touragent["name"].'<br>';
    //     echo 'Tour: '.$touragent->tour["name"].'<br>';
    // }

    // foreach($tours as $tour){
    //     echo 'Tour name:'.$tour["name"].'<br>';
    //     echo 'Touragent: '.$tour->touragent["name"].'<br>';
    //     echo '---------------------------------------------'.'<br>';
    // }

    //Один к многим

    // foreach($users as $user){
    //     echo 'User name:'.$user["name"].'<br>';
    //     echo 'User\'s courses: ';
    //     foreach($user->courses as $course){
    //         echo $course['title'].', ';
    //     }
    //     echo '<br>';
    //     echo '---------------------------------------------'.'<br>';
    // }

    foreach($courses as $course){
        echo 'Course titel: '.$course["title"].'<br>';
        echo 'User: '.$course->user["name"].'<br>';
        echo '---------------------------------------------'.'<br>';
    }
});