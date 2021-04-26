@extends('layouts.master')

   @section('content')
               <div class="content">
                <div class="container-fluid">
                  <div class="row">
                             <div class="col-lg-3 col-md-3 col-sm-6">
                              <a href="{{ url('/books') }}">      
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                          <i class="material-icons">library_books</i>
                                     <h3 class="title">                            
                                       {{ $total_qty }}
                                       <small>Pcs</small>
                                    </h3>
                                </div>
                                <div class="card-content">
                                    <p>Available Books</p>                                   
                                </div>
                            </div>
                          </a>

                        </div>


                             <div class="col-lg-3 col-md-3 col-sm-6"> 
                              <a href="{{ url('/members') }}">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                   <i class="material-icons">&#xE85E;</i>
                                     <h3 class="title">                            
                                       {{ $total_members }}
                                   </h3>
                                </div>
                                <div class="card-content">
                                    <p>Members</p>                                   
                                </div>
                            </div>
                          </a>
                        </div>
                             <div class="col-lg-3 col-md-3 col-sm-6">
                              <a href="{{ url('/issues') }}">            
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                   <i class="material-icons">gavel</i>
                                     <h3 class="title">                            
                                       {{ $total_issue_qty }}

                                    </h3>
                                </div>
                                <div class="card-content">
                                    <p>Available Issues</p>                                   
                                </div>
                            </div>
                          </a>

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                              <a href="{{ url('issues_not_returned') }}">            
                            <div class="card card-stats">
                              @if ($total_issue_not_retrun_qty > 0)
                              <div class="card-header" data-background-color="red">                            
                              @else
                                <div class="card-header" data-background-color="green">
                                    @endif
                               <i class="material-icons">assignment_return</i>
                                     <h3 class="title">                            
                                       {{ $total_issue_not_retrun_qty }}

                                    </h3>
                                </div>
                                <div class="card-content">
                                    <p>Not returned books</p>                                          
                                </div>
                            </div>
                          </div>
                          </a>

                        </div>
                  </div>
                  <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card card-stats">                         
                                <div class="chart-container card-content">
                                    <canvas id="myChart"></canvas>         
                                </div>
                            </div>
                     
                    </div>
                  </div>
               </div>
               </div>
<script type="text/javascript">
  
var ctx = document.getElementById("myChart").getContext('2d');
 ctx.height = 400;
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
       labels: [
    @foreach($chart as $key => $value)
      "{{ \Carbon\Carbon::parse($key)->formatLocalized('%d %b') }}",
    @endforeach

  ],
        datasets: [{
            label: "Issues",                    
            data: [
    @foreach($chart as $key => $value)
      {{$value}},
    @endforeach
    ],
      backgroundColor: 'rgba(0, 0, 0, 0.1)',
      borderColor: 'rgba(0, 192, 255, 1)',
      borderWidth: 3
        }]
    },
options: {
  legend: {
            labels: {
                fontColor: 'rgba(62, 62, 62, 1)',
                fontSize: 18
            }
        },

   elements: {
        line: {
            tension: 0
        }
    },
  maintainAspectRatio: false,
 responsive: true,
  showTooltips: true, 
  multiTooltipTemplate: "<%= value %>",
        scales: {
            yAxes: [{
              gridLines: {
        zeroLineColor: 'rgba(240, 240, 240, 1)',
         color: 'rgba(240, 240, 240, 1)'
    },
                ticks: {
                  fontColor: 'rgba(62, 62, 62, 1)',
                    fontSize: 12,
                    stepSize: 1,
                    beginAtZero:true,
                    userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 }
                }
            }],
            xAxes: [{
              gridLines: {
        zeroLineColor: 'rgba(240, 240, 240, 1)',
         color: 'rgba(240, 240, 240, 1)'
    },
                ticks: {
                    fontColor: 'rgba(62, 62, 62, 1)',
                    fontSize: 12,
                    stepSize: 1,
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
   @endsection