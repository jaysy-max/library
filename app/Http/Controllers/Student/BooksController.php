<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule; 
use App\Book;
use App\Member;
use App\Category;
use App\Issue;
class BooksController extends Controller
{
    public function show(){
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('student.student_books',compact('books','categories','links'));
    }
    public function search(Request $request)
    { 

        if ($request->search =='') {
            $links = 1;
            $books = DB::table('books')
            ->join('categories','books.book_category','=','categories.id')
            ->select('categories.name','books.*')
            ->orderBy('id', 'desc')->paginate(10);
            $categories = Category::all();
            return view('student.student_books',compact('books','categories','links'));
            }
            else {
            $links = 0;
            $books = DB::table('books')
            ->join('categories','books.book_category','=','categories.id')
            ->select('books.*','categories.name')
            ->where('books.book_name','LIKE','%'.$request->search.'%')->orWhere('books.book_author','LIKE','%'.$request->search.'%')->orWhere('categories.name','LIKE','%'.$request->search.'%')->orderBy('books.id','desc')->get();        
           $categories = Category::all();
            return view('student.student_books', compact('books','categories','links'));
            }
    }
    public function view($id)
    {
        $links = 0;
        $categories = Category::all();
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->where('books.id','=',$id)->get();        

        return view('student.student_books', compact('books','links','categories'));
    }
}