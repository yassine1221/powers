<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Power Signs - Intro</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background: black;
            overflow: hidden;
        }

        video {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <video autoplay muted playsinline onended="window.location.href='/home';">
        <source src="{{ asset('storage/powerssingns/Bienvenue, Créateur de signalétique.mp4') }}" type="video/mp4">
        Votre navigateur ne supporte pas la vidéo.
    </video>
</body>
</html>
