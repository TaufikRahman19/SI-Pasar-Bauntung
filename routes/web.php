<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', 'AuthController@index');
// Route::get('/dashboard', function() {
//     return view('dashboard');
// })->middleware(['auth']);

// Route::group(['middleware' => 'auth'], function(){
//     Route::group(['middleware' => 'role:Kepala Pasar'], function () {
//         Route::get('/dashboard', function(){
//             return 'Hello Kepala Pasar';
//         });
//     });

//     Route::group(['middleware' => 'role:pedagang'], function () {
//         Route::get('/penjualan/daftar_penjualan', function(){
//             return 'Hello User';
//         });
//     });
// });


Route::get('/dashboard', 'AuthController@login')->name('home');
Route::get('/dashboard_pedagang', 'AuthController@login')->name('home');
// Route::get('/ubah_pass', 'AuthController@ubah_pass');

Route::get('/', 'Auth\LoginController@getLogin')->name('login');
Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('login');
Route::get('/logout', 'Auth\LoginController@postLogout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::group(['middleware' => ['auth', 'ceklevel:Kepala Pasar,Pegawai,Pedagang']], function () {
    Route::resource('pedagang', 'PedagangController')->names([
        'index'  => 'pedagang.index',
        'create' => 'pedagang.form.tambah',
        'store' => 'pedagang.tambah',
        'edit' => 'pedagang.edit',
        'update' => 'pedagang.update',
        'destroy' => 'pedagang.hapus',
        'show' => 'pedagang.kartu'

    ]);
});

Route::get('/pedagang_verif/{id}', 'PedagangController@verif')->name('pedagang_verif');
Route::post('/verifikasi_pedagang/{id}', 'PedagangController@verifikasiPedagang')->name('verifikasi_pedagang');

Route::get('/pedagang_tunggak/{id}', 'PedagangController@tunggakan')->name('pedagang_tunggak');
Route::post('/tunggakan_pedagang/{id}', 'PedagangController@tunggakanPedagang')->name('tunggakan_pedagang');

Route::get('/cetak_pedagang', 'PedagangController@cetakPedagang')->name('cetak_pedagang');
Route::get('/data_pedagang', 'PedagangController@dataPedagang')->name('data_pedagang');
Route::get('/cetak_filter', 'PedagangController@cetakFilter')->name('cetak_filter');
Route::get('/cetak_filter-pertanggal/{tglawal}/{tglakhir}', 'PedagangController@cetakPedagangPertanggal')->name('cetak_filter-pertanggal');

Route::get('/datadiri_pedagang', 'PedagangController@datadiri')->name('datadiri');
Route::post('/tambahkan_pedagang', 'PedagangController@tambahkan')->name('tambahkan');


