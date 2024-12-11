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
    <div class="form-container">
        <h2>Ajouter un type cours</h2>
        <form id="addCourseForm" action="ajouter_type.php" method="post" onsubmit="return verif1(event)">
            <label for="type">Type:</label>
            <select id="type" name="type">
                <option value="">Sélectionner un Type:</option>
                <option value="1">Vidéo</option>
                <option value="2">Document</option>
            </select>

            <label for="URL">URL:</label>
            <input type="text" id="URL" name="URL">

            <input type="submit" name="addType" value="Ajouter le type">
            <input type="button" name="restCours" onclick="window.location.href='index.php'" value="Retour à la liste des types">
        </form>

        <div id="errorMessage" style="color: red;"></div>
        <div id="successMessage" style="color: green;"></div>
    </div>
</body>
</html>
