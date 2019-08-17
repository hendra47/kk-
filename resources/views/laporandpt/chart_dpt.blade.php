@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/laporandpt">Laporan Pendapatan</a></li>
            <li class="active">Chart</li>
        </ol>
        </div>
    </section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Pendapatan</div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection