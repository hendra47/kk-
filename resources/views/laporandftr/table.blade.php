<html>
 <body>
  <div class="container">    
   
   <div class="table-responsive">
   <!-- <div class="content"> -->
       @include('adminlte-templates::common.errors')
       <div class="form-group col-sm-4 box box-solid box-warning">
           <div class="box-body">
               <div class="row">
                  {!! Form::model(['route' => ['laporandftr'], 'method' => 'get','target'=>'_blank']) !!}

                      <!-- Nama Field -->
                      <div class="form-group col-sm-2">
                           {!! Form::label('tglawal', 'Tanggal Awal:') !!}
                          {!! Form::date('tglawal', null, ['class' => 'form-control','id'=>'tglawal']) !!}
                      </div>
                      <div class="form-group col-sm-2">
                           {!! Form::label('tglakhir', 'Tanggal Akhir:') !!}
                          {!! Form::date('tglakhir', null, ['class' => 'form-control','id'=>'tglakhir']) !!}
                      </div>
                        <br>
                      <!-- Submit Field -->
                      <div class="form-group col-sm-2">
                          {!! Form::submit('View', ['class' => 'btn btn-warning']) !!}
                          <p>
                      </div>
                      
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
  </div>
 </body>
</html>
