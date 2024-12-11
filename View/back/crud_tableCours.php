<?php

include 'D:/wamp64/www/Crud Tache_Cours/Controlleur/CoursC.php';


try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'La connexion à la base de données a échoué: ' . $e->getMessage();
    exit;
}

$coursC = new CoursC($pdo);
$coursList = $coursC->afficherCours();


if (isset($_GET['recherche']) && !empty(trim($_GET['recherche']))) {
    $motCle = htmlspecialchars($_GET['recherche']); // Sécuriser le mot-clé

    $resultats = $coursC->rechercherCours($motCle);
    echo "</div>";

if (!empty($resultats)) {
    $message = "Résultats pour '$motCle':\\n";
    foreach ($resultats as $cours) {
        $titre = str_replace(["'", "\"", "\\"], ["\\'", "\\\"", "\\\\"], $cours['Titre']);
        $description = str_replace(["'", "\"", "\\"], ["\\'", "\\\"", "\\\\"], $cours['Description']);
        $message .= $titre . " - " . $description . "\\n";
    }
    $message = htmlspecialchars($message, ENT_QUOTES);

    echo "<script>alert('$message');</script>";
} else {
    echo "<script>alert('Aucun cours trouvé pour \"$motCle\".');</script>";
}
}


$critere = isset($_GET['critere']) ? $_GET['critere'] : 'Titre';
$ordre = isset($_GET['ordre']) && $_GET['ordre'] === 'DESC' ? 'DESC' : 'ASC';

$coursList = $coursC->trierCours($critere, $ordre);

$limit = 4;

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

$coursList = $coursC->afficherCoursAvecPagination($page, $limit);

