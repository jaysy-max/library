<?php

namespace App\Http\Controllers\Student;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request; 

use Illuminate\Validation\Rule; 

use App\Http\Controllers\Controller;

use App\Book;

use App\Member;

use App\Category;

use App\Issue;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index()
      {
        $announcements = DB::table('announcements') ->get();
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('student.dashboard',compact('books','categories','links','announcements'));
        // $books = Book::all();
        // $categories = Category::all();
        // return view('student.dashboard',compact('books','categories'));
      }
    
}
