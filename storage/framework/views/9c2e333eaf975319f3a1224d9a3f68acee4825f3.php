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
        <td><img src="<?php echo e('assets/img/logo_bjb.png'); ?>" width="150" height="120"></td>
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
        <td width="635">: Laporan Pedagang</td>
    </tr>
</table>
<div class="form-group">
<br>
<br>
    <table border="1" align="center">
        <thead>
            <tr>
                <th width="50">No.</th>
                <th width="200">No Register</th>
                <th width="200">Nama</th>
                <th width="200">Jenis Dagang</th>
                <th width="100">Jenis Toko</th>
                <th width="100">Nomor Toko</th>
                <th width="400">Alamat</th>
                <th width="200">Nomor Telpon</th>
                <th width="200">Massa Kontrak</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pedagangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedagang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                <td><center><?php echo e($loop->iteration); ?></center></td>
                <td><font size="4"><?php echo e($pedagang->no_register); ?></font></td>
                <td><font size="4"><?php echo e($pedagang->nama); ?></font></td>
                <td><font size="4"><?php echo e($pedagang->jenis_dagang); ?></font></td>
                <td><font size="4"><?php echo e($pedagang->toko->jenis_toko); ?></font></td>
                <td><font size="4"><?php echo e($pedagang->toko->no_toko); ?></font></td>
                <td><font size="4"><?php echo e($pedagang->alamat); ?></font></td>
                <td><font size="4"><?php echo e($pedagang->notelpon); ?></font></td>
                <td><font size="4"><?php echo e($pedagang->massa_kontrak); ?> Bulan</font></td>

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
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pedagang/cetak_pedagang.blade.php ENDPATH**/ ?>