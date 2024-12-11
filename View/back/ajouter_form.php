<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Type Cours</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="assets/js/Controle_Saisi.js"></script>
</head>
<body>
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
                    <span class="title">Course Enrollment</span>
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
                <a href="assignment.html">
                        <span class="icon">
                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                        </span>
                    <span class="title">Assignment</span>
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

    <div class="form-container">
        <h2>Ajouter un type cours</h2>
        <form id="addCourseForm" action="ajouter_type.php" method="post" onsubmit="return verif1(event)">
            <label for="type">Type:</label>
            <select id="type" name="type">
                <optio>Sélectionner un Type:</option>
                <option>Vidéo</option>
                <option>Document</option>
            </select>

            <label for="URL">URL:</label>
            <input type="text" id="URL" name="URL">

            <input type="submit" name="addType" value="Ajouter le type">
            <input type="button" name="restCours" onclick="window.location.href='crud_tableType.php'" value="Retour à la liste des types">
        </form>

        <div id="errorMessage" style="color: red;"></div>
        <div id="successMessage" style="color: green;"></div>
    </div>
</body>
</html>
