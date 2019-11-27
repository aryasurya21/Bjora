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
Route::post('/home','QuestionController@insertQuestion')->name('insertquestion');

Route::get('/DisplayQuestion','QuestionController@displayQuestion')->name('displayquestion');
Route::get('/ListQuestion','QuestionController@displayAllQuestion')->name('displayallquestion');
Route::get('/AddQuestion','QuestionController@addQuestion')->name('addquestion');
Route::get('/UpdateQuestion/{questionid}','QuestionController@updateQuestion')->name('updatequestion');
Route::post('/EditQustion','QuestionController@editQuestion')->name('editquestion');
Route::get('/DeleteQuestion/{questionid}','QuestionController@deleteQuestion')->name('deletequestion');
Route::get('/CloseQuestion/{questionid}','QuestionController@closeQuestion');

Route::get('/DisplayAnswer/{questionid}','AnswerController@displayAnswer')->name('displayanswer');
Route::post('/AddAnswer','AnswerController@addAnswer')->name('addanswer');
Route::get('/DeleteAnswer/{answerid}','AnswerController@deleteAnswer');

Route::get('/ListUser','UserController@displayAll')->name('displayalluser');
Route::post('/InserUser','UserController@insertUser')->name('insertuser');
Route::get('/AddUser','UserController@addUser');
Route::post('/EditUser','UserController@editUser')->name('edituser');
Route::get('/UpdateUser/{userid}','UserController@updateUser')->name('updateuser');
Route::get('/DeleteUser/{userid}','UserController@deleteUser')->name('deleteuser');

Route::get('/ListTopic','TopicController@displayAll')->name('displayalltopic');
Route::get('/UpdateTopic/{topicid}','TopicController@updateTopic')->name('updatetopic');
Route::post('/EditTopic','TopicController@editTopic')->name('edittopic');
Route::get('/DeleteTopic/{topicid}','TopicController@deleteTopic')->name('deletetopic');
Route::get('/AddTopic','TopicController@addTopic');
Route::post('/InsertTopic','TopicController@insertTopic')->name('inserttopic');

Route::get('/DisplayProfile/{userid}','UserController@showProfile')->name('displayprofile');
Route::get('/DisplayInbox/{userid}','UserController@showInbox')->name('displayinbox');
Route::post('/SendMessage','MessageController@sendMessage')->name('sendmessage');
Route::get('/DeleteMessage/{messageid}','MessageController@deleteMessage');

Route::post('/Search','QuestionController@search');
