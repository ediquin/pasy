<?php
if (isset($_POST)) {
    $name = $_POST['pet-name'];
    $pet_shelter = $_POST['pet-shelter'];
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
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por confirmar tu visita</title>
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
    <link rel="stylesheet" href="../css/home-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet" rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script src="../js/visit-thanks.js" defer></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59WDXHM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <section class="visit-thanks-container">
        <article class="thanks">
            <h1>GRACIAS!!! 🧡</h1>
            <p> <?php echo $row['name'] ?> <span> espera tu visita</span></p>
            <img src="../bd_img/<?php echo $row['photo'] ?>" alt="mascota posando">
        </article>
        <span class="tools-visit__indication">Ahora, puedes hacer lo siguiente:</span>
        <article class="tools-visit">
            <!-- links de accion: mapa. whatsapp y donation -->
            <a target="_blank" class="unirte-grupo-wp" href="<?php echo $row2['url_whatsapp_group'] ?>"> <button class="tools-visit__btn"> <img src="../img/whatsapp.svg" alt="">Unirte al grupo</button></a>
            <a target="_blank" class="ver-mapa-g" href="<?php echo $row2['url_address'] ?>">
                <button class="tools-visit__btn"> <img src="../img/google maps.svg" alt="">Ver la dirección</button>
            </a>
            <a target="_blank" class="donar-qr-ty-page" href="../donaciones/donaciones-inicio.html">
                <button class="tools-visit__btn"> <img src="../img/qr-code-icon.svg" alt="">Donar por QR</button>
            </a>

        </article>

        <article class="results__cta">
            <span id="thanks-btn-phrase">La mejor forma de ayudarnos</span>
            <button class="facebook-share-btn"><a target="_blank" class="facebook-share" href="">Compartir en Facebook</a> </button>
            <button class="results__cta--secondary" id="visitThanksHome">Volver al inicio</button>
        </article>
    </section>

    <!-- <script>
        const link = "https://openjavascript.info/2022/12/17/social-media-share-buttons-with-vanilla-javascript/";
        //encodeURI(window.location.href);
        const msg = encodeURIComponent('Hey, I found this article');
        const title = encodeURIComponent('Article or Post Title Here');

        const fb = document.querySelector('.facebook-share');
        fb.href = `https://www.facebook.com/share.php?u=${link}`;
    </script> -->

    <script>
        const imageUrl = "../img/share-image-fb.png";
        const msg = encodeURIComponent('La mejor compañia la puedes adoptar de forma sencilla con PASY');
        const title = encodeURIComponent('Yo prefiero adoptar una mascota, y tú?');

        const fb = document.querySelector('.facebook-share');
        fb.href = `https://www.facebook.com/sharer/sharer.php?u=${imageUrl}&title=${title}&description=${msg}`;
    </script>
</body>

</html>