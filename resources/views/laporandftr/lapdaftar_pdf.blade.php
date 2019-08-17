<html>
<head>
	<title>Laporan Pendaftaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Pendaftaran</h4>
		<h6>Periode {{$awal}} s/d {{$akhir}}</h5>
	</center>
 
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>ID Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Dokter</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($data as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$p->tgl}}</td>
                    <td>{{$p->id_pasien}}</td>
                    <td>{{$p->nama_pasien}}</td>
                    <td>{{$p->nama_dokter}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
 
</body>
</html>