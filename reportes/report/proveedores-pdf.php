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
    $this->Cell(85);
    // Titulo
    $this->Cell(10,10,'Reporte De Proveedores',0,0,'C');
    // Fecha
    $this->SetFont('Arial','B',13);
    $this->Cell(130,10,"Fecha: ". date("d/m/Y"), 0, 1, "C");
    // Salto De Linea
    $this->Ln(15);

    $this->Cell(40, 10, 'Id', 1, 0, 'C', 0);
    $this->Cell(45, 10, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(45, 10, 'Apellido', 1, 0, 'C', 0);
    $this->Cell(50, 10, 'Telefono', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM proveedor";
$resultado = $con->query($consulta);

$pdf = new PDF("p", "mm", array(200, 200));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Arial","",12);

while($proveedor = $resultado->fetch_assoc()){
    $pdf->Cell(40, 13, $proveedor['idproveedor_proveedor'], 1, 0, 'C', 0);
    $pdf->Cell(45, 13, $proveedor['nombre_proveedor'], 1, 0, 'C', 0);
    $pdf->Cell(45, 13, $proveedor['apellido_proveedor'], 1, 0, 'C', 0);
    $pdf->Cell(50, 13, $proveedor['telefono_proveedor'], 1, 1, 'C', 0);
}
$pdf->Output();


?>
