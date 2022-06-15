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
    $this->Cell(110);
    // Titulo
    $this->Cell(70,10,'Reporte De Clientes',0,0,'C');
    // Fecha
    $this->SetFont('Arial','B',12);
    $this->Cell(85,10,"Fecha: ". date("d/m/Y"), 0, 1, "C");
    // Salto De Linea
    $this->Ln(15);

    $this->Cell(40, 10, 'Id', 1, 0, 'C', 0);
    $this->Cell(60, 10, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(60, 10, 'Apellido', 1, 0, 'C', 0);
    $this->Cell(60, 10, 'Telefono', 1, 0, 'C', 0);
    $this->Cell(60, 10, 'Direccion', 1, 1, 'C', 0);
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

require('../../conexion/conectar.php');
$consulta = "SELECT * FROM cliente";
$resultado = $con->query($consulta);

$pdf = new PDF("p", "mm", array(300, 300));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Arial","",12);

while($cliente = $resultado->fetch_assoc()){
    $pdf->Cell(40, 11, $cliente['idcliente_cliente'], 1, 0, 'C', 0);
    $pdf->Cell(60, 11, $cliente['nombre_cliente'], 1, 0, 'C', 0);
    $pdf->Cell(60, 11, $cliente['apellido_cliente'], 1, 0, 'C', 0);
    $pdf->Cell(60, 11, $cliente['telefono_cliente'], 1, 0, 'C', 0);
    $pdf->Cell(60, 11, $cliente['direccion_cliente'], 1, 1, 'C', 0);
}

$pdf->Output();


?>
