@extends('layouts.master')
@section('content') 
<div class="row">
      <div class="col-md-12">
          <div class="card">
            
              <div class="card-header" data-background-color="custom-bookrequisition">
                  <h4 class="title">Announcements</h4>
              </div>
              <div class="card-content table-responsive">
                  <table class="table table-hover">
      <thead>
          <tr>
              <th class="text-center" scope="col"><strong>Title</strong></th>
              <th class="text-start" scope="col"><strong>Message</strong></th>
              <th class="text-center" scope="col"><strong>Status</strong></th>
              <th class="text-center" scope="col"><strong>Actions</strong></th>     
          </tr>
      </thead>
      <tbody>
        @foreach($announcements as $announcement)
          <tr>
            
                    <td class="text-center" scope="row">{{$announcement->title}}</td>
                    
                    <td class="text-start" scope="row">{{$announcement->description}}</td>
                    
                    <td class="text-center" scope="row">
                
                    @if($announcement->status == 1)
                        <strong>Displayed</strong>
                        @else
                        <strong>Hidden</strong>
                        @endif
                    </td>
               <form>
                    {{ csrf_field() }}

                    <input type="hidden" id="id" name="id" value="{{$announcement->id}}" >
                    <td class="text-start" scope="row">
                    @if($announcement->status == 0)
                        <a href="announcement/show/{{ $announcement->id }}" type="button" 
                            rel="tooltip" class="btn btn-success  btn-sm "
                            data-original-title="Show this Announcement">
                            <i class="fa fa-eye "></i>  
                        <a>
                    
                    @else
                        <a href="announcement/hide/{{ $announcement->id }}" type="button" 
                            rel="tooltip" class="btn btn-danger btn-sm"
                            data-original-title="Hide this Announcement">
                            <i class="fa fa-undo"></i>  
                        <a> 
                    @endif
                        <button type="button" rel="tooltip"class="delete_announcement btn btn-dark btn-xs" 
                            id="deleteAnnouncement"data-original-title="Discard This Announcement" 
                            data-toggle="modal" data-target="#announcementDelete">  
                            <i class="fa fa-times"></i>   
                        </button>    
                    </td>

                </form>
          </tr>
          @endforeach
      </tbody>

  </table>
  <div class="">
    <a class="btn btn-xs btn-dark" href="{{ $announcements->previousPageUrl()}}">Previous</a>
  
    <a class="btn btn-xs btn-dark" href="{{ $announcements->nextPageUrl() }}">Next</a>
    </div>
 
            
          </div>
      </div>

  </div>
  @include('announcement.create')
  @include('announcement.delete')




   @endsection