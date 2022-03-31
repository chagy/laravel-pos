@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ number_format($orderCount,0) }}</h3>

          <p>รายการขายวันนี้</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-bag"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ number_format($customerCount,0) }}</h3>

          <p>จำนวนลูกค้า</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ number_format($employeeCount,0) }}</h3>

          <p>จำนวนพนักงาน</p>
        </div>
        <div class="icon">
          <i class="fas fa-users-cog"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card bg-gradient-info">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
              <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Sales Graph
              </h3>

              <div class="card-tools">
                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
            
          </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-gradient-danger">
            <div class="card-header border-0 ui-sortable-handle">
                <h3 class="card-title">สินค้าใกล้หมด</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>ชื่อ</th>
                        <th>จำนวน</th>
                    </thead>
                    <tbody>
                        @foreach ($product_stocks as $item)
                        <tr>
                            <td>{{ $item->prod_name }}</td>
                            <td class="text-right">{{ $item->prod_qty }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card bg-gradient-info mt-4">
            <div class="card-header border-0 ui-sortable-handle">
                <h3 class="card-title">สินค้าขายดี</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>ชื่อ</th>
                        <th>จำนวน</th>
                    </thead>
                    <tbody>
                        @foreach ($product_best as $item)
                        <tr>
                            <td>{{ $item->psod_item_name }}</td>
                            <td class="text-right">{{ $item->qty }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scriptjs')
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        // Sales graph chart
        var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
        // $('#revenue-chart').get(0).getContext('2d');

        var salesGraphChartData = {
            labels: [{!! $months !!}],
            datasets: [
                {
                    label: 'ยอดขาย',
                    fill: false,
                    borderWidth: 2,
                    lineTension: 0,
                    spanGaps: true,
                    borderColor: '#efefef',
                    pointRadius: 3,
                    pointHoverRadius: 7,
                    pointColor: '#efefef',
                    pointBackgroundColor: '#efefef',
                    data: [{!! $dataLine !!}]
                }
            ]
        }

        var salesGraphChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
            display: false
            },
            scales: {
            xAxes: [{
                ticks: {
                fontColor: '#efefef'
                },
                gridLines: {
                display: false,
                color: '#efefef',
                drawBorder: false
                }
            }],
            yAxes: [{
                ticks: {
                stepSize: 5000,
                fontColor: '#efefef'
                },
                gridLines: {
                display: true,
                color: '#efefef',
                drawBorder: false
                }
            }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        // eslint-disable-next-line no-unused-vars
        var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
            type: 'line',
            data: salesGraphChartData,
            options: salesGraphChartOptions
        })
    </script>
@endpush