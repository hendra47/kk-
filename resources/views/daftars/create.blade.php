@extends('layouts.app')

@section('content')

<section class="content-header">
        <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Pendaftaran</a></li>
            <li class="active">Create</li>
        </ol>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="content-header" style="height:30px;">
        <h1 class="pull-left">Daftars</h1>

        <h1 class="pull-right">
           <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('pasiens.create') !!}"><i class="fa fa-plus"> </i>  Pasien Baru</a>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'daftars.store']) !!}

                        @include('daftars.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