Route::group(['middleware' => ['auth', 'ceklevel:Kepala Pasar,Pegawai']], function () {

    Route::resource('toko', 'TokoController')->names([
        'index'  => 'toko.index',
        'create' => 'toko.form.tambah',
        'store' => 'toko.tambah',
        'edit' => 'toko.edit',
        'update' => 'toko.update',
        'destroy' => 'toko.hapus'
    ]);
    Route::get('/cetak_toko', 'TokoController@cetakToko')->name('cetak_toko');

    Route::resource('kegiatan', 'KegiatanController')->names([
        'index'  => 'kegiatan.index',
        'create' => 'kegiatan.form.tambah',
        'store' => 'kegiatan.tambah',
        'edit' => 'kegiatan.edit',
        'update' => 'kegiatan.update',
        'destroy' => 'kegiatan.hapus',
        'show' => 'kegiatan.detail'

    ]);

    Route::get('/cetak_kegiatan', 'KegiatanController@cetakKegiatan')->name('cetak_kegiatan');

    Route::resource('event', 'EventController')->names([
        'index'  => 'event.index',
        'create' => 'event.form.tambah',
        'store' => 'event.tambah',
        'edit' => 'event.edit',
        'update' => 'event.update',
        'destroy' => 'event.hapus',
        'show' => 'event.detail'

    ]);

    Route::get('/cetak_event', 'EventController@cetakEvent')->name('cetak_event');


    Route::resource('pegawai', 'PegawaiController')->names([
        'index'  => 'pegawai.index',
        'create' => 'pegawai.form.tambah',
        'store' => 'pegawai.tambah',
        'edit' => 'pegawai.edit',
        'update' => 'pegawai.update',
        'destroy' => 'pegawai.hapus',
        'show' => 'pegawai.detail'
    ]);
    Route::get('/cetak_pegawai', 'PegawaiController@cetakPegawai')->name('cetak_pegawai');

    Route::resource('fasilitas', 'FasilitasController')->names([
        'index'  => 'fasilitas.index',
        'create' => 'fasilitas.form.tambah',
        'store' => 'fasilitas.tambah',
        'edit' => 'fasilitas.edit',
        'update' => 'fasilitas.update',
        'destroy' => 'fasilitas.hapus',
        'show' => 'fasilitas.detail'
    ]);
    Route::get('/cetak_fasilitas', 'FasilitasController@cetakFasilitas')->name('cetak_fasilitas');

    Route::resource('pengujian', 'PengujianController')->names([
        'index'  => 'pengujian.index',
        'create' => 'pengujian.form.tambah',
        'store' => 'pengujian.tambah',
        'edit' => 'pengujian.edit',
        'update' => 'pengujian.update',
        'destroy' => 'pengujian.hapus',
        'show' => 'pengujian.detail'
    ]);
    Route::get('/cetak_pengujian', 'PengujianController@cetakPengujian')->name('cetak_pengujian');

    Route::resource('pajak', 'PajakController')->names([
        'index'  => 'pajak.index',
        'create' => 'pajak.form.tambah',
        'store' => 'pajak.tambah',
        'edit' => 'pajak.edit',
        'update' => 'pajak.update',
        'destroy' => 'pajak.hapus'

    ]);
    Route::get('/cetak_pajak', 'PajakController@cetakPajak')->name('cetak_pajak');

    Route::resource('pengguna', 'PenggunaController')->names([
        'index'  => 'pengguna.index',
        'create' => 'pengguna.form.tambah',
        'store' => 'pengguna.tambah',
        'edit' => 'pengguna.edit',
        'update' => 'pengguna.update',
        'destroy' => 'pengguna.hapus'

    ]);
    Route::get('/pengguna_pedagang/{id}', 'PenggunaController@penggunaPedagang')->name('pengguna_pedagang');
    Route::post('/verifikasi_pengguna/{id}', 'PenggunaController@verifikasiPengguna')->name('verifikasi_pengguna');
    Route::get('/cetak_pengguna', 'PenggunaController@cetakPengguna')->name('cetak_pengguna');
});

