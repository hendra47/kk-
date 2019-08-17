@extends('layouts.app')

@section('content')

<section class="content-header">
        <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Pembayaran</a></li>
            <li class="active">Create</li>
        </ol>
        </div>
    </section>
    <div class="clearfix"></div>
<section class="content-header" style="height:50px;">
    <h3 class="pull-left">
        Pembayaran
    </h3>
    <h3 class="pull-right">
        Dokter : Dr.Jamal
    </h3>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="form-group col-sm-3">
                    {!! Form::label('nama', 'Nama:') !!}
                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::label('umur', 'Umur:') !!}
                    {!! Form::text('umur', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::label('jk', 'Jk:') !!}
                    {!! Form::select('jk', array('L' => 'Laki-Laki', 'P' => 'Peremnpuan'), 'L',['class' =>
                    'form-control']); !!}
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::label('alergi_obat', 'Alergi Obat:') !!}
                    {!! Form::select('alergi_obat', array('Y' => 'Ya', 'T' => 'Tidak'), 'T',['class' =>
                    'form-control']); !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('keluhan', 'Keluhan Utama:') !!}
                    {!! Form::text('keluhan', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('pemeriksaan_fisik', 'Pemeriksaan Fisik:') !!}
                    {!! Form::text('pemeriksaan_fisik', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('tindakan', 'Tindakan:') !!}
                    {!! Form::text('tindakan', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('resep', 'Resep Obat:') !!}
                    {!! Form::text('resep', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-10" style="text-align:right">
                    <a href="#" class="btn btn-danger"><i class="fa fa-plus"> </i> Obat</a>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <table class="table table-bordered" id="pembayarans-table" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Jenis</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>
                                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                            </td>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-sm-3 col-sm-offset-9">
                
                    {!! Form::label('total', 'Total Bayar:') !!}
                    {!! Form::text('total', null, ['class' => 'form-control']) !!}
            
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-3 col-sm-offset-9">
                
                    {!! Form::label('total', 'Uang Pembayaran:') !!}
                    {!! Form::text('total', null, ['class' => 'form-control']) !!}
            
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-3 col-sm-offset-9">
                
                    {!! Form::label('total', 'Uang Kembali:') !!}
                    {!! Form::text('total', null, ['class' => 'form-control']) !!}
            
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                    <a href="#" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection