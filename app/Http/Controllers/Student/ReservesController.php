<?php

namespace App\Http\Controllers\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Reserve;
use App\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BooksController;
class ReservesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $reserves = DB::table('reserves')
        ->where('reserve_user_email','=',auth()->user()->email)->get();
        
        return view('student.reserve.show',compact('reserves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $links = 0;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->where('books.id','=',$id)->get();      
        $members = Member::with('user')
        ->where('user_id','=',auth()->user()->id)->get();
        
        return view('student.reserve.create', compact('books','links','members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    	$rules = [
    		'reserve_book_name' => 'required',
            'reserve_user_name' => 'required',
            'reserve_user_email' => 'required|email',
            'stud_id' => 'required|min:11',
            'date_of_reservation' => 'required|date|after:today'
            ];
        $messages = [
            'reserve_book_name.required' => 'Member name is required!',
            'reserve_user_email.required' => 'Member Email is required!',
            'stud_id.required' => 'Student ID No. is required',
            'stud_id.min' => 'Student ID number cannot be less than 11 characters',
            'date_of_reservation.required' => 'The date of claim is required',
            'date_of_reservation.after' => 'The date of claim must be a date after today.'
         
        ];   
     $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            else {
                $member_id = DB::table('members')
                ->select('member_id')
                ->where('member_email','=',$request->reserve_user_email)->get();
                $patterns = array();
                $patterns[0] = '/[[{"member_id":]/';
                $patterns[1] = '/}]/';
                $replacements = array();
                $replacements[0] = '';
                $replacements[1] = '';

                $reserve = new Reserve;                
                $reserve->reserve_book_name = $request->reserve_book_name;
                $reserve->reserve_book_category = $request->reserve_book_category;
                $reserve->reserve_user_name = $request->reserve_user_name;
                $reserve->reserve_user_email = $request->reserve_user_email;
                $reserve->stud_id = $request->stud_id;
                $reserve->date_of_reservation = $request->date_of_reservation;
                $reserve->status = $request->status;
                $reserve->member_id = preg_replace($patterns, $replacements, $member_id);
                



                $reserve->save();
                
                

                return redirect('/reserve');

          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
