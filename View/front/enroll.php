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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
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
                    <input type="button" class="button" onclick="window.location.href='index.php'" value="Retour à la liste du cours">
                </form>
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/Controle_Saisi.js"></script>
</body>

</html>
