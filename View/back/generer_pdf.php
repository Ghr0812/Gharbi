<?php
require('D:\wamp64\www\Crud tache_Cours\View\pdf\fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$logo = 'D:\wamp64\www\Crud tache_Cours\View\front\assets\images\logo.png';
$pdf->Image($logo, 10, 10, 50);

$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(0, 51, 102);
$pdf->Cell(0, 10, 'Liste des Cours', 0, 1, 'C');

$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, 'Date : ' . date('d/m/Y'), 0, 1, 'R');
$pdf->Ln(10);

$pdf->Ln(30);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(0, 102, 204);
$pdf->SetTextColor(255, 255, 255);

$col1_width = 40;
$col2_width = 60;
$col3_width = 30;
$col4_width = 30;

$pdf->Cell($col1_width, 10, 'Titre', 1, 0, 'C', true);
$pdf->Cell($col2_width, 10, 'Description', 1, 0, 'C', true);
$pdf->Cell($col3_width, 10, 'Date de Creation', 1, 0, 'C', true);
$pdf->Cell($col4_width, 10, 'Type', 1, 1, 'C', true);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 12);

$pdf->Ln(2);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'La connexion à la base de données a échoué: ' . $e->getMessage();
    exit;
}

$sql = "SELECT Titre, Description, Date_Creation, id_type FROM Cours";
$stmt = $pdo->query($sql);
$coursList = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($coursList as $cours) {
    $pdf->SetFillColor(242, 242, 242);
    $pdf->Cell($col1_width, 10, htmlspecialchars($cours['Titre']), 1, 0, 'C', true);
    $pdf->Cell($col2_width, 10, htmlspecialchars($cours['Description']), 1, 0, 'C', true);
    $pdf->Cell($col3_width, 10, htmlspecialchars($cours['Date_Creation']), 1, 0, 'C', true);
    $pdf->Cell($col4_width, 10, ($cours['id_type'] == 1 ? 'Vidéo' : 'Document'), 1, 1, 'C', true);
}

$pdf->Output('cours_list.pdf', 'I');
?>
