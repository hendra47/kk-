
@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/laporandpt">Laporan Pendapatan</a></li>
            <li class="active">Periode</li>
        </ol>
        </div>
    </section>
      <div class="clearfix"></div>
    <section class="content-header">

        <center>
            <h4>Laporan Pendapatan</h4>
            <h5>Periode {{$awal}} s/d {{$akhir}}</h5>
        </center>
        <br/>
        <a href="/downdpt_pdf/{{$awal}}/{{$akhir}}" class="btn btn-success" target="_blank"><i class="fa fa-cloud-download"></i> Download PDF</a>
        <a href="/chart-dpt/{{$awal}}/{{$akhir}}" class="btn btn-danger"><i class="fa fa-line-chart"></i> Chart</a>
        <p></p>
        <table  class="table w3-table-all">
             <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Dokter</th>
                    <th>Keluhan</th>
                    <th>Bayar</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($data as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$p->tgl}}</td>
                    <td>{{$p->nama_pasien}}</td>
                    <td>{{$p->nama_dokter}}</td>
                    <td>{{$p->keluhan}}</td>
                    <td>{{format_uang($p->total)}}</td>
                </tr>
                @endforeach
                 <tr>
                    <td colspan="5"><b>Total</b></td>
                    <td>{{format_uang($total)}}</td>
                </tr>
            </tbody>
        </table>

    </div>
    @endsection