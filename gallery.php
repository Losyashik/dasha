<?php
require_once("./assets/componetnts/header.php");
?>

<main class="gallery">
    <h1 class="gallery_heading">
        <hr class="gallery_heading-hr">
        <span class="gallery_heading-text">Галлерея</span>
        <hr class="gallery_heading-hr">
    </h1>
    <secttion class="gallery_body">
        <?php
        $names = scandir("./assets/images/gallery");    
        foreach ($names as $key => $item) {
            if ($key <= 1) continue;
        ?>
            <img src="./assets/images/gallery/<?= $item ?>" alt="" class="gallery_image">
        <?php } ?>
    </secttion>

</main>

<?php require_once("./assets/componetnts/footer.php") ?>
</body>

</html>