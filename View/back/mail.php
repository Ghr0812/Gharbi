<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un Email</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: scale(1.02);
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #444;
            font-weight: bold;
            font-size: 24px;
        }

        label {
            font-size: 14px;
            color: #666;
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #444;
            background: #f9f9f9;
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.5);
            outline: none;
        }

        button {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        button i {
            margin-right: 10px;
        }

        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
            }

            button {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Contactez-nous par Email</h2>
        <form onsubmit="envoyerEmail(event)">
            <div>
                <label for="subject">Sujet :</label>
                <input type="text" id="subject" name="subject" placeholder="Entrez le sujet" required>
            </div>
            <div>
                <label for="body">Message :</label>
                <textarea id="body" name="body" rows="5" placeholder="Écrivez votre message ici" required></textarea>
            </div>
            <button type="submit">
                <i class="fa fa-envelope"></i> Envoyer Email
            </button>
        </form>
    </div>

    <script>
        function envoyerEmail(event) {
            event.preventDefault(); // Empêche le rechargement de la page
            const subject = encodeURIComponent(document.getElementById('subject').value);
            const body = encodeURIComponent(document.getElementById('body').value);
            const mailtoLink = `mailto:eduventure04@yahoo.com?subject=${subject}&body=${body}`;
            window.location.href = mailtoLink;
        }
    </script>
</body>
</html>