Route::group(['middleware' => ['auth', 'ceklevel:Kepala Pasar,Pegawai,Pedagang']], function () {
    Route::resource('pembayaran', 'PembayaranController')->names([
        'index'  => 'pembayaran.index',
        'create' => 'pembayaran.form.tambah',
        'store' => 'pembayaran.tambah',
        'edit' => 'pembayaran.edit',
        'update' => 'pembayaran.update',
        'destroy' => 'pembayaran.hapus',
        'show' => 'pembayaran.detail'
    ]);

    Route::get('/pertama_pembayaran', 'PembayaranController@pertama')->name('pertama');
    Route::post('/bayar_pembayaran', 'PembayaranController@bayar')->name('bayar');
    Route::get('/pembayaran_tunggakan', 'PembayaranController@tunggakan')->name('tunggakan');
    Route::post('/bayar_tunggakan', 'PembayaranController@bayarTunggakan')->name('bayarTunggakan');
    Route::get('/pembayaran_kontrak/{kontrak_id}', 'PembayaranController@pembayaran_kontrak');
    Route::get('/online_pembayaran', 'PembayaranController@online')->name('online_pembayaran');
    Route::get('/lunas_pembayaran', 'PembayaranController@lunas')->name('lunas_pembayaran');
    Route::get('/belum_pembayaran', 'PembayaranController@belum')->name('belum_pembayaran');
    Route::get('/tunggakan_pembayaran', 'PembayaranController@belum')->name('tunggakan_pembayaran');
    Route::get('/cetak_pembayaran', 'PembayaranController@cetakPembayaran')->name('cetak_pembayaran');
    Route::get('/cetak_online', 'PembayaranController@Cetakonline')->name('cetak_online');
    Route::get('/cetak_lunas', 'PembayaranController@Cetaklunas')->name('cetak_lunas');
    Route::get('/cetak_belum', 'PembayaranController@Cetakbelum')->name('cetak_belum');



    // Route::get('/cetak_pembayaran-detail','PembayaranController@cetakPangkatperid')->name('cetak_pembayaran-detail');
    Route::get('/cetak_pembayaran_form', 'PembayaranController@cetakForm')->name('cetak_pembayaran_form');
    Route::get('/cetak_pembayaran_pertanggal/{tglawal}/{tglakhir}', 'PembayaranController@cetakPembayaranPertanggal')->name('cetak_pembayaran_pertanggal');

    Route::resource('tunggakan', 'TunggakanController')->names([
        'index'  => 'tunggakan.index',
        'create' => 'tunggakan.form.tambah',
        'store' => 'tunggakan.tambah',
        'edit' => 'tunggakan.edit',
        'update' => 'tunggakan.update',
        'destroy' => 'tunggakan.hapus',
        'show' => 'tunggakan.detail'
    ]);

    Route::get('/cetak_tunggakan', 'TunggakanController@cetakTunggakan')->name('cetak_tunggakan');

    Route::resource('perpanjangan', 'PerpanjanganController')->names([
        'index'  => 'perpanjangan.index',
        'create' => 'perpanjangan.form.tambah',
        'store' => 'perpanjangan.tambah',
        'edit' => 'perpanjangan.edit',
        'update' => 'perpanjangan.update',
        'destroy' => 'perpanjangan.hapus',
        'show' => 'perpanjangan.detail'
    ]);

    Route::get('/cetak_perpanjangan', 'PerpanjanganController@cetakPerpanjangan')->name('cetak_perpanjangan');

});



Route::group(['middleware' => ['auth', 'ceklevel:Pedagang']], function () {
    Route::resource('pertama', 'PertamaController')->names([
        'index'  => 'pertama.index',
        'create' => 'pertama.form.tambah',
        'store' => 'pertama.tambah',
        'edit' => 'pertama.edit',
        'update' => 'pertama.update',
        'destroy' => 'pertama.hapus',
        'show' => 'pertama.detail'
    ]);

    Route::get('/pertama_kontrak/{kontrak_id}', 'PertamaController@pertama_kontrak');
    Route::get('/cetak_pertama', 'PertamaController@cetakPertama')->name('cetak_pertama');
    // Route::get('/cetak_pertama-detail','PertamaController@cetakPangkatperid')->name('cetak_pertama-detail');
    Route::get('/cetak_pertama_form', 'PertamaController@cetakForm')->name('cetak_pertama_form');
    Route::get('/cetak_pertama_pertanggal/{tglawal}/{tglakhir}', 'PertamaController@cetakPertamaPertanggal')->name('cetak_pertama_pertanggal');
});
// Route::resource('pembelian', 'PembelianController')->names([
//     'index' => 'pembelian.index',
//     'create' => 'pembelian.form.tambah',
//     'store' => 'pembelian.tambah',
//     'destroy' => 'pembelian.hapus',
//     'edit'    => 'pembelian.form.edit',
//     'update'  => 'pembelian.edit',
// ]);

// Route::get('/pembelian/riwayat/list', 'PembelianController@riwayat')->name('pembelian.riwayat');

// Route::get('/pembelian/detail/{id}', 'PembelianController@detail')->name('pembelian.detail');
// Route::get('/pembelian/{id}/pembayaran/create', 'PembelianController@payment_show')->name('pembayaran.form.tambah');
// Route::post('/pembelian/{id}/pembayaran/store', 'PembelianController@payment_store')->name('pembayaran.tambah');

// Route::post('/pembelian/supplier/store', 'PembelianController@supplier_store')->name('pembelian.supplier.tambah');

