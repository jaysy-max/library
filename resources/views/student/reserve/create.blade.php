@extends('layouts.student_app')
@section('content')

<div id="form-main" class= "  d-flex flex-wrap align-items-center justify-content-center">
    <div id="form-div" class="col-8 col-sm-8 col-lg-6" >
      @foreach ($books as $book)
      
      <form class="form" id="form1" action="{{url('reserve')}}" method="POST">
        @csrf
        <h5 class="form-header">Reservation Form</h5>
        </p>
        <label class="label-reserve-create">Book Title</label>
          <input name="reserve_book_name" type="text" value="{{ $book -> book_name }}" 
          class="form-control form-create-reserve" id="reserve_book_name" placeholder="Book Title" readonly/>
        </p>
        </p><label class="label-reserve-create">Book Category</label>
          <input name="reserve_book_category" type="text" value="{{ $book -> name }}" 
          class="form-control form-create-reserve" id="reserve_book_category" placeholder="Category" readonly/>
        </p>
        <p><label class="label-reserve-create">Name</label>
         <input name="reserve_user_name" type="text"  value="{{ Auth::user()->name }}"
          class="form-control form-create-reserve" placeholder="Name" id="reserve_user_name" readonly/>
        </p>
        @foreach ($members as $member)
        <p><label class="label-reserve-create">student ID</label>
          <input name="stud_id" type="text"   value="{{$member-> member_nid_no }}" 
          class="form-control form-create-reserve" placeholder="Student ID" id="stud_id" required/>
          <p class="text-danger">{{ $errors->first('stud_id') }}</p>
        </p>
        @endforeach
        
        <p>
          <label class="label-reserve-create">Email Address</label>
          <input name="reserve_user_email" type="text" value="{{ Auth::user()->email }}" 
          class="form-control form-create-reserve" id="reserve_user_email" required/>
          <p class="text-danger">{{ $errors->first('reserve_user_email') }}</p>
        </p>
        <p>
          <input name="status" type="hidden" value="0" class="form-control form-create-reserve" id="status" required/>
      </p>
          <label class="label-reserve-create">Date of Claim</label>
          <input name="date_of_reservation" type="date"  onchange="checkDate()" 
           class="form-control form-create-reserve" id="date_of_reservation" rows="2" placeholder="Date of reservation" required/>
          <p class="text-danger">{{ $errors->first('date_of_reservation') }}</p>
        </p>
        <div class="submit button-container">
          <button type="submit" id="reserve_done" class="btn btn-blue btn-blue-1 col-8">Submit</button>
        </div>
      </form>
      @endforeach
      
    </div>
</div>

@endsection