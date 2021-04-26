
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/admin','HomeController@admin_settings')->middleware('role:admin'); 
Route::post('/adminUpdate','HomeController@update')->middleware('role:admin');
Route::get('/index','DashboardController@show')->middleware('role:admin');

Route::post('addCategory','CategoryController@store')->middleware('role:admin');

Route::get('categories','CategoryController@show')->middleware('role:admin'); 


Route::get('/books','BooksController@show')->middleware('role:admin');
Route::get('/books/paginate','BooksController@showPage')->middleware('role:admin');
Route::get('/books/ajaxsearch','BooksController@ajaxsearch')->middleware('role:admin');
Route::get('/book/edit','BooksController@update')->middleware('role:admin');
Route::get('/member/info','MembersController@show')->middleware('role:admin'); 
Route::get('/member/getinfo','MembersController@show')->middleware('role:admin'); 
Route::post('/member/update','MembersController@update')->middleware('role:admin'); 
Route::post('/member/create','MembersController@store')->middleware('role:admin');
Route::post('/member/delete','MembersController@destroy')->middleware('role:admin');
Route::post('/category/delete','CategoryController@destroy')->middleware('role:admin');


Route::post('addbook','BooksController@store')->middleware('role:admin');
Route::post('books/importCsv','BooksController@importCsv')->middleware('role:admin');
Route::post('delete','BooksController@destroy')->middleware('role:admin');
Route::post('returnBook','IssuesController@destroy')->middleware('role:admin');
Route::post('updatebook','BooksController@updatebook')->middleware('role:admin');
Route::post('updatecat','CategoryController@update')->middleware('role:admin');


Route::get('/issue_book','IssuesController@create')->middleware('role:admin');
Route::get('/issues','IssuesController@show')->middleware('role:admin');
Route::post('/issues','IssuesController@search')->middleware('role:admin');
Route::post('/issues_not_returned','IssuesController@search_not_returned')->middleware('role:admin');
Route::get('/issues_not_returned','IssuesController@not_returned')->middleware('role:admin');


Route::get('/registration','UsersController@create')->middleware('role:admin');
Route::get('members','UsersController@show')->middleware('role:admin');
Route::post('members','MembersController@search')->middleware('role:admin');


Route::get('catSearch','SearchController@searchCategory')->middleware('role:admin');
Route::get('nameSearch','SearchController@searchName')->middleware('role:admin');
Route::get('issuesearchName','SearchController@issuesearchName')->middleware('role:admin');
Route::get('authorSearch','SearchController@searchAuthor')->middleware('role:admin');

Route::get('bookSearch','SearchController@bookSearch')->middleware('role:admin');



Route::get('book/issue','BooksController@MemberInfo')->middleware('role:admin');
Route::post('issueBook','IssuesController@store')->middleware('role:admin');

Route::post('/books','BooksController@search')->middleware('role:admin');

//**Routes for reservations-ADMIN*/
Route::get('/reservation','ReservesController@index')->middleware('role:admin');
Route::post('/reservation/delete','ReservesController@destroy')->middleware('role:admin');
Route::get('/reservation/approve/{id}','ReservesController@approve')->middleware('role:admin');
Route::get('/reservation/cancel/{id}','ReservesController@cancel')->middleware('role:admin');

//**Routes for announcements-ADMIN*/
//Route::get('/announcement','AnnouncementsController@index')->middleware('role:admin');
Route::get('/announcement','AnnouncementsController@index')->middleware('role:admin');
Route::post('/announcement/store','AnnouncementsController@store')->middleware('role:admin');
Route::get('/announcement/show/{id}','AnnouncementsController@show')->middleware('role:admin');
Route::get('/announcement/hide/{id}','AnnouncementsController@hide')->middleware('role:admin');
Route::post('/announcement/delete','AnnouncementsController@destroy')->middleware('role:admin');

//**Routes for dashboard-student-mali maling blade/
Route::get('/dashboard', 'Student\DashboardController@index')->middleware('role:student');
Route::get('/ViewBooks', 'Student\BooksController@show')->middleware('role:student');
Route::get('/search', 'Student\BooksController@search')->middleware('role:student');


//**Routes for reservations-student*/
//Route::get('/reserve/create', 'student\ReservesController@create')->middleware('role:student');
Route::get('/reserve', 'Student\ReservesController@index')->middleware('role:student');
Route::get('/reserve/create/{id}', 'Student\ReservesController@create')->middleware('role:student');
Route::get('/ViewBooks/{id}', 'Student\BooksController@view')->middleware('role:student');
Route::post('/reserve', 'Student\ReservesController@store')->middleware('role:student');

Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markasRead();
    return redirect()->back();
})->name('markAsRead');
Auth::routes();
?>
