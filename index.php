<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/index.css">

    <title>Accueil - TheEnd.page</title>
</head>


<body>
<?php
include('includes/navbar.php');
?>

<br><br><br><br><br>
<section id="home">
    <div class="container">
        <div class="row home justify-content-center align-items-center">
            <div class="row text-center">
                <h1 id="biggertitle">Parce que chaque fin <br> mérite un dernier mot.</h1>
            </div>
                <br><br>
            <div class="row text-center">
                <p>Ici, on ne tourne pas la page.</p>
                <p>On la <b>brûle</b>, on la <b>customise</b>, on la <b>partage</b>.</p>
                <a href="login.php" class="btn" id="btn">Créer ma page</a>
            </div>
        </div>
    </div>
</section>

<section class="gradient">

</section>

<br>

<section id="howitworks">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="row text-center">
                <p id="lilheader">Comment marche TheEnd.page ?</p>
                <h1 id="title">Tu veux quitter quelque chose ou quelqu'un ? <br> Fais-le avec style.</h1>
            </div>

            <div class="row justify-content-center align-items-center text-center">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="p-5">
                        <img src="assets/img/palette.png">
                        <p id="content">Choisis ton style</p>
                        <p>Rageur, doux-amer ou carrément cringe — tout est permis.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="p-5">
                        <img src="assets/img/pen.png">
                        <p id="content">Écris ton dernier mot</p>
                        <p>Un message, une lettre, un cri du cœur ou un gif de chat qui pleure. Libre à toi.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="p-5">
                        <img src="assets/img/paper.png">
                        <p id="content">Personnalise ta page</p>
                        <p>Couleurs, sons, emojis, gifs, effets… fais-toi plaisir.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center align-items-center text-center">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="p-5">
                        <img src="assets/img/link.png">
                        <p id="content">Partage le lien</p>
                        <p>À ton boss, ton ex, ton groupe WhatsApp ou au monde entier. Ou pour toi, à toi de voir.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="p-5">
                        <img src="assets/img/airplane.png">
                        <p id="content">Boum!</p>
                        <p>C’est fini. Ta page est en ligne. Ton message est là, intact, personnel, inoubliable.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br>

<section id="presentation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 justify-content-center align-items-center">
                <div class="image-wrapper">
                    <img src="assets/img/palmsupguy.png" id="imgpresentation" class="img-fluid">
                </div>
            </div>

            <div class="col-lg-6 justify-content-center align-items-center">
                <div class="row mx-auto">
                    <p id="lilheader">C'est la fin? Fais-la craquer.</p>

                    <h1 id="title">Ne pars pas sans dire un dernier mot.</h1>

                    <p>TheEnd.page est une plateforme pour créer ta page de départ perso aussi stylée que libératrice.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<br>

<?php
include('includes/footer.php')
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>