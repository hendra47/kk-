@extends('layouts.app')

@section('content')

<section class="content-header">
        <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Rekam Medis</a></li>
            <li class="active">Create</li>
        </ol>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="content-header">
        <h1>
            Rekam Medis
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')

        {!! Form::open(['route' => 'rekamMedis.store']) !!}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-sm-3">
                        {!! Form::label('nama', 'Nama:') !!}
                        {!! Form::text('nama_pasien', $pasiens->nama, ['class' => 'form-control']) !!}
                        {!! Form::hidden('id_pasien', $pasiens->id, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('umur', 'Tanggal Lahir:') !!}
                        {!! Form::text('tgl_lahir', $pasiens->tgl_lahir, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('jk', 'Jk:') !!}
                        {!! Form::select('jk', array('L' => 'Laki-Laki', 'P' => 'Peremnpuan'), $pasiens->jk,['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('nama', 'Nama Dokter:') !!}
                        {!! Form::text('nama_dokter', $dokters->name, ['class' => 'form-control']) !!}
                        {!! Form::hidden('id_dokter', $dokters->id, ['class' => 'form-control']) !!}
                        {!! Form::hidden('id_daftar', $daftars->id, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-sm-6">
                        {!! Form::label('alergi_obat', 'Alergi Obat:') !!}
                        {!! Form::select('alergi_obat', array('Y' => 'Ya', 'T' => 'Tidak'), 'T',['class' => 'form-control']); !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('keluhan', 'Keluhan Utama:') !!}
                        {!! Form::textarea('keluhan', null, ['class' => 'form-control']) !!}
                    </div>
                     <div class="form-group col-sm-6">
                        {!! Form::label('note', 'Note:') !!}
                        {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

             <!--    <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('tindakan', 'Tindakan:') !!}
                        {!! Form::select('is_tindakan', array('Y' => 'Ya', 'T' => 'Tidak'), 'T',['id'=>'pilihTindakan','class' => 'form-control']); !!}
                        {!! Form::text('tindakan', null, ['class' => 'form-control']) !!}
                        <a  href='javascript:void(0);' id="tambahanTindakan" class="btn btn-success" style="margin-top:10px;display:none"><i class="fa fa-plus"> </i> Tambah Tindakan</a>

                    </div>
                </div>
                <div id="tindakanTable">
                    
                </div> -->
                @section('scripts')
                <script type="text/javascript">
                    var idTindakan = 1;
                    var idObat = 1;
                    // pilihTindakan
                    // $("#pilihTindakan").change(function(e){
                    //     if(e.target.value=='Y'){
                    //         document.getElementById("tambahanTindakan").style.display = "block";
                    //     }else{
                    //         document.getElementById("tambahanTindakan").style.display = "none";
                    //         idTindakan=1;
                    //         var e = document.querySelector("#tindakanTable");
                    //         var child = e.lastElementChild;  
                    //         while (child) { 
                    //             e.removeChild(child); 
                    //             child = e.lastElementChild; 
                    //         } 

                    //     }
                    // });
                    // // tindakan
                    // $("#tambahanTindakan").click(function(){
                    //     const childDivs = document.querySelectorAll('#tindakanTable > div');
                    //     if(childDivs.length==0){
                    //         idTindakan=1;
                    //     }
                    //     $("#tindakanTable").append("<div class='row' id='tindakan-"+idTindakan+"'> <div class='form-group col-sm-6'> <label>Tindakan "+idTindakan+"</label> <input type='text' name='tindakan[]' class='form-control'> </div> <a href='javascript:void(0);' onclick='hapustindakan("+idTindakan+")' style='margin-top:25px' class='btn btn-danger'><i class='fa fa-trash'> </i></a> </div>");
                    //     idTindakan++;
                    // });

                    // function hapustindakan(e){
                    //     var elem = document.getElementById("tindakan-"+e);
                    //     elem.parentElement.removeChild(elem);
                    // };

                    // obat
                    $("#tambah_obat").click(function(){
                        const childObat = document.querySelectorAll('#obatTable > tbody > tr');
                        // console.log(childObat.length);
                        if(childObat.length==0){
                            idObat=1;
                        }
                        $("#obatTable > tbody").append("<tr id='obat-"+idObat+"'><td> <select id='nama_obat_"+idObat+"' name='nama_obat[]' class='form-control'></select> </td> </td> <td> <input type='text' name='qty[]' class='form-control' /> </td> <td> <input type='text' name='note_obat[]' class='form-control' /> </td>  <td> <a href='javascript:void(0);' onclick='hapus("+idObat+")' class='btn btn-danger'><i class='fa fa-trash'> </i></a> </td> </tr>");
                        $.getJSON("/repositories/klinik/public/obat-list", function(data) {
                            const dataObat = data.data;
                            console.log(idObat);
                            // $("#nama_obat_"+idObat).remove();
                            $.each(dataObat, function(res){
                                // console.log(this.nama);
                                $("#nama_obat_"+idObat).append('<option value="'+ this.id +'">'+ this.nama +'</option>')
                            });
                        idObat++;

                        });

                    });

                    function hapus(e){
                        var elem = document.getElementById("obat-"+e);
                        console.log(elem);
                        elem.parentElement.removeChild(elem);
                    };


                    // tindakan
                    $("#tambah_tindakan").click(function(){
                        const childtindakan = document.querySelectorAll('#tindakanTable > tbody > tr');
                        // console.log(childtindakan.length);
                        if(childtindakan.length==0){
                            idTindakan=1;
                        }
                        $("#tindakanTable > tbody").append("<tr id='tindakan-"+idTindakan+"'><td><select id='nama_tindakan_"+idTindakan+"' name='nama_tindakan[]' class='form-control'></select></td><td><a href='javascript:void(0);' onclick='hapus("+idTindakan+")' class='btn btn-danger'><i class='fa fa-trash'> </i></a> </td> </tr>");
                        $.getJSON("/repositories/klinik/public/tindakan-list", function(data) {
                            const dataTindakan = data.data;
                            console.log(idTindakan);
                            // $("#nama_Tindakan_"+idTindakan).remove();
                            $.each(dataTindakan, function(res){
                                console.log(this.type);
                                $("#nama_tindakan_"+idTindakan).append('<option value="'+ this.id +'">'+ this.nama +'</option>')
                            });
                        idTindakan++;

                        });

                    });

                    function hapus(e){
                        var elem = document.getElementById("tindakan-"+e);
                        console.log(elem);
                        elem.parentElement.removeChild(elem);
                    };


                </script>
            @endsection
<br>
<br>
<!-- Tindakan -->

            <div class="row">
                    <div class="col-sm-2">
                        <h3>Tindakan:</h3>
                    </div>
                    <div class="col-sm-2 col-sm-offset-8" style="text-align:right;padding-top:20px;">
                        <a href='javascript:void(0);' id="tambah_tindakan" class="btn btn-success"><i class="fa fa-plus"> </i> Tambah Tindakan</a>
                    </div>
                </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <table class="table table-bordered" id="tindakanTable" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>Tindakan Yang Dibutuhkan Pasien</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

<!-- Resep Obat -->

                <div class="row">
                    <div class="col-sm-2">
                        <h3>Resep Obat:</h3>
                    </div>
                    <div class="col-sm-2 col-sm-offset-8" style="text-align:right;padding-top:20px;">
                        <a href='javascript:void(0);' id="tambah_obat" class="btn btn-success"><i class="fa fa-plus"> </i> Tambah Obat</a>
                    </div>
                </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <table class="table table-bordered" id="obatTable" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Qty</th>
                                <th>Note</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="#" class="btn btn-default">Cancel</a>
                </div>
                </div>



            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection
