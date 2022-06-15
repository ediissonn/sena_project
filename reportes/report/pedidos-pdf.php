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
    $this->Cell(70,10,'Reporte De Pedidos',0,0,'C');
    // Fecha
    $this->SetFont('Arial','B',12);
    $this->Cell(85,10,"Fecha: ". date("d/m/Y"), 0, 1, "C");
    // Salto De Linea
    $this->Ln(15);

    $this->Cell(40, 10, 'Id', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Direccion', 1, 0, 'C', 0);
    $this->Cell(50, 10, 'Fecha', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Estado', 1, 0, 'C', 0);
    $this->Cell(35, 10, 'ID_Cliente', 1, 0, 'C', 0);
    $this->Cell(35, 10, 'ID_Vendedor', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM pedidos";
$resultado = $con->query($consulta);

$pdf = new PDF("p", "mm", array(300, 300));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Arial","",12);

while($pedido = $resultado->fetch_assoc()){
    $pdf->Cell(40, 13, $pedido['idpedidos_pedidos'], 1, 0, 'C', 0);
    $pdf->Cell(40, 13, $pedido['nombre_pedidos'], 1, 0, 'C', 0);
    $pdf->Cell(40, 13, $pedido['direccion_pedidos'], 1, 0, 'C', 0);
    $pdf->Cell(50, 13, $pedido['fecha_pedidos'], 1, 0, 'C', 0);
    $pdf->Cell(40, 13, $pedido['estado_pedidos'], 1, 0, 'C', 0);
    $pdf->Cell(35, 13, $pedido['idcliente_cliente'], 1, 0, 'C', 0);
    $pdf->Cell(35, 13, $pedido['idvendedor_vendedor'], 1, 1, 'C', 0);
}
$pdf->Output();


?>
