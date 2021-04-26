@extends('layouts.student_app')
@section('content')
<body class="">
    <div class="container table-responsive table-no-card  pt-3">
      <table class="table table-responsive table-borderless table-striped table-hover" id="example">
        <thead class="thead-dark p-3">
          <tr class="">
            <th colspan="4" scope="col-md">Title</th>
            <th colspan="4" scope="col-md">Author</th>
            <th colspan="4" scope="col-md">Category</th>
            <th colspan="4" scope="col-md">Publisher</th>
            <th colspan="4" scope="col-md">Published Date</th>
            <th colspan="4" scope="col-md"></th>
            <th colspan="4" scope="col-md"></th>
          </tr>
        </thead>
        <tbody class="border border-dark ">
          <tr class="tr-shadow">
            @foreach ($books as $book)
            <th colspan="4" scope="row">{{$book->book_name}}</th>
            <td colspan="4">{{$book->book_author}}</td>
            <td colspan="4">{{$book->name}}</td>
            <td colspan="4">{{$book->publisher}}</td>
            <td colspan="4">{{$book->year_published}}</td>
            @if($book->stock_qty - $book->borrow_qty == 0)
            <td class="text-center"><button type="button" rel="tooltip" class="label label-warning btn-warning btn btn-xs disabled" data-original-title="Not Available">Unavailable</button></td>
            @elseif($book->stock_qty - $book->borrow_qty < 0)
            <td class="text-center"><button type="button" rel="tooltip" class="label label-danger btn btn-xs" data-original-title="Illigal Issues Here">Something is wrong here</button></td>
            @else
            <td class="text-center"><button type="button" rel="tooltip" class="label label-success btn-primary btn btn-xs" data-original-title="Reserve" >Reserve</button></td>
            @endif
            <td class="text-center">                               
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