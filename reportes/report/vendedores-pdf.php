<?php
    require('fpdf/fpdf.php');

    class PDF extends FPDF
{
// CABECERA DE PÁGINA
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Movernos A La Derecha
    $this->Cell(140);
    // Titulo
    $this->Cell(10,10,'Reporte De Vendedores',0,0,'C');
    // Fecha
    $this->SetFont('Arial','B',14);
    $this->Cell(208,10,"Fecha: ". date("d/m/Y"), 0, 1, "C");
    // Salto De Linea
    $this->Ln(15);

    $this->Cell(40, 13, 'Id', 1, 0, 'C', 0);
    $this->Cell(55, 13, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(60, 13, 'Apellido', 1, 0, 'C', 0);
    $this->Cell(65, 13, 'Direccion', 1, 0, 'C', 0);
    $this->Cell(55, 13, 'Telefono', 1, 1, 'C', 0);
}

// PIE DE PÁGINA
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require '../../conexion/conectar.php';
$consulta = "SELECT * FROM vendedor";
$resultado = $con->query($consulta);

$pdf = new PDF("p", "mm", array(300, 300));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Arial","",12);

while($vendedor = $resultado->fetch_assoc()){
    $pdf->Cell(40, 13, $vendedor['idvendedor_vendedor'], 1, 0, 'C', 0);
    $pdf->Cell(55, 13, $vendedor['nombre_vendedor'], 1, 0, 'C', 0);
    $pdf->Cell(60, 13, $vendedor['apellido_vendedor'], 1, 0, 'C', 0);
    $pdf->Cell(65, 13, $vendedor['direccion_vendedor'], 1, 0, 'C', 0);
    $pdf->Cell(55, 13, $vendedor['telefono_vendedor'], 1, 1, 'C', 0);
}
$pdf->Output();

?>
