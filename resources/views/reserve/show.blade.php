@extends('layouts.master')
@section('search')
<div class="collapse navbar-collapse">
    <form method="POST" action="members" class="navbar-form navbar-right" role="search">
      {{csrf_field()}}
        <div class="form-group  is-empty">
            <input type="text" class="form-control" name="search_input" placeholder="Search...">
            <span class="material-input"></span>
        </div>
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>
    </form>
</div>
@endsection 
   @section('content') 
<div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header" data-background-color="custom-bookrequisition">
                  <h4 class="title">Reservations</h4>
              </div>
              <div class="card-content table-responsive">
                  <table class="table table-hover">
      <thead>
          <tr>
              <th class="text-center"><strong>ID</strong></th>
              <th class="text-center"><strong>Book Name</strong></th>
              <th class="text-center"><strong>Category</strong></th>
              <th class="text-center"><strong>Student Name</strong></th>
              <th class="text-center"><strong>Student ID No.</strong></th>
              <th class="text-center"><strong>Email</strong></th>
              <th class="text-center"><strong>Claim Date</strong></th>
              <th class="text-center"><strong>Status</strong></th>
              <th><strong>Actions</strong></th>
          </tr>
      </thead>
      <tbody>
        @foreach($reserves as $reserve)
          <tr>
                <td class="text-center">{{$reserve->member_id}}</td>
                <td class="text-center" style="cursor: pointer;">
                    <strong>{{ $reserve->reserve_book_name }}</strong> 
                </td>
                <td class="text-center" style="cursor: pointer;">
                    {{ $reserve->reserve_book_category }} 
                </td>
                <td class="text-center" style="cursor: pointer;">
                    {{ $reserve->reserve_user_name }} 
                </td>
                <td class="text-center" style="cursor: pointer;">
                    {{ $reserve->stud_id }} 
                </td>
                <td class="text-center" style="cursor: pointer;">
                    <strong>{{ $reserve->reserve_user_email }}</strong> 
                </td>
                <td class="text-center" style="cursor: pointer;">
                    <strong>{{ $reserve->date_of_reservation }}</strong> 
                </td>
                <td class="text-center" style="cursor: pointer;">
                @if($reserve->status == 1)
                    <strong>Approved</strong>
                    @else
                    <strong>Pending</strong>
                    @endif
                </td>
                 <form>
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id" value="{{$reserve->id}}" >
                <td>
                    @if($reserve->status == 0)
                    <a href="reservation/approve/{{ $reserve->id }}" type="button" rel="tooltip" class="btn btn-success btn-sm "data-original-title="Approve this Reservation">
                        <i class="fa fa-check-square-o"></i>  
                <a>
                    </button>
                    @else
                    <a href="reservation/cancel/{{ $reserve->id }}" type="button" rel="tooltip" class="btn btn-danger btn-sm "data-original-title="Undo Approval">
                            <i class="fa fa-undo"></i>  
                    <a> 
                    </button>
                    @endif
                    <button type="button" rel="tooltip"class="delete_reserve btn btn-dark btn-xs" id="deleteReserve"data-original-title="Discard This Reservation" data-toggle="modal" data-target="#reserveDelete">  
                    <i class="fa fa-times"></i>  
                   </button>

                </td>

                 </form>
          </tr>
          @endforeach
      </tbody>
  </table>
              </div>
          </div>
      </div>

  </div>
  @include('reserve.delete')
  
   @endsection