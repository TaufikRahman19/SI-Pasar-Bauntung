<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Perpanjangan Pedagang</title>
</head>
<table align="center">
    <tr>
        <td>
            <img src="<?php echo e(asset('assets/img/logo_bjb.png')); ?>" width="150" height="120">
        </td>
        <td>
            <center>
                <font size="4"><b>PEMERINTAH KOTA BANJARBARU</b></font><br>
                <font size="5"><b>DINAS PERDAGANGAN KOTA BANJARBARU <br> UPT. PASAR BAUNTUNG BANJARBARU</b></font>
                <br>
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
<table border="0" align="center">
    <tr>
        <td>Nomor</td>
        <td width="435">: BJB/IN/UPT.Pasar.Bauntung/2022</td>
        <td width="250">Banjarbaru <?php date_default_timezone_set('Asia/Jakarta');
        echo date('d M y'); ?></td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td width="435">: 1 (satu) Lembar</td>
        <td width="250">Kepada Yth:</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td width="435">: Surat Peringatan 1</td>
        <td width="250">Bpk / Ibu / Sdr(i) <?php echo e($perpanjangan->pedagang->nama); ?></td>
    </tr>
    <tr>
        <td></td>
        <td width="435"></td>
        <td width="250">Nomor Toko : <?php echo e($perpanjangan->pedagang->toko->no_toko); ?> </td>
    </tr>
    <tr>
        <td></td>
        <td width="435"></td>
        <td width="250">Di - Tempat </td>
    </tr>
</table>
<br>
<p align="justify">Berdasarkan Peraturan Daerah Kota Banjarbaru Nomor 5 Tahun 2021 Tentang Perubahan Atas Peraturan
    Daerah Nomor 10 Tahun 2011 tentang Retribusi Pelayanan Pasar dan Retribusi Pasar dan Pertokoan, memperhatikan
    Laporan Hasil BPK RI Nomor 4.B/LHP/XIX.BJM/05/2022 tanggal <?php echo e($perpanjangan->created_at->isoFormat('D MMMM Y')); ?>

    dan mendaftarkan Data Diri ke UPT Pasar Bauntung Banjarbaru, maka dengan ini dapat kami sampaikan :</p>
<table border="0">
    <tr>
        <td width="25">
            <p align="center">1</p>
        </td>
        <td>
            <p align="justify"> Menghindari perpanjangan Pajak Toko Tahun 2022, maka kami harapkan Bapak/Ibu/saudara(i)
                Pedagang Pasar Bauntung untuk <strong>segera melakukan pembayaran pajak.</strong></p>
        </td>
    </tr>
    <tr>
        <td width="25">
            <p align="center">2</p>
        </td>
        <td>
            <p align="justify">Agar Segera melunasi perpanjangan/hutang Pajak Toko di Pasar Bauntung Banjarbaru untuk
                menghindari penerapan sanksi sesuai Peraturan Daerah Nomor 10 Tahun 2021. Adapun perpanjangan sebesar. </p>
        </td>
    </tr>
</table>
<table border="0">
    <tr>
        <td align="center" width="750"><h2><strong>Rp.<?php echo e(currency($perpanjangan->total)); ?></strong></h2></td>
    </tr>
</table>
<table border="0">
    <tr>
        <td width="25">
            <p align="center">3</p>
        </td>
        <td>
            <p align="justify">Agar memperhatikan dan melaksanakan setiap point-point dalam Perjanjian Sewa Menyewa
                Ruko/Toko/Los/Bak yang di tandatangani antara Bapak/Ibu/saudara(i) Pedagang Pasar Bauntung dengan
                Pemerintah Kota Banjarabaru.</p>
        </td>
    </tr>
    <tr>
        <td width="25">
            <p align="center">4</p>
        </td>
        <td>
            <p align="justify">Untuk Pembayaran Pajak Toko atau perpanjangan dapat dilakukan di Kantor UPT Pasar Bauntung
                setiap Hari Senin s/d Jum'at Pukul 08.30 s/d 13.00 WITA. </p>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td>
            Demikian Surat Teguran ini disampaikan, agar dapat menjadi perhatian.
        </td>
    </tr>
</table>
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
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/perpanjangan/detail_perpanjangan.blade.php ENDPATH**/ ?>