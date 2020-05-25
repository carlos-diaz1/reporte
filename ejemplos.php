<?php

require('fpdf/fpdf.php');
$fpdf = new FPDF();

//Este metodo es para agregar una pagina 
//ponemos portrait para que este vertical si es horizontal se pone LANDSCAPE 
//y ponemos el tamño de la pagina
$fpdf->AddPage('PORTRAIT','A4');

//Para definir la fuente
//Fuentes disponibles ["COURIER","HELVETICA","ARIAL","TIMES","ZAPDINGGATS"]
//Para darle estilo ["","B","I","U"]
//Luego el tamaño se asigna
$fpdf -> SetFont("times","B",16);

//Para dise;ar un color en RGB
$fpdf -> SetFillColor(255, 227, 163);

//Para agregar texto en una celda, se pone el ancho, alto, y el texto
//Se asigna el ancho, el alto, y el texto
//Si coloco 1 se crea una celda
//Con C me lo da centrado el texto y R para comenar en la izquierda L para la derecha
//True para relleanr
$fpdf ->Cell(100,10,"Hola Estudiante",1,0,"C",true);

//Para dar un salto de linea
//Podemos colocar 0 para que no deje espacio
$fpdf -> Ln();

//Para escribir, se le de el alto, mas el texto
$fpdf -> Write (10,"Esta linea ok");

//Aqui defino otro tipo de letra
$fpdf -> SetFont("COURIER","Bi",16);
$fpdf -> Ln();

//Se rellana asi.. ruta,posicion en x, posisicoin en y, alto, ancho,tipo, link
$fpdf -> Image('fpdf/img/logo.png',0,0,100,20,'png');


$fpdf -> Write (10,"Esta linea ok");

//Obtener el numero de pagina actual
// $fpdf->PageNo();

//Obtener Numero total de pagina
// $fpdf->AliasNbPages();

//Para que salga como PDF
//Si coloco D al comienzo me lo descargar el archivo
$fpdf->Output("D","Registros de Estudiantes.pdf");