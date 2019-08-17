<html>
 <body>
  <!-- <div class="container">     -->
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="pembayarans_table">
           <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Note</th>
                <th>Biaya Obat</th>
                <th>Biaya Tindakan</th>
                <th>Total</th>
                <th width="5%">Action</th>
            </tr>
           </thead>
       </table>
   </div>
  <!-- </div> -->
 </body>
</html>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
$(document).ready(function(){

 $('#pembayarans_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('pembayarans.index') }}",
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
    data: 'note',
    name: 'note'
   },
   {
    data: 'biaya_obat',
    name: 'biaya_obat'
   },
   {
    data: 'biaya_tindakan',
    name: 'biaya_tindakan'
   },
   {
    data: 'total',
    name: 'total'
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