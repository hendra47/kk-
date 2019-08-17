<html>
 <body>
  <!-- <div class="container">     -->
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
        <th>Jabatan</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Jk</th>
        <th>Alamat</th>
        <th>Email</th>
        <th width="10%">Action</th>
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

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('users.index') }}",
  },
  columns:[
   {
    data: 'nama_group',
    name: 'nama_group'
   },
   {
    data: 'name',
    name: 'name'
   },
   {
    data: 'phone',
    name: 'phone'
   },
   {
    data: 'jk',
    name: 'jk'
   },
   {
    data: 'email',
    name: 'email'
   },
   {
    data: 'alamat',
    name: 'alamat'
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