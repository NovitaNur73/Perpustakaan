<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\MAnggota;
use App\MBuku;
use App\MKoleksi;
use App\MRak;
use App\MKategori;

class ReportControl extends Controller
{
    //
    function rpt_anggota(){
        
        $anggota = MAnggota::all();
        $content = view('report.rpt_anggota',compact('anggota'));

        $pdf = new Mpdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Anggota.pdf','I');

        // Output Function :
        // I: send the file inline to the browse (View)
        // D: send to the browser and force a file download with the name given by name.
        // F: save to a local file with the name given by name (may include a path).
        // S: return the document as a string.
    }

    function rpt_QRCode_Anggota(){
        $anggota = MAnggota::all();
        $content = view('report.rpt_qrcode_anggota', compact('anggota'));
        $pdf = new Mpdf([
            'orientation' => "L",
            'format'      => "Folio"
        ]);
        $pdf->WriteHTML($content);
        $pdf->Output(public_path()."/Laporan QR Code anggota.pdf","I");
    }

    function rpt_kartu_anggota($id_anggota){
        $anggota = Manggota::where('id_anggota',$id_anggota)->first();
        $cetak = view('report.rpt_kartu_anggota',compact('anggota'));
        $pdf = new Mpdf([
            'orientation' => "L",
            'format'      => "A6"
        ]);
        $pdf->WriteHTML($cetak);
        $pdf->Output(public_path()."/Kartu QR Code anggota.pdf","I");
    }
    function rpt_buku(){
        $buku = MBuku::all();
        $content = view('report.rpt_buku',compact('buku'));
        $pdf = new Mpdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);
        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku.pdf','I');
    }

    function rpt_buku_dipinjam(){
        $buku = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_buku.ISBN,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.id_kategori=tb_kategori.id_kategori and tb_buku.id_buku=tb_koleksi_buku.id_buku and tb_koleksi_buku.id_rak=tb_rak.id_rak and status = 1');
        $content = view('report.rpt_buku_dipinjam',compact('buku'));
        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);
        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku Dipinjam.pdf','I');
    }
    
    function rpt_buku_hilang(){
        $buku = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_buku.ISBN,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.id_kategori=tb_kategori.id_kategori and tb_buku.id_buku=tb_koleksi_buku.id_buku and tb_koleksi_buku.id_rak=tb_rak.id_rak and status = 3');
        $content = view('report.rpt_buku_hilang',compact('buku'));
        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);
        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku Hilang.pdf','I');
    }
    
    function rpt_buku_rusak(){
        $buku = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_buku.ISBN,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.id_kategori=tb_kategori.id_kategori and tb_buku.id_buku=tb_koleksi_buku.id_buku and tb_koleksi_buku.id_rak=tb_rak.id_rak and status = 2');
        $content = view('report.rpt_buku_rusak',compact('buku'));
        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);
        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku Rusak.pdf','I');
    }
    
    function rpt_buku_tersedia(){
        $buku = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_buku.ISBN,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.id_kategori=tb_kategori.id_kategori and tb_buku.id_buku=tb_koleksi_buku.id_buku and tb_koleksi_buku.id_rak=tb_rak.id_rak and status = 0');
        $content = view('report.rpt_buku_tersedia',compact('buku'));
        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);
        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku Tersedia.pdf','I');
    }


    function rpt_QRCode_Buku(){
        
        $buku = MKoleksi::all();
        $content = view('report.rpt_qrcode_buku',compact('buku'));

        $pdf = new Mpdf([
            'orientation'=>"P",
            'format'=>"Folio"
            // P => Portait
            // L => Landscape
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan QR Code Buku.pdf','I');
    }
}

