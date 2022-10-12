<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Kegiatan</title>
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
        <td width="635">: Laporan Keterangan Kegiatan</td>
    </tr>
</table>
<div class="form-group">
<br>
<br>
    <table border="1" align="center">
        <thead>
            <tr>
                <th width="50">No.</th>
                <th width="100">Kode Kegiatan</th>
                <th width="500">Judul Kegiatan</th>
                <th width="100">Tanngal Mulai</th>
                <th width="100">Tanngal Selesai</th>
                <th width="200">Tempat</th>
                {{-- <th width="100">Perihal</th> --}}
                <th width="400">Keterangan</th>
                <th width="100">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{$event->kegiatan->kode_kegiatan}}</td>
                <td>{{$event->kegiatan->judul_kegiatan}}</td>
                <td>{{$event->kegiatan->tanggal_mulai}}</td>
                <td>{{$event->kegiatan->tanggal_selesai}}</td>
                <td>{{$event->kegiatan->tempat}}</td>
                {{-- <td>{{$event->kegiatan->perihal}}</td> --}}
                <td>{{$event->kegiatan->keterangan}}</td>
                <td>{{$event->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
        <p align="center"><b>Laporan Data Kegiatan</b></p>
        <table align="center" border="1">
            <thead>
                <tr>
                    <th width="3%">No.</th>
                    <th width="25%">Judul Kegiatan</th>
                    <th width="13%">Tanggal</th>
                    <th width="15%">Tempat</th>
                    <th width="28%">Perihal</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $kegiatan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$kegiatan->judul_kegiatan}}</td>
                    <td>{{$kegiatan->tanggal}}</td>
                    <td>{{$kegiatan->tempat}}</td>
                    <td>{{$kegiatan->perihal}}</td>
                    <td>
                        <center><img src="{{asset('fotoKegiatan/'.$kegiatan->foto) }}" width="20%" alt="" srcset=""></center>
                    </td>
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
