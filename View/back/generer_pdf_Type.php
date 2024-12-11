<?php
require('D:\wamp64\www\Crud tache_Cours\View\pdf\fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$logo = 'D:\wamp64\www\Crud tache_Cours\View\front\assets\images\logo.png';
$pdf->Image($logo, 10, 10, 50);
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(0, 51, 102);
$pdf->Cell(0, 10, 'Liste des types de Cours', 0, 1, 'C');

$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, 'Date : ' . date('d/m/Y'), 0, 1, 'R');
$pdf->Ln(10);

$pdf->Ln(30);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(0, 102, 204);
$pdf->SetTextColor(255, 255, 255);

$col1_width = 40;
$col2_width = 60;

$pdf->Cell($col1_width, 10, 'Type', 1, 0, 'C', true);
$pdf->Cell($col2_width, 10, 'URL', 1, 1, 'C', true);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 12);

$pdf->Ln(2);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log('Erreur de connexion à la base de données : ' . $e->getMessage());
    exit('Erreur de connexion à la base de données.');
}

$sql = "SELECT COALESCE(Type, 'Non défini') AS Type, COALESCE(URL, 'Non défini') AS URL FROM Type";
$stmt = $pdo->query($sql);
$coursList = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($coursList)) {
    $pdf->Cell(0, 10, 'Aucun cours trouvé.', 1, 1, 'C');
} else {
    foreach ($coursList as $cours) {
        $pdf->Cell($col1_width, 10, htmlspecialchars($cours['Type']), 1, 0, 'C');
        $pdf->Cell($col2_width, 10, htmlspecialchars($cours['URL']), 1, 1, 'C');
    }
}

$pdf->Output('Type_cours_list.pdf', 'I');
?>