// Route::get('/pembelian/{id}/pembayaran/list', 'PembelianController@payment_list')->name('pembayaran.list');
// Route::get('/pembelian/pembayaran/edit/{id}/{purchase_id}', 'PembelianController@payment_edit')->name('pembayaran.edit');
// Route::get('/pembelian/pembayaran/update/{id}', 'PembelianController@payment_update')->name('pembayaran.update');
// Route::get('/pembelian/pembayaran/delete/{id}', 'PembelianController@payment_destroy')->name('pembayaran.destroy');

// Route::resource('supplier', 'SupplierController')->names([
//     'index' => 'supplier.index',
//     'create' => 'supplier.form.tambah',
//     'store' => 'supplier.tambah',
//     'edit' => 'supplier.edit',
//     'update' => 'supplier.update',
//     'destroy' => 'supplier.hapus'
// ]);

// Route::resource('sales', 'SalesController')->names([
//     'index'  => 'sales.index',
//     'create' => 'sales.form.tambah',
//     'store' => 'sales.tambah',
//     'edit' => 'sales.edit',
//     'update' => 'sales.update',
//     'destroy' => 'sales.hapus'
// ]);
// Route::get('supplier/{id}/sales', 'SalesController@getSales');

// Route::group(['prefix' => 'lokasi', 'as' => 'lokasi'], function () {
//     Route::get('provinsi/{id_prov?}', 'LokasiController@getProvinsi')->name('prov');

//     Route::get('provinsi/{id_prov}/kabupaten', 'LokasiController@getKabupatenByIdProv');
//     Route::get('provinsi/kabupaten/{id_kab}', 'LokasiController@getKabupatenByIdKab');
// });


// Route::get('/barang/daftar', 'BarangController@daftar');
// Route::get('/barang/tambah', 'BarangController@tambah');

// Route::resource('driver', 'DriverController')->names([
//     'index'  => 'driver.index',
//     'create' => 'driver.form.tambah',
//     'store' => 'driver.tambah',
//     'edit' => 'driver.edit',
//     'update' => 'driver.update',
//     'destroy' => 'driver.hapus',
//     'show' => 'driver.detail'

// ]);

Route::resource('pengiriman', 'ShippingController')->names([
    'index' => 'pengiriman.index',
    'create' => 'pengiriman.form.tambah',
    'store' => 'pengiriman.tambah',
    'edit'    => 'pengiriman.form.edit',
    'update'  => 'pengiriman.edit',
    'show'    => 'pengiriman.detail',
    'destroy'    => 'pengiriman.hapus',
]);

Route::get('/pengiriman/riwayat/list', 'ShippingController@riwayat')->name('pengiriman.riwayat');
Route::get('/pengiriman/cetak_invoice/{id}', 'ShippingController@cetak_invoice')->name('pengiriman.cetak-invoice');
Route::get('/pengiriman/{id}/create', 'ShippingController@create')->name('pengiriman.tambah.form');
Route::post('pengiriman/{pengiriman}/send', 'ShippingController@sendShipping')->name('pengiriman.kirim');
Route::get('/pengiriman/cetak_invoice/{id}/pdf', 'ShippingController@pdf_invoice')->name('pengiriman.cetak-pdf');




Route::resource('penjualan', 'PenjualanController')->names([
    'index'  => 'penjualan.index',
    'create' => 'penjualan.form.tambah',
    'show' => 'penjualan.detail',
    'store' => 'penjualan.tambah',
    'edit' => 'penjualan.form.edit',
    'update' => 'penjualan.edit',
    'destroy' => 'penjualan.hapus'
]);

Route::get('/penjualan/{id}/pembayaran/create', 'PenjualanController@payment_show')->name('pembayaransale.form.tambah');
Route::post('/penjualan/{id}/pembayaran/store', 'PenjualanController@payment_store')->name('pembayaransale.tambah');

Route::get('/penjualan/{id}/pembayaran/list', 'PenjualanController@payment_list')->name('pembayaransale.list');
Route::get('/penjualan/pembayaran/edit/{id}/{sale_id}', 'PenjualanController@payment_edit')->name('pembayaransale.edit');
Route::get('/penjualan/pembayaran/update/{id}', 'PenjualanController@payment_update')->name('pembayaransale.update');
Route::get('/penjualan/pembayaran/delete/{id}', 'PenjualanController@payment_destroy')->name('pembayaransale.destroy');
