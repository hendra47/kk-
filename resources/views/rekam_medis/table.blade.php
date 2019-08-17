<html>
 <body>
  <!-- <div class="container">     -->
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="rekam_medis_table">
           <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Keluhan</th>
                <th>Note</th>
            </tr>
           </thead>
       </table>
   </div>
  <!-- </div> -->
 </body>
</html>
@section('scripts')
<script>
$(document).ready(function(){

 $('#rekam_medis_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('rekamMedis.index') }}",
  },
  columns:[
   {
    data: 'created_at',
    name: 'created_at'
   },
   {
    data: 'nama_pasien',
    name: 'nama_pasien'
   },
   {
    data: 'nama_dokter',
    name: 'nama_dokter'
   },
   {
    data: 'keluhan',
    name: 'keluhan'
   },
   {
    data: 'note',
    name: 'note',
    // orderable: false
   }
  ]
 });

 });
 
</script>
@endsection