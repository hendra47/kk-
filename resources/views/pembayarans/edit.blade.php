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
    <section class="content-header">
        <h1>
        Pembayaran
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')

        {!! Form::open(['route' => 'pembayarans.store']) !!}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-sm-3">
                        {!! Form::label('nama', 'Nama:') !!}
                        {!! Form::text('nama_pasien', $pasiens->nama, ['disabled'=>'disabled','class' => 'form-control']) !!}
                        {!! Form::hidden('id_pasien', $pasiens->id, ['disabled'=>'disabled','class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('umur', 'Tanggal Lahir:') !!}
                        {!! Form::text('tgl_lahir', $pasiens->tgl_lahir, ['disabled'=>'disabled','class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('jk', 'Jk:') !!}
                        {!! Form::select('jk', array('L' => 'Laki-Laki', 'P' => 'Peremnpuan'), $pasiens->jk,['disabled'=>'disabled','class' => 'form-control']); !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('nama', 'Nama Dokter:') !!}
                        {!! Form::text('nama_dokter', $dokters->name, ['disabled'=>'disabled','class' => 'form-control']) !!}
                        {!! Form::hidden('id_dokter', $dokters->id, ['class' => 'form-control']) !!}
                        {!! Form::hidden('id_pembayaran', $pembayaran->id, ['class' => 'form-control']) !!}
                        {!! Form::hidden('id_daftar', $pembayaran->id_daftar, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('note', 'Note:') !!}
                        {!! Form::textarea('note', $pembayaran->note, ['disabled'=>'disabled','class' => 'form-control']) !!}
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-sm-6">
                        <!-- {!! Form::label('tindakan', 'Tindakan:') !!} -->
                        <!-- {!! Form::select('is_tindakan', array('Y' => 'Ya', 'T' => 'Tidak'), $pembayaran->is_tindakan,['id'=>'pilihTindakan','class' => 'form-control']); !!}
                        {!! Form::text('tindakan', null, ['class' => 'form-control']) !!} -->

                    </div>
                </div>
         <!--        <div id="tindakanTable">
                                <div class='row'> 
                                    <div class='form-group col-sm-6'> 
                                        <label>TINDAKAN</label> 
                                    </div>  
                                    <div class='form-group col-sm-6'> 
                                        <label>BIAYA</label> 
                                    </div>  
                                </div>
                                @foreach($pembayaran_detail1 as $detail1)
                                            <div class='row'> 
                                                <div class='form-group col-sm-6'>
                                                    {!! Form::text('tindakan[]', $detail1->tindakan, ['disabled'=>'disabled','class' => 'form-control']) !!}
                                                </div>  
                                                <div class='form-group col-sm-6'>
                                                    {!! Form::text('biaya[]', null, ['id'=>'biaya','class' => 'form-control']) !!}
                                                </div>  
                                            </div>
                                @endforeach
                </div> -->
                @section('scripts')
                <script type="text/javascript">
                   
                //    alert(totalID);
                $('#biaya').on('blur', function(e){
                   var totalID = document.getElementById("totalID").value;
                   document.getElementById("totalID").value=parseInt(totalID)+parseInt(e.target.value);
                });
                </script>
                @endsection
            <div class="row">
                    <div class="col-sm-2">
                        <h3>Resep Obat:</h3>
                    </div>
                </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <table class="table table-bordered" id="obatTable" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Note</th>
                                <th width="5%">Qty</th>
                                <th width="10%">Harga</th>
                                <th width="15%">Biaya Obat</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pembayaran_detail2 as $detail2)
                        <?php
                         $biaya_obat += $detail2->harga*$detail2->qty
                         ?>
                        <tr>
                            <td>{!! $detail2->nama_obat !!}</td>
                            <td>{!! $detail2->note !!}</td>
                            <td>{!! $detail2->qty !!}</td>
                            <td>{!! $detail2->harga !!}</td>
                            <td>{!! $detail2->harga*$detail2->qty !!}</td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

                <div class="row">
                    <div class="col-sm-2">
                        <h3>Tindakan :</h3>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-sm-12">
                    <table class="table table-bordered" id="obatTable" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>Nama Tindakan</th>
                                <th  width="15%">Biaya Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pembayaran_detail1 as $detail1)
                        <?php
                         $biaya_tindakan += $detail1->harga
                         ?>
                        <tr>
                            <td>{!! $detail1->nama_tindakan !!}</td>
                            <td>{!! $detail1->harga !!}</td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
            </div>
                <div class="col-sm-6 col-md-6">
                    <div class="item form-group">
                        {!! Form::label('biaya_obat', 'Biaya Obat:',['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                        <div class="col-md-7 col-sm-7 col-xs-12">
                        {!! Form::text('biaya_obat', $biaya_obat, ['id'=>'totalID','readonly'=>'readonly','class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br></br>
                    <div class="item form-group">
                        {!! Form::label('biaya_tindakan', 'Biaya Tindakan:',['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                        <div class="col-md-7 col-sm-7 col-xs-12">
                        {!! Form::text('biaya_tindakan', $biaya_tindakan, ['id'=>'totalID','readonly'=>'readonly','class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br></br>
                    <?php $tagihan = $biaya_obat+$biaya_tindakan; ?>
                    <div class="item form-group">
                        {!! Form::label('total', 'Total Tagihan:',['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                        <div class="col-md-7 col-sm-7 col-xs-12">
                        {!! Form::text('total', $tagihan, ['id'=>'totalID','readonly'=>'readonly','class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
        
               <div class="col-sm-6 col-md-6">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="#" class="btn btn-default">Cancel</a>
                </div>
        </div>
        
    </div>
</div>
        {!! Form::close() !!}

    </div>
@endsection
