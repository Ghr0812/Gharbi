<?php

include 'D:/wamp64/www/Crud tache_Cours/config.php';
include 'D:/wamp64/www/Crud tache_Cours/Controlleur/TypeC.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'La connexion à la base de données a échoué: ' . $e->getMessage();
    exit;
}

$typeC = new TypeC($pdo);

$typeList = $typeC->afficherTypes();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['motCle'])) {
    $motCle = trim($_POST['motCle']);

    $typeList = $typeC->rechercherTypes($motCle);

    // Construisez le message pour l'alerte JavaScript
    if (empty($typeList)) {
        echo "<script>alert('Aucun résultat trouvé pour \"$motCle\".');</script>";
    } else {
        $resultMessage = "Résultats trouvés pour \"$motCle\" :\\n";
        foreach ($typeList as $type) {
            $resultMessage .= "Type: " . addslashes($type['type']) . ", URL: " . addslashes($type['url']) . "\\n";
        }
        echo "<script>alert('$resultMessage');</script>";
    }
    // Récupérer les données pour le tri
    $critere = isset($_POST['critere']) ? $_POST['critere'] : 'type';
    $ordre = isset($_POST['ordre']) && $_POST['ordre'] === 'DESC' ? 'DESC' : 'ASC';

    try {
        $typeList = $typeC->trierTypes($critere, $ordre);
    } catch (Exception $e) {
        echo "<script>alert('Erreur lors du tri : " . addslashes($e->getMessage()) . "');</script>";
    }
    /*$limit = 2; // Nombre d'éléments par page
    $page = 1; // Page actuelle

    $totalCours = $typeC->compterTotalTypes(); // Nombre total de types
    $totalPages = ceil($totalCours / $limit);
// Get current page from the query string (if available)
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = (int)$_GET['page'];
        if ($page < 1) $page = 1; // Prevent invalid page numbers
        if ($page > $totalPages) $page = $totalPages; // Prevent exceeding total pages
    }

// Calculate the offset for the current page
    $offset = ($page - 1) * $limit;

// Fetch paginated data
    $typeList = $typeC->afficherTypesAvecPagination($offset, $limit);*/

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Types de Cours</title>
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fa-sharp fa-solid fa-shield-halved"></i>
                        </span>
                        <span class="title brand">SkySchool</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard.html">
                        <span class="icon">
                            <i class="fa-solid fa-gauge"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="crud_tableCours.php">
                        <span class="icon">
                            <i class="fas fa-duotone fa-book"></i>
                        </span>
                        <span class="title">Gestion des Cours</span>
                    </a>
                </li>

                <li>
                    <a href="crud_tableType.php">
                        <span class="icon">
                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                        </span>
                        <span class="title">Gestion des type de Cours</span>
                    </a>
                </li>
                <li>
                    <a href="classes.html">
                        <span class="icon">
                            <i class="fas fa-duotone fa-person-chalkboard"></i>
                        </span>
                        <span class="title">My Classes</span>
                    </a>
                </li>

                <li>
                    <a href="attendence.html">
                        <span class="icon">
                            <i class="fa-solid fa-clipboard-user"></i>
                        </span>
                        <span class="title">Attendence</span>
                    </a>
                </li>
                <li>
                    <a href="results.html">
                        <span class="icon">
                            <i class="fa-solid fa-square-poll-vertical"></i>
                        </span>
                        <span class="title">Results</span>
                    </a>
                </li>

                <li>
                    <a href="fee.html">
                        <span class="icon">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </span>
                        <span class="title">Fee</span>
                    </a>
                </li>

                <li>
                    <a href="login.html">
                        <span class="icon">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>

        <button class="add-course-btn" onclick="window.location.href='ajouter_form.php'" style="color: blue; margin-left: 450px;margin-right: 450px;">
            <i class="fas fa-plus" style="color: green"></i> Ajouter un Type de Cours
        </button>
    <form method="POST" action="">
        <input type="text" name="motCle" placeholder="Rechercher un type de cours" style="margin-left: 550px;">
        <button type="submit" style="padding: 10px 20px; font-size: 16px;"><i class="fa fa-search"></i>Rechercher</button>

        <select name="critere" style="padding: 8px;border-radius: 5px;border: 1px solid #ccc;margin-left: 550px;">
            <option value="type" <?= (isset($_POST['critere']) && $_POST['critere'] == 'type') ? 'selected' : '' ?>>Type</option>
            <option value="url" <?= (isset($_POST['critere']) && $_POST['critere'] == 'url') ? 'selected' : '' ?>>URL</option>
        </select>
        <input type="hidden" name="ordre" value="<?= (isset($_POST['ordre']) && $_POST['ordre'] === 'ASC') ? 'DESC' : 'ASC' ?>">
        <button type="submit" style="padding: 8px 15px; background-color: blue; color: white; border-radius: 5px; cursor: pointer;">
            <i class="fa fa-sort"></i> Trier
        </button>
        <button onclick="window.open('generer_pdf_Type.php', '_blank');"
                style="background-color: green; color: white; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">
            <i class="fa fa-file-pdf"></i> Générer PDF
        </button>

    </form>



    </div>

    <table border="1" style="margin-left: 300px;">
        <thead>
            <tr>
                <th>Type</th>
                <th>URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
<?php
if (isset($typeList) && is_array($typeList)) {
    foreach ($typeList as $type) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($type['type'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($type['url'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>
            <button onclick=\"window.location.href='modifier_type.php?id=" . urlencode($type['id_type']) . "';\">
                <i class=\"fa fa-edit\" style=\"color:blue;\"></i>
            </button>
            <button onclick=\"if(confirm('Êtes-vous sûr de vouloir supprimer ce type ?')) 
                window.location.href='suppression_type.php?id=" . urlencode($type['id_type']) . "';\">
                <i class=\"fa fa-trash\" style=\"color:red;\"></i>
            </button>
            <button onclick=\"window.location.href='afficher_type.php?id=" . urlencode($type['id_type']) . "';\">
                <i class=\"fa fa-eye\" style=\"color:forestgreen;\"></i>
            </button>
        </td>";
        echo "</tr>";
    }
}
?>
</tbody>

    </table>
    <!--<nav style="margin-top: 20px; text-align: center;">
        <ul style="list-style: none; display: inline-flex; padding: 0;">
            <?php if ($page > 1): ?>
                <li style="margin-right: 5px;">
                    <a href="?page=<?= $page - 1 ?>"
                       style="padding: 8px 12px; border: 1px solid #ccc; text-decoration: none; color: #007bff;">&laquo; Précédent</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li style="margin-right: 5px;">
                    <a href="?page=<?= $i ?>"
                       style="padding: 8px 12px;
                               border: 1px solid <?= $i == $page ? '#007bff' : '#ccc' ?>;
                               background-color: <?= $i == $page ? '#007bff' : '#fff' ?>;
                               color: <?= $i == $page ? '#fff' : '#007bff' ?>;
                               text-decoration: none;">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li>
                    <a href="?page=<?= $page + 1 ?>"
                       style="padding: 8px 12px; border: 1px solid #ccc; text-decoration: none; color: #007bff;">Suivant &raquo;</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>-->



    <div style="text-align: center; margin-top: 20px;">
        <a href="mailto:hedi11111111t@gmail.com?subject=Demande%20d'information&body=Bonjour,%20je%20souhaite%20plus%20d'informations%20sur%20le%20type%20de%20cours."
           style="text-decoration: none;">
            <button>
                <i class="fa fa-envelope" style="color:green;"></i> Contacter par Email
            </button>
        </a>
    </div>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;

        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transform: scale(1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        thead {
            color: linear-gradient(-145deg, rgba(246, 191, 260, 1) 0%, rgba(120, 200, 200, 1) 100%) !important;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.25);
        }

        th, td {
            padding: 12px 20px;
            text-align: center;
            font-size: 14px;
            letter-spacing: 1px;
        }

        th {
            font-weight: 700;
            text-transform: uppercase;
            background-image: linear-gradient(0deg, rgba(246, 191, 260, 1) 0%, rgba(120, 200, 200, 1) 100%) !important;
        }

        td {
            font-size: 14px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f3f3f3;
        }

        tr:hover {
            background-color: #ffecf1;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
        }

        button {
            background: #fff;
            border: 2px solid #ddd;
            border-radius: 50px;
            padding: 12px 18px;
            cursor: pointer;
            margin: 6px;
            font-size: 16px;
            font-weight: 600;
            color: #333;
            text-transform: uppercase;
            position: relative;
            transition: all 0.5s ease-in-out, transform 0.3s ease;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
        }

        button:hover {
            background-color: #9c27b0;
            color: #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transform: translateY(-6px);
        }

        button:active {
            transform: translateY(2px);
        }

        button i {
            font-size: 20px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        button i.fa-edit {
            color: #ff4b5c;
        }

        button i.fa-trash {
            color: #f44336;
        }

        button i.fa-eye {
            color: #4caf50;
        }

        button:hover i {
            transform: scale(1.4);
        }

        button:hover {
            box-shadow: 0 0 25px rgba(156, 39, 176, 0.8);
        }

        @media (max-width: 768px) {
            table {
                width: 90%;
            }

            th, td {
                padding: 10px 15px;
                font-size: 12px;
            }

            button {
                padding: 10px 15px;
                font-size: 14px;
            }

            i {
                font-size: 18px;
            }
        }
    </style>
</body>
</html>
