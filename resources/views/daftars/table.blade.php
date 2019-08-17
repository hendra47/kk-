<html>
 <body>
  <!-- <div class="container">     -->
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="daftars_table">
           <thead>
            <tr>
                <th>Tgl</th>
                <th>ID Pasien</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th width="10%">Action</th>
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

 $('#daftars_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('daftars.index') }}",
  },
  columns:[
   {
    data: 'tgl',
    name: 'tgl'
   },
   {
    data: 'id_pasien',
    name: 'id_pasien'
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
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 });
 var user_id;

$("#myModal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load(link.attr("href"));
});

 $('#ok_button').click(function(){
    // console.log(user_id);
  $.ajax({
   url:"daftars/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#daftars_table').DataTable().ajax.reload();
    }, 2000);
   }
  })
 });

 
</script>
@endsection