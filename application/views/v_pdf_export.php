<?php
    $image1 = base_url()."assets/img/icon_main.png";

    $fpdf = new FPDF('P','mm','A4');
    $fpdf->SetTitle('Rekap Souvenir - ', 'isUTF8');
    $fpdf->SetAuthor("Admin", 'isUTF8');
    $fpdf->SetCreator('Admin', 'isUTF8');
    $fpdf->SetMargins(10,32,10,0);
    $fpdf->SetAutoPageBreak(true, 28);
    $fpdf->AddPage();
    $fpdf->Image($image1, 156, 4, 44, 43);
    $fpdf->SetFont('Arial', '',11);
    $fpdf->Cell(190,7,'REKAP DATA SOUVENIR',0,1,'C');
    $fpdf->Ln();
    $fpdf->Ln();
    $fpdf->Ln();
    $fpdf->SetFillColor(255,255,153);
    $fpdf->SetDrawColor(128,128,128);
    $fpdf->Cell(30, 8, 'ID Souvenir.', 1, 0, 'C', true);
    $fpdf->Cell(45, 8, 'Nama Souvenir', 1, 0, 'C', true);
    $fpdf->Cell(11, 8, 'Stok', 1, 0, 'C', true);
    $fpdf->Cell(30, 8, 'Harga', 1, 0, 'C', true);
    $fpdf->Cell(27, 8, 'Berat', 1, 0, 'C', true);
    $fpdf->Cell(47, 8, 'Keterangan', 1, 0, 'C', true);
    $fpdf->Ln();
    $fpdf->SetFillColor(255,255,255);
    $fpdf->SetDrawColor(128,128,128);
    $fpdf->SetFont('Arial', '',10);

    foreach($souvenir as $row){
        $fpdf->Cell(30, 8, $row['id_barang'], 1, 0, 'C', true);
        $fpdf->Cell(45, 8, $row['nama_barang'], 1, 0, 'C', true);
        $fpdf->Cell(11, 8, $row['stok'], 1, 0, 'C', true);
        $fpdf->Cell(30, 8, 'Rp. '.number_format($row['harga'], 0, ',', '.'), 1, 0, 'C', true);
        $fpdf->Cell(27, 8, $row['berat'].' gram', 1, 0, 'C', true);
        $fpdf->Cell(47, 8, $row['keterangan'], 1, 0, 'C', true);
        $fpdf->Ln();
    }


    
    $fpdf->Output('Export.pdf', 'I');
?>