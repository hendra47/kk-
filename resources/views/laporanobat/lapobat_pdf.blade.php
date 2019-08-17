<html>
<head>
	<title>Laporan Stock Obat</title>
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
		<h5>Laporan Stock Obat</h4>
		<h6>Periode {{$awal}} s/d {{$akhir}}</h5>
	</center>
 
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($data as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$p->code}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->jenis}}</td>
                    <td>{{$p->satuan}}</td>
                    <td>{{$p->harga_beli}}</td>
                    <td>{{$p->harga_jual}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
 
</body>
</html>