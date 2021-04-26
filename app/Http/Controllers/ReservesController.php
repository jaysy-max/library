<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\ApproveReservation;
use App\Reserve;
use App\User;
class ReservesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $reserves = DB::table('reserves')
        ->orderBy('created_at')->get();
        
        return view('reserve.show', compact('reserves'));
    }
    public function approve(Request $request)
    {
        $reserves = Reserve::where('id','=',$request->id)->update(['status' => 1]); 
        
        $reserve = Reserve::where('id','=',$request->id)->first(); 
        $users = User::where('email','=',$reserve['reserve_user_email'])->get();
        
        Notification::send($users, new ApproveReservation($reserve));

        // $users->notify(new ApproveReservation($reserve));
    
         

        return redirect('/reservation');
    }
    public function cancel(Request $request)
    {
        $reserves = Reserve::where('id','=',$request->id)->update(['status' => 0]); 
        return redirect('/reservation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Request $request)
    {
        $reserves = Reserve::where('id','=',$request->id)->delete(); 
        return redirect('/reservation');
    }

}
