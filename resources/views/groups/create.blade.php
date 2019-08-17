@extends('layouts.app')

@section('content')

<section class="content-header">
        <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Jabatan</a></li>
            <li class="active">Create</li>
        </ol>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="content-header">
        <h1>
        Jabatan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'groups.store']) !!}

                        @include('groups.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
