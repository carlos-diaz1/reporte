<?php
require('fpdf/fpdf.php');
$fpdf = new FPDF();
$fpdf -> Addpage('PORTRAIT','A4');

class pdf extends FPDF
{
    public function header()
    {
        $this->SetFont('TIMES','B','10');
        //$this -> setX(160);
        //$this->Write(5,"Colegio Agustiniano");
        $this -> Image('fpdf/img/logo.png',120,15,55.5,18,'png');
        $this->SetFont('Courier','B',16);
        $this->SetY(15);
        $this->Cell(0,5,"REPORTE DE ESTUDIANTES",0,0,"");
        $this->SetFont('Courier','B',14);
        $this->Ln();$this->Ln();
        $this->Cell(30,5,"Materia:");
        $this->SetFont('Courier','',14);$this->Cell(20,5,"Sociologia");$this->SetFont('Courier','B',14);$this->Ln();
        $this->Cell(30,5,"Profesor:",0,0,"");
        $this->SetFont('Courier','',14);$this->Cell(20,5,"Pedro Adames");$this->SetFont('Courier','B',14);$this->Ln();
        $this->Cell(30,5,"Curso:",0,0,"");
        $this->SetFont('Courier','',14);$this->Cell(20,5,"J-145");$this->SetFont('Courier','B',14);$this->Ln(10);
        $this->SetFont('Arial','B',12);
        
        //Asiganar color a el bolder
        $this->SetDrawColor(13, 87, 224);

        $this->cell(35,7,'Matricula: ',0,0,'C');
        $this->cell(60,7,'Nombre: ',0,0,'C');
        $this->cell(60,7,'Apellido: ',0,0,'C');
        $this->cell(20,7,'Sexo: ',0,0,'C'); 
        
        //Asignar borde  a la linea
        $this->SetLineWidth(2);
        
        //Asiganar una linea
        $this->Line(15,55,185,55);
        $this->Ln(15);  
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
//$fpdf->SetTextColor(45,47,250);
//Asignaar color a la celda
$fpdf->SetFillColor(255, 255, 255);

//Asiganar color a el bolder
$fpdf->SetDrawColor(255, 179, 0);

$fpdf->SetFont('Arial','',12);
$fpdf->SetLineWidth(0.10);
$fpdf->SetFillColor(235, 242, 255);
$fpdf->SetDrawColor(0,0,0);

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