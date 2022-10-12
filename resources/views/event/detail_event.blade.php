<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pedagang</title>
</head>
<table align="center">
    <tr>
        <td>
            <img src="{{ asset('assets/img/logo_bjb.png') }}" width="150" height="120">
        </td>
        <td>
            <center>
                <font size="4"><b>PEMERINTAH KOTA BANJARBARU</b></font><br>
                <font size="5"><b>DINAS PERDAGANGAN KOTA BANJARBARU <br> UPT. PASAR BAUNTUNG BANJARBARU</b></font><br>
                <font size="2"><i>Alamat: Jl. R. O. Ulin Banjarbaru Telp (0511) 4772154, email :
                        uptpasarbauntungbanjarbaru@gmail.com</i></font>
            </center>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr>
        </td>
    </tr>
</table>
{{-- <table align="center">
    <tr>
        <td>Nomor</td>
        <td width="635">: .../.../UPT.Pasar.Bauntung/2022</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td width="635">: 1 (satu) Lembar</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td width="635">: Laporan Data Pembayaran Pajak</td>
    </tr>
</table> --}}
<div class="form-group">
    <br>
    <h1>
        <center>Surat Pemberitahuan Keterangan Kegiatan</center>
    </h1>
    <table border="0">
        <tr>
            <td width="150">Kode Kegiatan</td>
            <td width="200">: {{ $event->kegiatan->kode_kegiatan }}</td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Judul</td>
            <td width="200">: {{ $event->kegiatan->judul_kegiatan }}</td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Tanggal Mulai</td>
            <td width="200">: {{ $event->kegiatan->tanggal_mulai }}</td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Tanggal Selesai</td>
            <td width="200">: {{ $event->kegiatan->tanggal_selesai }}</td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Tempat</td>
            <td width="200">: {{ $event->kegiatan->tempat }}</td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Perihal</td>
            <td width="200">: {{ $event->kegiatan->perihal }}</td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Keterangan</td>
            <td width="200">: {{ $event->kegiatan->keterangan }}</td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Status</td>
            <td width="200">: {{ $event->status }}</td>
        </tr>
    </table>

</div>
<br>
<br>
<br>
<table align="right">
    <tr>
        <td>An. Kepala UPT. Pasar Bauntung Banjarbaru <br>
            <center> Kasubbag TU,</center>
        </td>
    </tr>
    <tr>
        <td height="60"></td>
    </tr>
    <tr>
        <td>
            <center><b><u>LISA INDRANYLA,S.KOM</u></b></center>
        </td>
    </tr>
    <tr>
        <td>
            <center>NIP. 19780823 200604 2 024</center>
        </td>
    </tr>
</table>

<body>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
