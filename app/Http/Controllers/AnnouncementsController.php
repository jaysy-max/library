<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $announcements = DB::table('announcements')
        ->orderByDesc('created_at')->simplePaginate (3);
        return view('announcement.show',compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('announcement.create');
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
    		'title' => 'required',
            'description' => 'required',
            ];
        $messages = [
            'title.required' => 'Title is required!',
            'description.required' => 'Message is required!', 
            ];   
     $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
            return response($validator->errors(), 401);
            }
            else {

          }
          $announcement = new Announcement; 
          $announcement ->title = $request ->title;
          $announcement ->description = $request ->description;
          $announcement ->status = $request ->status;
  
          $announcement->save();
          return redirect('/announcement');
    }

    public function show(Request $request)
    {
        $announcements = Announcement::where('id','=',$request->id)->update(['status' => 1]); 
        return redirect('/announcement');
    }
    public function hide(Request $request)
    {
        $announcements = Announcement::where('id','=',$request->id)->update(['status' => 0]); 
        return redirect('/announcement');
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
        Announcement::where('id','=',$request->id)->delete(); 
        return redirect('/announcement');
    }
}
