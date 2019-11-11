<?php

session_start(['name' => 'NSW']);

if(isset($_SESSION['nivel'])){

    if($_SESSION['nivel']==1){

        require('views/assets/fpdf/fpdf.php');

        class PDF extends FPDF{
            // Cabecera de página
            function Header(){
                $this->Image('views/img/icono1.jpg',15,8,33);
                $this->Image('views/img/icono2.jpg',170,8,18);
                // Arial bold 15
                $this->SetFont('Arial', 'I', 10);
                $this->Cell(65);
                $this->Cell(50, 4, 'Nombre de la empresa', 0, 1, 'C');
                $this->Cell(65);
                $this->Cell(50, 4, 'RIF', 0, 1, 'L');
                $this->Cell(65);
                $this->Cell(50, 4, 'Teléfono', 0, 1, 'L');
                $this->Cell(65);
                $this->Cell(50, 4, 'Dirección', 0, 1, 'L');
                $this->Cell(65);
                $this->Cell(50, 4, 'email', 0, 1, 'L');

                $this->Ln();
                $this->Ln();
                $this->Ln();

                // Cabecera de la tabla
                $this->SetFont('Arial','B',10);
                $this->Cell(32, 10, 'Reporte de usuarios:', 0, 0, 'C', 0);
                $this->Ln();
                $this->Cell(15,10,'N°',1,0,'C',0);
                $this->Cell(25,10,'Usuario',1,0,'C',0);
                $this->Cell(70,10,'Nombres',1,0,'C',0);
                $this->Cell(20,10,'Rol',1,0,'C',0);
                $this->Cell(20,10,'Estatus',1,0,'C',0);
                $this->Cell(35,10,'Fecha de registro',1,1,'C',0);
            }

            // Pie de página
            function Footer(){
                // Posición:a 1,5 cm del final
                $this->SetY(-20);
                // Arial italic 8
                $this->SetFont('Arial', 'B', 8);
                // Título footer
                $this->MultiCell(190, 5, 'Nombre de la empresa - lema de la empresa', 0, 'J');
                // Número de página
                $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        $fecha = date("d-m-Y");

        // Creación del objeto de la clase heredada
        $pdf = new PDF(); //'L','mm','A4'
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);

        require_once './controllers/ajaxController.php';
        $datos = new ajaxController();
        $registros = $datos->reportepdf_controller();

        $nro = 0;

        foreach ($registros as $value) { $nro++;
            $pdf->Cell(15, 10, $nro, 1, 0, 'C', 0);
            $pdf->Cell(25,10,$value['civ'],1,0,'C',0);
            $pdf->Cell(70,10,$value[1],1,0,'C',0);
            $pdf->Cell(20,10,$value[2],1,0,'C',0);
            $pdf->Cell(20,10,$value[3],1,0,'C',0);
            $pdf->Cell(35,10,str_replace('-', '/', date('d-m-Y', strtotime($value[4]))),1,1,'C',0);
        }

        $pdf->Output();

    }

}else{

    header('Location: 404');
    
}