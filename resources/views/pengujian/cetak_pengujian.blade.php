<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pengujian</title>
</head>
<table align="center">
    <tr>
        <td><img src="{{'assets/img/logo_bjb.png'}}" width="150" height="120"></td>
        <td><center>
            <font size="4"><b>PEMERINTAH KOTA BANJARBARU</b></font><br>
            <font size="5"><b>DINAS PERDAGANGAN KOTA BANJARBARU <br> UPT. PASAR BAUNTUNG BANJARBARU</b></font><br>
            <font size="2"><i>Alamat: Jl. R. O. Ulin Banjarbaru Telp (0511) 4772154, email : uptpasarbauntungbanjarbaru@gmail.com</i></font></center>
        </td>
    </tr>
    <tr>
<br>
    </tr>
</table>
<hr>
<br>
<table align="center">
    <tr>
        <td>Nomor</td>
        <td width="635">:  BJB/IN/UPT.Pasar.Bauntung/2022</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td width="635">: 1 (satu) Lembar</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td width="635">: Laporan Data Pengujian</td>
    </tr>
</table>
<div class="form-group">
    <br>
    <br>
    <table border="1" align="center">
        <thead>
            <tr>
                <th width="50">No.</th>
                <th width="200">NIK</th>
                <th width="200">Nama Petugas</th>
                <th width="50">Jenis Kelamin</th>
                <th width="200">Foto </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengujians as $pengujian)
            <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{$pengujian->nik}}</td>
                <td>{{$pengujian->nama_petugas}}</td>
                <td><center>{{$pengujian->jenis_kelamin}}</center></td>
                <td>
                    @if ($pengujian->fotopengujian)
                    Ada Fotonyaa
                    @else
                    Tidak Ada Foto
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<br>
<br>
<table align="right">
    <tr>
        <td>An. Kepala UPT. Pasar Bauntung Banjarbaru <br><center> Kasubbag TU,</center></td>
    </tr>
    <tr>
        <td height="60"></td>
    </tr>
    <tr>
        <td><center><b><u>LISA INDRANYLA,S.KOM</u></b></center></td>
    </tr>
    <tr>
        <td><center>NIP. 19780823 200604 2 024</center></td>
    </tr>
</table>
<body>
    {{-- <div class="form-group">
        <p align="center"><b>Laporan Data pengujian</b></p>
        <table align="center" border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kualitas</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengujians as $pengujian)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pengujian->nama_barang}}</td>
                    <td>{{$pengujian->jumlah}}</td>
                    <td>{{$pengujian->kualitas}}</td>
                    <td>{{$pengujian->keterangan}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <script type="text/javascript">
        window.print();
</script>
</body>
</html>
