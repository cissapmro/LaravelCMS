@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Painel')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Dashboard</h1>
        </div>
    </div>
       <div class="card-body">
            <form method="GET">
                <div class="row">
                    <div class="col-md-5">
                       <!-- <select name="opcao" onchange="this.form.submit()">-->
                            <select name="opcao">
                            <option value="30" {{$dateopcao==30?'selected="selected"':''}}>Últimos 30 dias</option>
                            <option value="60" {{$dateopcao==60?'selected="selected"':''}}>Últimos 2 meses</option>
                            <option value="90" {{$dateopcao==90?'selected="selected"':''}}>Últimos 3 meses</option>
                            <option value="120" {{$dateopcao==120?'selected="selected"':''}}>Últimos 4 meses</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-info" value="Enviar">
                    </div>
                </div>
            </form>
    </div>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $visitsCount }}</h3>
                    <p>Acessos</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $onlineCount }}</h3>
                    <p>Usuários online</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pageCount }}</h3>
                    <p>Páginas</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-sticky-note"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $userCount }}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-user"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Páginas mais visitadas
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Sobre o sistema
                    </h3>
                </div>
                <div class="card-body">
                    ...
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            let ctx = document.getElementById('pagePie').getContext('2d');
            window.pagePie = new Chart(ctx, {
            type:'pie',
              //  type: 'bar',
            data: {
                datasets: [{
                    data:{{ $pageValues }},
                   // backgroundColor: 'yellow'
                     backgroundColor: [
                        'red',
                        'yellow',
                        'green'
                      ],
                      borderWidth: 1,
                    //  borderColor: [
                      //  'rgba(255, 99, 132, 1)',
                     //   'rgba(54, 162, 235, 1)',
                     //   'rgba(255, 206, 86, 1)'
                  //  ],
                }],
                labels:{!! $pageLabels !!}
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                }
            }
            });
        }
    </script>
@endsection

