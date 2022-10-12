<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pegawai</title>
</head>
<table align="center">
    <tr>
        <td><img src="<?php echo e('assets/img/logo_bjb.png'); ?>" width="150" height="120"></td>
        <td><center>
            <font size="4"><b>PEMERINTAH KOTA BANJARBARU</b></font><br>
            <font size="5"><b>DINAS PERDAGANGAN KOTA BANJARBARU <br> UPT. PASAR BAUNTUNG BANJARBARU</b></font><br>
            <font size="2"><i>Alamat: Jl. R. O. Ulin Banjarbaru Telp (0511) 4772154, email : uptpasarbauntungbanjarbaru@gmail.com</i></font></center>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
</table>
<br>
<table align="center">
    <tr>
        <td>Nomor</td>
        <td width="635">:  .../.../UPT.Pasar.Bauntung/2022</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td width="635">: 1 (satu) Lembar</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td width="635">: Laporan Data Pegawai</td>
    </tr>
</table>
<div class="form-group">
<br>
<br>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Status</th>
                <th>TMT</th>
                <th>SK Pegawai</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($pegawai->nik_pegawai); ?></td>
                <td><?php echo e($pegawai->nama_pegawai); ?></td>
                <td><center><?php echo e($pegawai->jabatan); ?></center></td>
                <td><center><?php echo e($pegawai->jeniskelamin); ?></center></td>
                <td><?php echo e($pegawai->notelpon); ?></td>
                <td><?php echo e($pegawai->status); ?></td>
                <td><?php echo e($pegawai->tmt); ?></td>
                <td><center><?php if($pegawai->sk_pegawai): ?>
                    Ada
                    <?php else: ?>
                    Tidak Ada Data
                <?php endif; ?>
            </center>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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



    <script type="text/javascript">
        window.print();
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pegawai/cetak_pegawai.blade.php ENDPATH**/ ?>