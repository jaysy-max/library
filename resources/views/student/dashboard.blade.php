@extends('layouts.student_app')
@section('content')
<body>
<div class="dashboard container">
  <!-- Jumbotron Header -->
  <?php $counter = 0; ?>
  @foreach($announcements as $announcement)
  @if($announcement->status == 1)
  <?php if($counter == 1) break; ?>
  <header class="jumbotron  jumbotron-fluid my-4">
    <h1 class="display-3">{{$announcement->title}}</h1>
    <hr>
    <p class="lead">{{$announcement->description}}</p>
  </header>
  <?php $counter++; ?>
  @endif
  @endforeach
    <!-- Page Features -->
  <h2 class="display-4">Latest Books</h2>
    <div class="card-container d-flex flex-wrap justify-content-center align-items-start ">
      <?php $count = 0; ?>
      @foreach ($books as $book)
      <?php if($count == 8) break; ?>
      <?php $count++; ?>
        <div class="background-card">
          <div class="card card-dash col-lg-3 col-md-5 mx-2 my-2">
            <div class="card-body card-body-dash">
            <h5 class="card-title text-sm-center text-md-center text-lg-center pb-2">{{$book->book_name}}</h5><hr>
            <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Author: </strong>{{$book->book_author}}</p>
            <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Category: </strong>{{$book->name}}</p>
            <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Pubslisher: </strong>{{$book->publisher}}</p>
            <p class="card-text text-sm-left text-md-left text-lg-left"><strong>Published Date: </strong>{{$book->year_published}}</p>
          </div>
          <div class="card-text">
            @if($book->stock_qty - $book->borrow_qty == 0)
            <a href="#" type="button" rel="tooltip" class="btn btn-yellow disabled my-2" data-original-title="Unavailable">Unavailable</a>
            @elseif($book->stock_qty - $book->borrow_qty < 0)
            <button type="button" rel="tooltip" class="btn-primary" data-original-title="Illigal Issues Here">Something is wrong here</button>
            @else
            <a href="{{url('ViewBooks/'.$book->id)}}"class="btn btn-blue my-2">Available</a>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  
</div>
</body>

@endsection
