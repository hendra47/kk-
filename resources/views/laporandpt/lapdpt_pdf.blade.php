<html>
<head>
	<title>Laporan Pendapatan</title>
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
		<h5>Laporan Pendapatan</h4>
		<h6>Periode {{$awal}} s/d {{$akhir}}</h5>
	</center>
 
        <table class='table table-bordered'>
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
                    <td>{{$p->total}}</td>
                </tr>
                @endforeach
                 <tr>
                    <td>Total</td>
                    <td>62000</td>
                </tr>
            </tbody>
        </table>
 
</body>
</html>