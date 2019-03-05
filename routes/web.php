<?php

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

Route::get('/', function () {
    // dd("MASUK");
    return view('auth.login');
});

Route::group(['middleware' => ['isAdmin']], function(){
        
    // Anggota
    Route::get('/anggota/add','AnggotaControl@add');
    Route::post('/anggota/save','AnggotaControl@save');
    Route::get('/anggota/edit/{id_anggota}','AnggotaControl@edit');
    Route::get('/anggota/hapus/{id_anggota}', 'AnggotaControl@destroy');

    // Penerbit
    Route::get('/penerbit/add','PenerbitControl@add');
    Route::post('/penerbit/save','PenerbitControl@save');
    Route::get('/penerbit/edit/{id_penerbit}','PenerbitControl@edit');
    Route::get('/penerbit/hapus/{id_penerbit}', 'PenerbitControl@destroy');

    // Pengarang
    Route::get('/pengarang/add','PengarangControl@add');
    Route::post('/pengarang/save','PengarangControl@save');
    Route::get('/pengarang/edit/{id_pengarang}','PengarangControl@edit');
    Route::get('/pengarang/hapus/{id_pengarang}', 'PengarangControl@destroy');

    // Rak
    Route::get('/rak/add','RakControl@add');
    Route::post('/rak/save','RakControl@save');
    Route::get('/rak/edit/{id_rak}','RakControl@edit');
    Route::get('/rak/hapus/{id_rak}', 'RakControl@destroy');

    //Kategori
    Route::get('/kategori/add','KategoriControl@add');
    Route::post('/kategori/save','KategoriControl@save');
    Route::get('/kategori/edit/{id_kategori}','KategoriControl@edit');
    Route::get('/kategori/hapus/{id_kategori}', 'KategoriControl@destroy');

    // Buku
    Route::get('/buku/add','BukuControl@add');
    Route::post('/buku/save','BukuControl@save');
    Route::get('/buku/edit/{id}','BukuControl@edit');
    Route::get('/buku/hapus/{id}', 'BukuControl@destroy');

    // Koleksi
    Route::get('/koleksi/add','KoleksiControl@add');
    Route::post('/koleksi/save','KoleksiControl@save');
    Route::get('/koleksi/edit/{id}','KoleksiControl@edit');
    Route::get('/koleksi/hapus/{id}', 'KoleksiControl@destroy');

    // Transaksi peminjaman
    Route::post('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::get('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::post('/trans/peminjaman/save', 'TransaksiControl@save_peminjaman');

    // Report
    Route::get('/report/anggota','ReportControl@rpt_anggota');
    Route::get('/report/qrcode_buku','ReportControl@rpt_QRCode_Buku');

    Route::get('/dashboard','DashboardControl@index');
    Route::get('/report/qrcode_anggota','ReportControl@rpt_QRCode_Anggota');
    route::get('/report/buku_tersedia','ReportControl@rpt_buku_tersedia');
    route::get('/report/buku_dipinjam','ReportControl@rpt_buku_dipinjam');
    route::get('/report/kartu_anggota/{id_anggota}','AnggotaControl@print_kartu');
    route::get('/report/buku_rusak','ReportControl@rpt_buku_rusak');
    route::get('/report/buku_hilang','ReportControl@rpt_buku_hilang');

    // Routes User
    Route::get('user','UsersControl@index');
    Route::get('/user/add','UsersControl@add');
    Route::get('/user/edit/{id}','UsersControl@edit');
    Route::get('/user/hapus/{id}','UsersControl@delete');
    Route::post('/user/save', 'UsersControl@save');
});

    Route::group(['middleware' => ['isOperator']], function(){
    //Anggota
    Route::get('/anggota','AnggotaControl@index');

    // Penerbit
    Route::get('/penerbit','PenerbitControl@index');

    // Pengarang
    Route::get('/pengarang','PengarangControl@index');

    // Rak
    Route::get('/rak','RakControl@index');

    //Buku
    Route::get('/buku','BukuControl@index');

    // Koleksi
    Route::get('/koleksi','KoleksiControl@index');

    // Kategori
    Route::get('/kategori','KategoriControl@index');

    // Transaksi peminjaman
    Route::post('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::get('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::post('/trans/peminjaman/save', 'TransaksiControl@save_peminjaman');

    // Transaksi Pengembalian
    Route::post('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::get('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::post('/trans/pengembalian/save', 'TransaksiControl@save_pengembalian');

    route::get('/report/qrcode_buku','ReportControl@rpt_QRCode_Buku');  
    Route::get('/report/qrcode_anggota','ReportControl@QR_Code_Anggota');
    route::get('/report/anggota','ReportControl@rpt_anggota');
    route::get('/report/buku','ReportControl@rpt_buku');
    route::get('/report/buku_tersedia','ReportControl@rpt_buku_tersedia');
    route::get('/report/buku_dipinjam','ReportControl@rpt_buku_dipinjam');
    route::get('/report/kartu_anggota/{id_anggota}','AnggotaControl@print_kartu');
    route::get('/report/buku_rusak','ReportControl@rpt_buku_rusak');
    route::get('/report/buku_hilang','ReportControl@rpt_buku_hilang');
});

Auth::routes();
Route::get('/pinjam', 'DashboardControl@tampil');
Route::get('/dashboard', 'DashboardControl@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

//Mobile Server
Route::get('/mobile/get_buku','MobileControl@get_buku');
Route::get('/mobile/get_Koleksi/{id_buku}','MobileControl@get_Koleksi');
Route::get('/mobile/login','MobileControl@login');