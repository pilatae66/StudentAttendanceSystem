@extends('layouts.app')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-single-02 text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Students</p>
                <p class="card-title">{{ $student }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              Number of registered students
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-tag-content text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Events</p>
                  <p class="card-title">{{ $event }}<p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                Number of registered events
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-satisfied text-info"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Active Students</p>
                    <p class="card-title">{{ $active }}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  Number of active students
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
          </div>
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-7">
                    <div class="numbers pull-left">
                      Payment Graph
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="big-title">representation for the students who paid their contribution</h6>
                <canvas id="contribution_counter" width="500" height="100"></canvas>
              </div>
              <div class="card-footer">
                <hr>
                <div class="row">
                  <div class="col-sm-7">
                    <div class="footer-title">Student Payment Statistics</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-7">
                    <div class="numbers pull-left">
                      Contribution Graph
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="big-title">representation for the ccs contribution</h6>
                <canvas id="activeUsers" width="500" height="100"></canvas>
              </div>
              <div class="card-footer">
                <hr>
                <div class="row">
                  <div class="col-sm-7">
                    <div class="footer-title">Contribution Statistics</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="card card-stats">
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-5 col-md-4">
                          <div class="icon-big text-center icon-warning">
                            <div class="text-success">&#8369;</div>
                          </div>
                        </div>
                        <div class="col-7 col-md-8">
                          <div class="numbers">
                            <p class="card-category">Total Fines</p>
                            <p class="card-title">&#8369;{{ $fines }}<p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer ">
                        <hr>
                        <div class="stats">
                          Sum of all student fines
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-stats">
                      <div class="card-body ">
                        <div class="row">
                          <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                              <div class="text-success">&#8369;</div>
                            </div>
                          </div>
                          <div class="col-7 col-md-8">
                            <div class="numbers">
                              <p class="card-category">Total Collection</p>
                              <p class="card-title">&#8369;{{ $collection }}<p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer ">
                          <hr>
                          <div class="stats">
                            Sum of all payment
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endsection
          @section('script')
          
          <script>
            $(document).ready(function (){
              let contributions = [@foreach($contribution_titles as $key => $contribution_title)
              '{{ $contribution_title }}',
              @endforeach ]
              
              let amount = [@foreach($contribution_amount as $key => $value)
              '{{ $value }}',
              @endforeach ]
              
              let remaining = [@foreach($contribution_remaining as $key => $value)
              '{{ $value }}',
              @endforeach ]
              
              console.log(contributions);
              
              chartColor = "#FFFFFF";
              
              ctx = document.getElementById('activeUsers').getContext("2d");
              
              gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
              gradientStroke.addColorStop(0, '#80b6f4');
              gradientStroke.addColorStop(1, chartColor);
              
              gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
              gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
              gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");
              
              myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: contributions,
                  datasets: [
                  {
                    label: "Total",
                    borderColor: 'green',
                    fill: true,
                    backgroundColor: 'green',
                    hoverBorderColor: 'green',
                    borderWidth: 8,
                    data: amount,
                  },
                  ]
                },
                options: {
                  
                  tooltips: {
                    tooltipFillColor: "rgba(0,0,0,0.5)",
                    tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    tooltipFontSize: 14,
                    tooltipFontStyle: "normal",
                    tooltipFontColor: "#fff",
                    tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    tooltipTitleFontSize: 14,
                    tooltipTitleFontStyle: "",
                    tooltipTitleFontColor: "#fff",
                    tooltipYPadding: 6,
                    tooltipXPadding: 6,
                    tooltipCaretSize: 8,
                    tooltipCornerRadius: 6,
                    tooltipXOffset: 10,
                  },
                  
                  
                  legend: {
                    
                    display: true
                  },
                  scales: {
                    
                    yAxes: [{
                      ticks: {
                        fontColor: "#9f9f9f",
                        fontStyle: "normal",
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 20
                      },
                      gridLines: {
                        zeroLineColor: "gray",
                        display: true,
                        drawBorder: false,
                        color: '#9f9f9f',
                      }
                      
                    }],
                    xAxes: [{
                      barPercentage: 0.4,
                      gridLines: {
                        zeroLineColor: "white",
                        display: false,
                        
                        drawBorder: false,
                        color: 'transparent',
                      },
                      ticks: {
                        padding: 20,
                        fontColor: "#9f9f9f",
                        fontStyle: "normal"
                      }
                    }]
                  }
                }
              });
              
              
              let first = [@foreach($first as $key => $value)
              '{{ $value->count() }}',
              @endforeach ]
              
              let second = [@foreach($second as $key => $value)
              '{{ $value->count() }}',
              @endforeach ]
              
              let third = [@foreach($third as $key => $value)
              '{{ $value->count() }}',
              @endforeach ]
              
              let fourth = [@foreach($fourth as $key => $value)
              '{{ $value->count() }}',
              @endforeach ]
              
              let total = [@foreach($total as $key => $value)
              '{{ $value }}',
              @endforeach ]
              
              ctx2 = document.getElementById('contribution_counter').getContext("2d");
              
              gradientStroke = ctx2.createLinearGradient(500, 0, 100, 0);
              gradientStroke.addColorStop(0, '#80b6f4');
              gradientStroke.addColorStop(1, chartColor);
              
              gradientFill = ctx2.createLinearGradient(0, 170, 0, 50);
              gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
              gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");
              
              myChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                  labels: contributions,
                  datasets: [
                  {
                    label: "First Year",
                    borderColor: 'green',
                    fill: true,
                    backgroundColor: 'green',
                    hoverBorderColor: 'green',
                    borderWidth: 8,
                    data: first,
                  },
                  {
                    label: "Second Year",
                    borderColor: 'yellow',
                    fill: true,
                    backgroundColor: 'yellow',
                    hoverBorderColor: 'yellow',
                    borderWidth: 8,
                    data: second,
                  },
                  {
                    label: "Third Year",
                    borderColor: 'red',
                    fill: true,
                    backgroundColor: 'red',
                    hoverBorderColor: 'red',
                    borderWidth: 8,
                    data: third,
                  },
                  {
                    label: "Fourth Year",
                    borderColor: 'blue',
                    fill: true,
                    backgroundColor: 'blue',
                    hoverBorderColor: 'blue',
                    borderWidth: 8,
                    data: fourth,
                  },
                  {
                    label: "Total",
                    borderColor: 'gray',
                    fill: true,
                    backgroundColor: 'gray',
                    hoverBorderColor: 'gray',
                    borderWidth: 8,
                    data: total,
                  },
                  ]
                },
                options: {
                  
                  tooltips: {
                    tooltipFillColor: "rgba(0,0,0,0.5)",
                    tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    tooltipFontSize: 14,
                    tooltipFontStyle: "normal",
                    tooltipFontColor: "#fff",
                    tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    tooltipTitleFontSize: 14,
                    tooltipTitleFontStyle: "",
                    tooltipTitleFontColor: "#fff",
                    tooltipYPadding: 6,
                    tooltipXPadding: 6,
                    tooltipCaretSize: 8,
                    tooltipCornerRadius: 6,
                    tooltipXOffset: 10,
                  },
                  
                  
                  legend: {
                    
                    display: true
                  },
                  scales: {
                    
                    yAxes: [{
                      ticks: {
                        fontColor: "#9f9f9f",
                        fontStyle: "normal",
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 20
                      },
                      gridLines: {
                        zeroLineColor: "gray",
                        display: true,
                        drawBorder: false,
                        color: '#9f9f9f',
                      }
                      
                    }],
                    xAxes: [{
                      barPercentage: 0.4,
                      gridLines: {
                        zeroLineColor: "white",
                        display: false,
                        
                        drawBorder: false,
                        color: 'transparent',
                      },
                      ticks: {
                        padding: 20,
                        fontColor: "#9f9f9f",
                        fontStyle: "normal"
                      }
                    }]
                  }
                }
              });
            });
          </script>
          @endsection
          