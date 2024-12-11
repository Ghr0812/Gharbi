<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- Fontawesom Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/styles.css">
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

        <!-- ========================= Main ==================== -->
        <!-- Course Enrollments -->
        <div class="courseenroll">
            <div class="enrollHeader">
                <h2>Ajouter Un Cours</h2>
            </div>
            <section class="enroll">
                <form action="ajouter.php" class="form" method="post" onsubmit="return verif(event)">
                    <div class="input-box">
                        <label for="course-title">Titre:</label>
                        <input type="text" id="course-title" name="titre" placeholder="Entrez le titre du cours"/>
                        <div id="title-error" style="color: red;"></div>
                    </div>
                    <div class="input-box">
                        <label for="course-description">Description:</label>
                        <textarea id="course-description" name="description" placeholder="Entrez la description du cours"></textarea>
                        <div id="description-error" style="color: red;"></div>
                    </div>
                    <div class="input-box">
                        <label for="creation-date">Date de création:</label>
                        <input type="date" id="creation-date" name="date_creation" placeholder="jj/mm/aaaa"/>
                        <div id="date-error" style="color: red;"></div>
                    </div>
                    <div class="input-box">
                    <label for="type">Type:</label>
        <select id="type" name="id_type">
            <option value="1">Video</option>
            <option value="2">Document</option>
        </select><br>
                        <div id="type-error" style="color: red;"></div>
                    </div>
                    <button type="submit" class="primary-button" name="addCours">Ajouter le cours</button>
                    <input type="button" class="button" onclick="window.location.href='crud_tableCours.php'" value="Retour à la liste du cours">
                </form>
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/Controle_Saisi.js"></script>
</body>

</html>
