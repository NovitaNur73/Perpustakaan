<style>
table { position: relative; border-collapse:collapse; width: 100%; }
table td { border:1px solid #000; padding: 5px; }
h1,h2,p { margin: 0; text-align: center;}
p { padding-bottom: 15px; margin-bottom: 15px; border-bottom: 8px double #000; }
.title { background: #ccc; }
</style>

<h1>PEPRUSTAKAAN UMUM</h1>
<h2>WEARNES EDUCATION CENTER MADIUN</h2>
<p>Jl Thamrin 35 A Madiun, Telp : (0351) 456789 , www.wearneslib.com, perpus@wearneslib.com</p>

<table>
    <tr class="title">
        <td width="3%">#</td>
        <td width="10%">No Pinjam</td>
        <td width="15%">Tanggal Pinjam</td>
        <td width="15%">Tanggal Kembali</td>
        <td width="20%">No Induk Buku</td>
        <td width="20%">No Anggota</td>
        <td width="12%">Denda</td>
        
    </tr>
    @foreach($pinjam as $rspinjam)
    <tr>
        <td>{{ $rspinjam->kd_peminjaman }}</td>
        <td>{{ $rspinjam->no_pinjam }}</td>
        <td>{{ $rspinjam->tgl_pinjam }}</td>
        <td>{{ $rspinjam->tgl_kembali }}</td>
        <td>{{ $rspinjam->no_induk_buku}}</td>
        <td>{{ $rspinjam->no_anggota }}</td>
        <td>{{ $rspinjam->denda }}</td>
        
    </tr>    
    @endforeach
</table>
