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
Route::post('/home','QuestionController@insertQuestion')->name('insertquestion')->middleware('auth');

Route::get('/DisplayQuestion','QuestionController@displayQuestion')->name('displayquestion')->middleware('auth');
Route::get('/ListQuestion','QuestionController@displayAllQuestion')->name('displayallquestion')->middleware('auth','admin');
Route::get('/AddQuestion','QuestionController@addQuestion')->name('addquestion')->middleware('auth');
Route::get('/UpdateQuestion/{questionid}','QuestionController@updateQuestion')->name('updatequestion')->middleware('auth');
Route::post('/EditQustion','QuestionController@editQuestion')->name('editquestion')->middleware('auth');
Route::get('/DeleteQuestion/{questionid}','QuestionController@deleteQuestion')->name('deletequestion')->middleware('auth');
Route::get('/CloseQuestion/{questionid}','QuestionController@closeQuestion')->middleware('auth','admin');

Route::get('/DisplayAnswer/{questionid}','AnswerController@displayAnswer')->name('displayanswer');
Route::post('/AddAnswer','AnswerController@addAnswer')->name('addanswer')->middleware('auth');
Route::get('/DeleteAnswer/{answerid}','AnswerController@deleteAnswer')->middleware('auth');

Route::get('/ListUser','UserController@displayAll')->name('displayalluser')->middleware('auth','admin');
Route::post('/InsertUser','UserController@insertUser')->name('insertuser')->middleware('auth','admin');
Route::get('/AddUser','UserController@addUser')->middleware('auth','admin');
Route::post('/EditUser','UserController@editUser')->name('edituser')->middleware('auth','admin');
Route::get('/UpdateUser/{userid}','UserController@updateUser')->name('updateuser')->middleware('auth','admin');
Route::get('/DeleteUser/{userid}','UserController@deleteUser')->name('deleteuser')->middleware('auth','admin');

Route::get('/ListTopic','TopicController@displayAll')->name('displayalltopic')->middleware('auth')->middleware('auth','admin');
Route::get('/UpdateTopic/{topicid}','TopicController@updateTopic')->name('updatetopic')->middleware('auth','admin');
Route::post('/EditTopic','TopicController@editTopic')->name('edittopic')->middleware('auth','admin');
Route::get('/DeleteTopic/{topicid}','TopicController@deleteTopic')->name('deletetopic')->middleware('auth','admin');
Route::get('/AddTopic','TopicController@addTopic')->middleware('auth','admin');
Route::post('/InsertTopic','TopicController@insertTopic')->name('inserttopic')->middleware('auth','admin');

Route::get('/DisplayProfile/{userid}','UserController@showProfile')->name('displayprofile')->middleware('auth');
Route::get('/DisplayInbox/{userid}','UserController@showInbox')->name('displayinbox')->middleware('auth');
Route::post('/SendMessage','MessageController@sendMessage')->name('sendmessage')->middleware('auth');
Route::get('/DeleteMessage/{messageid}','MessageController@deleteMessage')->middleware('auth');

Route::post('/Search','QuestionController@search');
