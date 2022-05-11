@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
    <p>Welcome to this beautiful admin panel.</p>

    <h2>Sin cointainer</h2>
    <div class="mt-2 row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4" style="height: 50px; border: 1px green solid"></div>
          <div class="col-md-4" style="height: 50px; border: 1px red solid"></div>
          <div class="col-md-4" style="height: 50px; border: 1px blue solid"></div>
        </div>
      </div>
    </div>
    <hr>
    
    <h2>Container fluid</h2>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4" style="height: 50px; border: 1px green solid"></div>
        <div class="col-md-4 h-auto" style="height: 50px; border: 1px red solid">
          <canvas id="myChart"></canvas>
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              Ribbon
            </div>
          </div>
        </div>
        <div class="col-md-4" style="height: 50px; border: 1px blue solid"></div>
      </div>
    </div>
    <hr>

    <h2>Container</h2>
    <div class="mt-2 container">
      <div class="row">
        <div class="col-md-4" style="height: 50px; border: 1px green solid"></div>
        <div class="col-md-4" style="height: 50px; border: 1px red solid"></div>
        <div class="col-md-4" style="height: 50px; border: 1px blue solid"></div>
      </div>
    </div>
    <hr>

    <h2>Cards</h2>
    <div class="mt-2 container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Default Card Example</h3>
              <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="badge badge-primary">Label</span>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              The body of the card
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              The footer of the card
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
          
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

const labels = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
const data = {
  labels: labels,
  datasets: [{
    label: 'Usuarios creados:',
    data: {!! $months !!},
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(153, 102, 255, 0.2)',
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 99, 132)',
      'rgb(255, 99, 132)',
      'rgb(255, 99, 132)',
      'rgb(255, 99, 132)',
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(75, 192, 192)',
    ],
    borderWidth: 1
  }]
};

const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      yAxes: [{
          display: true,
          ticks: {
              beginAtZero: true
          }
      }]
    }
  },
};

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
    </script>
@stop