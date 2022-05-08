@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div>
        <canvas id="myChart"></canvas>
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
    label: 'My First Dataset',
    data: {!! json_encode($months) !!},
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 99, 132)',
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'pie',
  data: data,
};

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
    </script>
@stop