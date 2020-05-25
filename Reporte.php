<?php

require('fpdf/fpdf.php');
$fpdf = new FPDF();
$fpdf -> Addpage('PORTRAIT','A4');

class pdf extends FPDF
{
    public function header()
    {
        $this->SetFont('TIMES','B','10');
        $this -> setX(160);
        //$this->Write(5,"Colegio Agustiniano");
        $this -> Image('fpdf/img/logo.png',150,5,55.5,18,'png');
    }

    public function footer()
    {
        $this ->SetFont('TIMES','B','10');
        $this ->setY(-15);
        $this ->Write(5,'La Vega, Republica Dominicana');
        //$this -> Image('fpdf/img/bandera.png',185,275,20,20,'png',"");
        $this->Setx(-30);
        $this->AliasNbPages('tpaginas');
        $this->Write(5,$this->PageNo().'/tpaginas');
        
    }
}

$fpdf = new pdf();


$fpdf->AddPage();
$fpdf->SetFont('Courier','B',16);
$fpdf->SetY(25);
$fpdf->Cell(0,5,"REPORTE DE ESTUDIANTES",0,0,"C");

//$fpdf->SetTextColor(45,47,250);
$fpdf->SetFont('Courier','B',14);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(30,5,"Materia:");
$fpdf->SetFont('Courier','',14);$fpdf->Cell(20,5,"Sociologia");$fpdf->SetFont('Courier','B',14);$fpdf->Ln();
$fpdf->Cell(30,5,"Profesor:",0,0,"");
$fpdf->SetFont('Courier','',14);$fpdf->Cell(20,5,"Pedro Adames");$fpdf->SetFont('Courier','B',14);$fpdf->Ln();
$fpdf->Cell(30,5,"Curso:",0,0,"");
$fpdf->SetFont('Courier','',14);$fpdf->Cell(20,5,"J-145");$fpdf->SetFont('Courier','B',14);$fpdf->Ln(10);
$fpdf->SetFont('Arial','B',12);
//Asignaar color a la celda
$fpdf->SetFillColor(255, 255, 255);

//Asiganar color a el bolder
$fpdf->SetDrawColor(255, 179, 0);


//Asignar Color
//$fpdf->SetTextColor(143, 139, 129);

$fpdf->cell(35,7,'Matricula: ',0,0,'C',True);
$fpdf->cell(60,7,'Nombre: ',0,0,'C',TRUE);
$fpdf->cell(60,7,'Apellido: ',0,0,'C',TRUE);
$fpdf->cell(20,7,'Sexo: ',0,0,'C',TRUE);

//Asignar borde  a la linea
$fpdf->SetLineWidth(1);

//Asiganar una linea
$fpdf->Line(15,65,190,65);
$fpdf->Ln(15);
$fpdf->SetFont('Arial','',12);
$fpdf->SetLineWidth(0);
$fpdf->SetFillColor(230, 230, 230);
$fpdf->SetDrawColor(255, 255, 255);



require 'cn.php';
$consulta="SELECT * FROM estudiantes";
$resultado=$mysqli->query($consulta);

while($row=$resultado->fetch_assoc()){
    $fpdf->cell(35,10,$row['matricula'],1,0,'C',True);
    $fpdf->cell(60,10,$row['nombre'],1,0,'C',TRUE);
    $fpdf->cell(60,10,$row['apellido'],1,0,'C',TRUE);
    $fpdf->cell(20,10,$row['sexo'],1,0,'C',TRUE);
    $fpdf->Ln();
}



$fpdf->Output("","Registros de Estudiantes.pdf");