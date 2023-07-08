<?php
if (isset($_POST)) {
    $name = $_POST['name'];
    $specie = $_POST['specie'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $size = $_POST['size'];
}
require "../conexion.php";
$sql = "SELECT *
FROM mascotas
WHERE name = '$name' 
ORDER BY id DESC;";
$query = $pdo->prepare($sql);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$address = $row['pet_shelter'];
$sql2 = "SELECT *
FROM pet_shelter
WHERE name_petShelter = '$address' 
ORDER BY id DESC;";
$query = $pdo->prepare($sql2);
$query->execute();
$row2 = $query->fetch(PDO::FETCH_ASSOC);
if ($row['health'] == 'Saludable') {
    $health = "healthy";
} elseif ($row['health'] == 'En tratamiento') {
    $health = "treatment";
} elseif ($row['health'] == 'Enfermo') {
    $health = "sick";
} elseif ($row['temperament'] == 'Amigable') {
    $temperament = "friendly";
} elseif ($row['temperament'] == 'Tímido') {
    $temperament = "shy";
} elseif ($row['temperament'] == 'Juguetón') {
    $temperament = "playful";
} elseif ($row['temperament'] == 'Tranquilo') {
    $temperament = "calm";
} elseif ($row['temperament'] == 'Independiente') {
    $temperament = "independent";
} elseif ($row['temperament'] == 'Atención') {
    $temperament = "warning";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de mascota</title>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-59WDXHM');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Open Graph meta tags -->
    <meta property="og:title" content="Esta mascota te puede gustar">
    <meta property="og:description" content="Si estas buscando una mascota... adoptala!!! Recuerda que debes cuidarla y amarla">
    <meta property="og:image" content="<?php echo $row['photo'] ?>">
    <meta property="og:url" content="index.html">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Pasy Mascotas">

    <link rel="stylesheet" href="../css/home-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet" rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- scripts -->
    <script src="../js/pet-profile-script.js" defer></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59WDXHM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
        <nav class="nav-bar">
            <span class="nav-bar__logo">PASY</span>
            <div class="nav-bar__btns">
                <button class="nav-bar__donate-btn">
                    Donar
                    <img src="../img\green-heart__nav-bar-icon.svg" alt="green heart" />
                </button>
                <img class="nav-bar__menu-icon" src="../img\burguer-menu__nav-bar-icon.svg" alt="burguer menu icon" />
            </div>
        </nav>
    </header>
    <main class="pet-profile-body">
        <section class="pet-profile">
            <article class="pet-profile__carousel">
                <img src="../bd_img/<?php echo $row['photo'] ?>" alt="carrusel de fotografias de la mascota">
                <h1><?php echo $name ?></h1>
            </article>

            <article class="results__parameters">
                <div>
                    <span><?php echo $specie ?></span>
                    <span><?php echo $gender ?></span>
                    <span><?php echo $size ?></span>
                    <span><?php echo $age ?></span>
                </div>
            </article>

            <article class="pet-profile__status-box">
                <div>
                    <img src="../img/health-status__pet-profile.svg" alt="icono de salud">
                    <span class="pet-profile__health-tag" health-pet-tag="<?php echo $health ?>"><?php echo $row['health'] ?></span>
                </div>

                <div>
                    <img src="../img/mood-status__pet-profile.svg" alt="icono de humor">
                    <span class="pet-profile__mood-tag" mood-pet-tag="<?php echo $temperament ?>"><?php echo $row['temperament'] ?></span>
                </div>

                <div>
                    <img src="../img/location-status__pet-profile.svg" alt="icono de casita">
                    <div>
                        <span><?php echo $row['pet_shelter'] ?></span>
                        <span>en <?php echo $row2['address'] ?></span>
                    </div>
                </div>
            </article>
            <form action="dia-visita.php" method="POST" class="quiero-visitar-form">
                <!--input -->
                <div class="results__cta">
                    <input class="pet-profile__input" name="pet-shelter" value="<?php echo $row['pet_shelter'] ?>">
                    <input class="pet-profile__input" type="text" name="pet-name" value="<?php echo $row['name'] ?>">
                    <button type="submit" id="advices-pop-up-btn">Quiero visitarlo</button>
                </div>
            </form>

            <!-- FIXME: this need to be more personalized with the image link and the text in the link -->
            <div class="results__cta">
                <button class="share-whatsapp" onclick="shareWhatsapp()"><img src="../img/whatsapp.svg" alt="">Enviar a un amigo </button>
            </div>
            <!-- form action = "visit-thanks.php" method-->
        </section>

        <section class="more-info-pet">
            <h2 class="more-info-pet__title">Más información</h2>
            <p>
                <?php echo $row['history'] ?>
            </p>
            <h3 class="more-info-pet__tag"><span class="pet-profile__mood-tag" mood-pet-tag="<?php echo $temperament ?>"><?php echo $row['temperament'] ?></span></h3>
            <p>
                <?php echo $row['description'] ?>
            </p>

            <h3 class="more-info-pet__tag"><span class="pet-profile__health-tag" health-pet-tag="<?php echo $health ?>"><?php echo $row['health'] ?></span></h3>
            <p>
                <?php echo $row['care'] ?>
            </p>
            <div>
                <button class="donate-cta" id="donateToPet">Donar a la mascota</button>
            </div>

        </section>

        <section class="shelter-info">
            <h2><?php echo $row['pet_shelter'] ?></h2>
            <p>
                <?php echo $row2['description'] ?>
            </p>
            <div>
                <button class="donate-cta" id="donateToShelter">Donar al Albergue</button>
            </div>
        </section>

        <section class="visit-advices" id="advices-pop-up">
            <h1 class="visit-advices__title">
                en tu visita recuerda...
            </h1>
            <article class="visit-advices__text">
                <div>
                    <img src="../img/emoji-silence__visit-advices.svg" alt="carita silenciosa">
                    <p><span>No ser ruidoso con las mascotas</span> </p>
                </div>
                <div>
                    <img src="../img/emoji-calm__visit-advices.svg" alt="carita en paz">
                    <p><span>Ser paciente con el albergue</span> </p>
                </div>
                <div>
                    <img src="../img/emoji-happy__visit-advices.svg" alt="carita en feliz">
                    <p><span>Venir lleno de amor</span> </p>
                </div>
            </article>

            <p class="visit-advices__phrase">Nosotros y las mascotas te lo agradeceremos de ❤️</p>
        </section>
    </main>
    <script>
        function shareWhatsapp() {
            try {
                var currentUrl = window.location.href;
                var shareMessage = "Check out this awesome website: " + currentUrl;
                var thumbnailURL = "https://cdn-icons-png.flaticon.com/256/12/12638.png";
                var description = "This is my personalized description.";


                var whatsappUrl = "https://wa.me/?text=" + encodeURIComponent(shareMessage) + "&image=" + encodeURIComponent(thumbnailURL) + "&description=" + encodeURIComponent(description);

                // if (!currentUrl.startsWith("http://") && !currentUrl.startsWith("https://")) {
                //     currentUrl = "https://" + currentUrl;
                // }

                // WHATS SHARE BUTTON BUT VERSION TWO
                // function share() {
                //     try {
                //         var currentUrl = window.location.href;
                //         var whatsappUrl = "whatsapp://send?text=" + currentUrl;
                //         window.open(whatsappUrl);
                //     } catch (error) {
                //         alert("An error occurred while sharing the link.");
                //     }
                // }
                window.open(whatsappUrl);
            } catch (error) {
                alert("An error occurred while sharing the link.");
            }
        }
    </script>
</body>

</html>