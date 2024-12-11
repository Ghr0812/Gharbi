function verif(event) {
    let estValid = true;
    const title = document.getElementById('course-title');
    const description = document.getElementById('course-description');
    const creationDate = document.getElementById('creation-date');
    const courseType = document.getElementById('type');

    const titleError = document.getElementById('title-error');
    const descriptionError = document.getElementById('description-error');
    const dateError = document.getElementById('date-error');
    const typeError = document.getElementById('type-error');

    titleError.innerHTML = '';
    descriptionError.innerHTML = '';
    dateError.innerHTML = '';
    typeError.innerHTML = '';

    if (title.value.trim() === '') {
        titleError.innerHTML = 'Le titre du cours est requis.';
        estValid = false;
    }

    if (description.value.trim() === '') {
        descriptionError.innerHTML = 'La description du cours est requise.';
        estValid = false;
    }

    if (creationDate.value === '') {
        dateError.innerHTML = 'La date de création est requise.';
        estValid = false;
    }

    if (courseType.value === '') {
        typeError.innerHTML = 'Veuillez sélectionner le type de cours.';
        estValid = false;
    }

    if (!estValid) {
        event.preventDefault();
        return false;
    }

    alert('Formulaire soumis avec succès !');
    return true;
}


function verif1(event) {

    document.getElementById('errorMessage').innerHTML = '';
    document.getElementById('successMessage').innerHTML = '';

    const type = document.getElementById('type').value;
    const url = document.getElementById('URL').value;

    if (type === "") {
        document.getElementById('errorMessage').innerHTML = "Veuillez sélectionner un type.";
        event.preventDefault();
        return false;
    }

    if (url.trim() === '') {
        document.getElementById('errorMessage').innerHTML = "Le champ URL ne doit pas être vide.";
        event.preventDefault();
        return false;
    }

    if (url.length > 200) {
        document.getElementById('errorMessage').innerHTML = "L'URL ne doit pas dépasser 200 caractères.";
        event.preventDefault();
        return false;
    }

    const urlPattern = /^(https?:\/\/)?([\w\-]+\.)+[\w\-]+(\/[\w\-._~:\/?#[\]@!$&'()*+,;=]*)?$/;
    if (!urlPattern.test(url)) {
        document.getElementById('errorMessage').innerHTML = "Veuillez entrer une URL valide.";
        event.preventDefault();
        return false;
    }

    document.getElementById('successMessage').innerHTML = "Formulaire soumis avec succès !";

    event.target.submit();
}