$totalCours = $coursC->compterTotalCours();
$totalPages = ceil($totalCours / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="assets/js/Controle_Saisi.js"></script>

</head>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="C:/Users/gharb/Desktop/School_Management_System_Dashboard-main/assets/imgs/logo.png">
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
                </li>                <li>
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
        <button class="add-course-btn" onclick="window.location.href='enroll.php'" style="
    margin-left: 450px;
    margin-right: 450px;
">
            <i class="fa fa-plus" style="color: green;" ></i> Ajouter un cours
        </button>
        
        <form method="GET" action="" style="margin: 20px;">
    
    <select name="critere" style="padding: 8px;border-radius: 5px;border: 1px solid #ccc;margin-left: 550px;">
        <option value="Titre" <?= (isset($_GET['critere']) && $_GET['critere'] == 'Titre') ? 'selected' : '' ?>>Titre</option>
        <option value="Date_Creation" <?= (isset($_GET['critere']) && $_GET['critere'] == 'Date_Creation') ? 'selected' : '' ?>>Date de Création</option>
        <option value="id_type" <?= (isset($_GET['critere']) && $_GET['critere'] == 'id_type') ? 'selected' : '' ?>>Type</option>
    </select>
    <input type="hidden" name="ordre" value="<?= (isset($_GET['ordre']) && $_GET['ordre'] === 'ASC') ? 'DESC' : 'ASC' ?>">
    <button type="submit" style="padding: 8px 15px; background-color: blue; color: white; border-radius: 5px; cursor: pointer;">
        <i class="fa fa-sort"></i>
    <button onclick="window.open('generer_pdf.php', '_blank');" 
        style="background-color: green; color: white; padding: 8px 15px; border: none; border-radius: 5px; cursor: pointer; font-size: 14px;">
    <i class="fa fa-file-pdf"></i> Générer PDF
    </button>


    <input type="text" name="recherche" placeholder="Rechercher un cours..." 
        value="<?= isset($_GET['recherche']) ? htmlspecialchars($_GET['recherche']) : '' ?>" 
        style="padding: 8px; width: 200px; border: 1px solid #ccc; border-radius: 5px;">
    <button type="submit" style="padding: 8px 15px; border: none; background-color: blue; color: white; border-radius: 5px; cursor: pointer;">
        <i class="fa fa-search"></i> Rechercher
    </button>
    
</form>



        <table style="margin-left: 450px;">
        <thead>
            <tr>
                <th>titre</th>
                <th>description</th>
                <th>Date_Creation</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
if (isset($coursList) && is_array($coursList)) {
    foreach ($coursList as $cours) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($cours['Titre']) . "</td>";
        echo "<td>" . htmlspecialchars($cours['Description']) . "</td>";
        echo "<td>" . htmlspecialchars($cours['Date_Creation']) . "</td>";
        echo "<td>" . ($cours['id_type'] == 1 ? 'Video' : 'Document') . "</td>";
        echo "<td>
        <button onclick=\"window.location.href = 'modifier.php?id=" . $cours['id_cours'] . "';\"><i class=\"fa fa-edit\" style=\"color:blue;\"></i></button>
        <button onclick=\"window.location.href = 'suppression.php?id=" . $cours['id_cours'] . "';\"><i class=\"fa fa-trash\" style=\"color:red;\"></i></button>
        <button onclick=\"window.location.href = 'afficher.php?id=" . $cours['id_cours'] . "';\"><i class=\"fa fa-eye\" style=\"color:forestgreen;\"></i></button>
      
      
      
      </td>";


        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Aucun cours trouvé</td></tr>";
}
?>
        </tbody>
    </table>
    <!--
    Pagination-->
    <nav style="margin-top: 10px; text-align: center;">
        <ul style="list-style: none; display: inline-flex; padding: 0;">
        <?php if ($page > 1): ?>
            <li style="margin-right: 5px;">
                <a href="?page=<?= $page - 1 ?>" style="padding: 8px 12px; border: 1px solid #ccc; text-decoration: none; color: #007bff;">&laquo; Précédent</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li style="margin-right: 5px;">
                <a href="?page=<?= $i ?>" style="padding: 8px 12px; border: 1px solid <?= $i == $page ? '#007bff' : '#ccc' ?>; background-color: <?= $i == $page ? '#007bff' : '#fff' ?>; color: <?= $i == $page ? '#fff' : '#007bff' ?>; text-decoration: none;"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <li>
                <a href="?page=<?= $page + 1 ?>" style="padding: 8px 12px; border: 1px solid #ccc; text-decoration: none; color: #007bff;">Suivant &raquo;</a>
            </li>
        <?php endif; ?>
        </ul>
    </nav>
    <div style="text-align: center; margin-top: 20px;">
        <a href="mail.php">
            <button style="padding: 10px 20px; font-size: 16px; cursor: pointer;">
                <i class="fa fa-envelope" style="color:green; margin-right: 5px;"></i> Contacter par Email
            </button>
        </a>
        <button 
            onclick="window.open('https://fr.mail.yahoo.com/d/folders/1?reason=onboarded', '_blank')" 
            style="padding: 10px 20px; font-size: 16px; cursor: pointer;">
            <i class="fa fa-envelope" style="color:green; margin-right: 5px;"></i> Ouvrir Yahoo Mail
        </button>
    </div>
<div id="notification-container"></div>

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
    #notification-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Notification générale */
.notification {
    display: flex;
    align-items: center;
    background: linear-gradient(145deg, #f3f4f6, #ffffff);
    color: #333;
    padding: 20px 25px;
    border-radius: 15px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2), inset 0 -2px 5px rgba(255, 255, 255, 0.4);
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: bold;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.5s ease-in-out;
    animation: slide-in-premium 0.6s ease-out, fade-out-premium 0.5s ease-in 4s forwards;
}

/* Variantes */
.notification.success {
    background: linear-gradient(135deg, #23c4ed, #0a74da);
    color: white;
}

.notification.error {
    background: linear-gradient(135deg, #f05454, #d90429);
    color: white;
}

/* Icône premium */
.notification i {
    font-size: 22px;
    margin-right: 15px;
    color: rgba(255, 255, 255, 0.8);
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

.notification:hover i {
    transform: scale(1.2);
}

/* Animation gradient mouvant */
.notification::before {
    content: '';
    position: absolute;
    top: 0;
    left: -150%;
    width: 300%;
    height: 300%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent 70%);
    animation: light-glow 2.5s infinite linear;
    z-index: 0;
    pointer-events: none;
}

.notification:hover {
    transform: scale(1.03);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

/* Animation d'entrée */
@keyframes slide-in-premium {
    from {
        transform: translateX(150%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Animation d'effacement */
@keyframes fade-out-premium {
    to {
        opacity: 0;
        transform: translateX(150%);
    }
}

/* Animation glow arrière-plan */
@keyframes light-glow {
    from {
        transform: translate(-150%, -150%);
    }
    to {
        transform: translate(150%, 150%);
    }
}

/* Premium overlay effet */
.notification:hover::before {
    opacity: 0.8;
    transform: scale(1.1);
}

/* Transition premium text */
.notification span {
    z-index: 1;
    transition: color 0.3s ease;
}

.notification:hover span {
    color: #ffffff;
}
</style>

<script>
// Fonction pour afficher une notification premium
function showNotification(message, type = "success") {
    const container = document.getElementById("notification-container");

    // Création de l'élément de notification
    const notification = document.createElement("div");
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <i class="${type === "success" ? "fa fa-check-circle" : "fa fa-times-circle"}"></i>
        <span>${message}</span>
    `;

    // Ajout au conteneur
    container.appendChild(notification);

    // Écouteur d'événement pour supprimer la notification en cas de clic
    notification.addEventListener("click", () => notification.remove());

    // Supprimer automatiquement après 4 secondes
    setTimeout(() => notification.style.opacity = "0", 10000);
}

// Afficher une notification lors du chargement de la page
window.onload = function () {
    showNotification('Bienvenue dans notre application SkySchool !', 'success');
};
</script>


</body>
</html>
