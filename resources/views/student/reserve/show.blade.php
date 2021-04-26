@extends('layouts.student_app')
@section('content')
<body>
<div class="reserve container">
    <!-- Page Features -->
    
    
    
    <div class="card-container-reserve d-flex flex-wrap align-items-start">
      <?php $count = 0; ?>
      @foreach ($reserves as $reserve)
      <div class="col-md-5 col-lg-4 mb-4 py-2 linear">
        <div class="card card-reserve">
            <div class="card-body">
              <p class="card-title text-sm-left text-md-left text-lg-left"><strong>Title: </strong>{{$reserve->reserve_book_name}}</p>
              <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Category: </strong>{{$reserve->reserve_book_category}}</p>
              <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Email: </strong>{{$reserve->reserve_user_email}}</p>
              <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Student ID: </strong>{{$reserve->stud_id}}</p>
              <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Student Name: </strong>{{$reserve->reserve_user_name}}</p>
              <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Claim book at: </strong>{{$reserve->date_of_reservation}}</p>
              <div class="card-footer card-footer-approved">
                @if($reserve->status == 1)
                <p class="btn btn-success ">Approved</p>
                @else
              </div>
              <div class="card-footer card-footer-pending">
                <span class="btn btn-info ">waiting for approval</span>
                @endif
              </div>
          </div>
        </div>
      </div>
      @endforeach
      
  </div>
</body>

@endsection
