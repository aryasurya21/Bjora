<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/AddQuestion','QuestionController@addQuestion')->name('addquestion');
Route::post('/home','QuestionController@insertQuestion')->name('insertquestion');
Route::get('/DisplayQuestion','QuestionController@displayQuestion')->name('displayquestion');
Route::get('/UpdateQuestion/{questionid}','QuestionController@updateQuestion')->name('updatequestion');
Route::get('/DeleteQuestion/{questionid}','QuestionController@deleteQuestion')->name('deletequestion');
Route::post('/EditQustion','QuestionController@editQuestion')->name('editquestion');
Route::get('/Answers/{questionid}','AnswerController@displayAnswer')->name('displayanswer');

