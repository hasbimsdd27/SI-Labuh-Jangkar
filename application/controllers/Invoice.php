<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invoice extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }

    function view($id){
        $this->load->model('Db');
        $dataid = $this->input->post($id);
        $array = array(
            'uniqid' => $id,
        );
        $data = $this->Db->ambildata('tb_invoice', $array);
        $pdf = new FPDF('L','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // $pdf->Image(base_url('assets/img/logooo.png'),5,5,-150);
        $pdf->Image(base_url('assets/img/logooo.png'),20,6,15,0,'PNG');
        $pdf->Image(base_url('assets/img/jambi.png'),10,7,10,0,'PNG');
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,4,"DINAS PERHUBUNGAN",0,1,'R');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(190,4,"PROVINSI JAMBI",0,1,'R');
        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(190,4,"INVOICE",0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(190,5,"Invoice ini ditujukan kepada kapal berikut dibawah",0,1,'L');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(50,6,'Nomor Kapal',0,'L');
        $pdf->Cell(50,6,': '.$data->namakapal,0,'L');
        $pdf->Cell(50,6,'Document Number/Nomor Dokumen',0,'L');
        $pdf->Cell(50,6,': '.$data->nokapal,0,'L');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(50,6,'Nahkoda',0,'L');
        $pdf->Cell(50,6,': '.$data->nahkoda,0,'L');
        $pdf->Cell(50,6,'Tonase Kotor',0,'L');
        $pdf->Cell(50,6,': '.$data->gt.' ton',0,'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(70,6,'Tarif Per Ton/Kunjungan/Hari',1,0,'C');
        $pdf->Cell(50,6,'Lama Labuh Jangkar',1,0,'C');
        $pdf->Cell(40,6,'Gross Ton',1,0,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(30,6,'Total',1,1,'C');
        $pdf->Cell(70,6,"$data->currency $data->tarif",1,0,'C');
        $pdf->Cell(50,6,"$data->durasi",1,0,'C');
        $pdf->Cell(40,6,"$data->gt",1,0,'C');
        $pdf->Cell(30,6,"$data->pendapatan",1,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(160,6,'Total',1,0,'C');
        $pdf->Cell(30,6,"$data->currency $data->pendapatan",1,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(170,5,"Dengan diterbitkannya invoice ini, kapal yang bersangkutan diharuskan membayar jasa labuh",0,1,'L');
        $pdf->Cell(170,5,"kepada Dinas Perhubungan Provinsi Jambi",0,1,'L');
        $pdf->Output();
    }

}