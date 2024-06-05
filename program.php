<?php
require_once("./assets/componetnts/header.php");
$link = mysqli_connect('', 'root', '', 'sila');
$item = $link->query("SELECT `name`,`full_description` FROM `programs` WHERE `id`={$_GET['id']}")->fetch_assoc();
$res = $link->query("SELECT `image` FROM `program_images` WHERE `id_program`={$_GET['id']}");
for ($item['images'] = []; $row = $res->fetch_array(); $item['images'][] = $row[0]);
?>

<main class="program">
    <h1 class="program_heading"><?= $item['name'] ?></h1>
    <section class="program_description">
        <?php
        $desc = json_decode($item['full_description'], 1);
        foreach ($desc as $i) {
            if ($i['type'] == 'paragraph') {
        ?>
                <p class="program_paragraph"><?= $i['data']['text'] ?></p>
            <?php
            } elseif ($i['type'] == 'Header') {
            ?>
                <h3 class="program_body-heading"><?= $i['data']['text'] ?></h3>
            <?php
            } elseif ($i['type'] == 'list') {
            ?>
                <ul class="program_list">
                    <?php
                    foreach ($i['data']['items'] as $li) {
                    ?>
                        <li class="program_list-li"><?= $li ?></li>
                    <?php
                    } ?>
                </ul>
        <?php
            }
        }
        ?>
    </section>
    <section class="program_slider">
        <img src="<?= $item['images'][0] ?>" alt="" class="program_slider-image program_slider-image-left">
        <img src="<?= $item['images'][1] ?>" alt="" class="program_slider-image program_slider-image-center">
        <img src="<?= $item['images'][2] ?>" alt="" class="program_slider-image program_slider-image-right">
        <img src="<?= $item['images'][0] ?>" alt="" class="program_slider-image program_slider-image-left">
        <img src="<?= $item['images'][1] ?>" alt="" class="program_slider-image program_slider-image-center">
        <img src="<?= $item['images'][2] ?>" alt="" class="program_slider-image program_slider-image-right">
        <img src="<?= $item['images'][0] ?>" alt="" class="program_slider-image program_slider-image-left">
        <img src="<?= $item['images'][1] ?>" alt="" class="program_slider-image program_slider-image-center">
        <img src="<?= $item['images'][2] ?>" alt="" class="program_slider-image program_slider-image-right">
    </section>
    <a href="./#application" class="program_button">Оставить заявку</a>
</main>
<script>
    $('.program_slider').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
</script>
<?php require_once("./assets/componetnts/footer.php") ?>
</body>

</html>