<?php
require_once("./assets/componetnts/header.php");
$link = mysqli_connect('', 'root', '', 'sila');
$item = $link->query("SELECT `name`,`full_description` FROM `programs` WHERE `id`={$_GET['id']}")->fetch_assoc();
$item['images'] = $link->query("SELECT `image` FROM `program_images` WHERE `id_program`={$_GET['id']}");
?>

<main class="program">
    <h1 class="program_heading"><?= $item['name'] ?></h1>
    <section class="program_description">

    </section>
    <section class="program_slider">
        <img src="<?= $item['images'][0] ?>" alt="" class="program_slider-image program_slider-image-left">
        <img src="<?= $item['images'][1] ?>" alt="" class="program_slider-image program_slider-image-center">
        <img src="<?= $item['images'][2] ?>" alt="" class="program_slider-image program_slider-image-right">
    </section>
    <a href="./#application" class="program_button">Оставить заявку</a>
</main>
</body>

</html>