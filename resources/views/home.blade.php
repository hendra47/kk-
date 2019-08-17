@extends('layouts.app')

@section('content')

<section class="content-header">
        <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
        </div>
    </section>
    <div class="clearfix"></div>
<section class="content-header">
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home</li>
    </ol> -->
    <h1>
        Asisten Medis
        <small>Version 1.0</small>
    </h1>
</section>
<section class="content" style="height: auto !important; min-height: 0px !important;">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Antrian Hari ini</span>
                    <span class="info-box-number">{{$total_antri}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-body"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Proses Periksa</span>
                    <span class="info-box-number">{{$total_periksa}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="ion ion-medkit"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Proses Apotek</span>
                    <span class="info-box-number">{{$total_apotek}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-social-usd"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Proses Kasir</span>
                    <span class="info-box-number">{{$total_kasir}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-checkmark"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Selesai</span>
                    <span class="info-box-number">{{$total_pulang}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-grey "><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Pasiens</span>
                    <span class="info-box-number">{{$total_pasiens}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Antrian Pasien</h3>

                    <div class="box-tools" style="display:flex">
                        <!-- <div class="input-group input-group">
                            <input type="text" name="table_search" style="width: 150px;" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div> -->

                        <a type="button" style="margin-left:10px;" class="btn btn-block btn-success"
                            href="{!! route('daftars.create') !!}">Daftar</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-striped" id="home_table">
                         <thead>
                            <tr>
                                <th width="10%">No Antrian</th>
                                <th>Nama Pasien</th>
                                <th width="5%">Jk</th>
                                <th>Dokter</th>
                                <th width="5%">Status</th>
                                <th width="10%">Rekam Medis</th>
                            </tr>
                         </thead>
                        </table>                 
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div>
        <div style="padding-bottom: 15px; max-width: 100%; overflow: hidden; height: auto !important;">
        </div>
</section>
@endsection
 @section('scripts')
<script>
$(document).ready(function(){

 $('#home_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('home.index') }}",
  },
  columns:[
   {
    data: 'decode',
    name: 'decode'
   },
   {
    data: 'nama_pasien',
    name: 'nama_pasien'
   },
   {
    data: 'jk',
    name: 'jk'
   },
   {
    data: 'nama_dokter',
    name: 'nama_dokter'
   },
   {
    data: 'status_pasien',
    name: 'status_pasien'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 });
 
</script>
@endsection