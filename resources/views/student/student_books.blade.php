@extends('layouts.student_app')
@section('content')
<body class="">
    <div class="container  pt-3" >
      <table class="table table-responsive table-borderless table-no-card table-striped" id="example">
        <thead class="thead-dark ">
          <tr class="">
            <th  class="col-md">Title</th>
            <th   class="col-md">Author</th>
            <th  class="col-md">Category</th>
            <th  class="col-md">Publisher</th>
            <th  class="col-md">Published Date</th>
            <th  class="col-md">Quantity</th>
            <th colspan="1" class="col-md "></th>
          </tr>
        </thead>
        <tbody class="border border-dark ">
          <tr class="tr-shadow">
            @foreach ($books as $book)
            <th  scope="row">{{$book->book_name}}</th>
            <td >{{$book->book_author}}</td>
            <td >{{$book->name}}</td>
            <td >{{$book->publisher}}</td>
            <td >{{$book->year_published}}</td>
            <td >{!! $book->stock_qty - $book->borrow_qty !!} out of {!! $book->stock_qty !!}</td>
            @if($book->stock_qty - $book->borrow_qty == 0)
            <td class="text-center"><button type="button" rel="tooltip" class="btn-yellow btn btn-xs disabled" data-original-title="Not Available">Unavailable</button></td>
            @elseif($book->stock_qty - $book->borrow_qty < 0)
            <td class="text-center"><button type="button" rel="tooltip" class="label label-danger btn btn-xs" data-original-title="Illigal Issues Here">Something is wrong here</button></td>
            @else
            <td colspan="1" class=""><a href="{{url('reserve/create/'.$book->id)}}" type="button" rel="tooltip" class="btn-blue btn btn-xs" data-original-title="Reserve">Reserve</td></a>
            @endif                               
        </button>
          </tr>
          @endforeach
        </tbody>
        @if  ($links==1)
        {!!$books->links()!!}
        @endif
      </table>
    </div>
  </body>

  @endsection