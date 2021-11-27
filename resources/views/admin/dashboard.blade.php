@extends('admin.layouts.app')
@section('content')
<style>
  table.table {
    font-size: 13px;
  }
  table th, table td {
    color: #555;
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <div class="card py-3 px-3">
              <span style="color: #555">{{ array_sum($visitors) }} Pengunjung (Hari ini)</span>
              <canvas id="visitor"></canvas>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card py-3">
              <canvas id="os"></canvas>
              <div class="list-os mt-3 py-3 px-3">
                <table class="table table-bordered table-sm">
                  <tr>
                    <th class="text-center">No</th>
                    <th>Sistem Operasi</th>
                    <th>Jumlah</th>
                  </tr>
                  @foreach ($os_dist as $item)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $item->operating_sistem }}</td>
                      <td>{{ $os[$item->operating_sistem]->first()->jml }}</td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection

  @section('scripts')
      <script>
        // visitor graph
        const ctx = document.getElementById('visitor').getContext('2d');
        
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                  @foreach($visitors as $key => $item)
                    '{{ ($key < 10) ? '0' . $key . ':00' : $key . ':00' }}',
                  @endforeach
                ],
                datasets: [{
                    label: '# Pengunjung hari ini',
                    data: [
                      @foreach($visitors as $key => $item)
                        {{ $item }},
                      @endforeach
                    ],
                    backgroundColor: [
                      @foreach($visitors as $item)
                        'rgba(0, 123, 255, .5)',
                      @endforeach
                    ],
                    borderColor: [
                      @foreach($visitors as $item)
                        'rgba(0, 123, 255, 1)',
                      @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                      ticks: {
                          min: 0,
                          stepSize: 1
                      }
                  }]
                }
            }
        });
        // end visitor graph


        // operating sistem graph
        const os = document.getElementById('os').getContext('2d');
        const osChart = new Chart(os, {
            type: 'pie',
            data: {
                labels: [
                  @foreach($os_dist as $item)
                    '{{ $item->operating_sistem }}',
                  @endforeach
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                      @foreach($os as $key => $item)
                        {{ (int)$item->first()->jml }},
                      @endforeach
                    ],
                    backgroundColor: [
                      @foreach($os as $key => $item)
                        `rgba(${Math.floor(Math.random() * 255) + 1}, 
                          ${Math.floor(Math.random() * 255) + 1}, 
                          ${Math.floor(Math.random() * 255) + 1}, 
                          0.5)`,
                      @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
      </script>
  @endsection