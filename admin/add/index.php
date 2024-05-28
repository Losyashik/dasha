<?php
$link = mysqli_connect('', 'root', '', 'sila');
function translit($str)
{
    $tr = array(
        "А" => "A", "Б" => "B", "В" => "V", "Г" => "G",
        "Д" => "D", "Е" => "E", "Ж" => "J", "З" => "Z", "И" => "I",
        "Й" => "Y", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N",
        "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T",
        "У" => "U", "Ф" => "F", "Х" => "H", "Ц" => "TS", "Ч" => "CH",
        "Ш" => "SH", "Щ" => "SCH", "Ъ" => "", "Ы" => "YI", "Ь" => "",
        "Э" => "E", "Ю" => "YU", "Я" => "YA", "а" => "a", "б" => "b",
        "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ж" => "j",
        "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l",
        "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
        "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h",
        "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "y",
        "ы" => "yi", "ь" => "", "э" => "e", "ю" => "yu", "я" => "ya",
        "." => "_", " " => "_", "?" => "_", "/" => "_", "\\" => "_",
        "*" => "_", ":" => "_", "*" => "_", "\"" => "_", "<" => "_",
        ">" => "_", "|" => "_"
    );
    return strtr($str, $tr);
}

$name = $_POST['name'];
$discription = $_POST['discription'];
$full_description = $_POST['full_description'];

if (isset($_FILES['image']) and $_FILES['image']["error"] == 0) {
    $img = $_FILES['image'];
    $imgName = $img['name'];
    $imgName = "assets/images/programs/" . translit($name . time()) . "." . pathinfo($img['full_path'], PATHINFO_EXTENSION);
    if (isset($_FILES['images']) and count(array_keys($_FILES['images']['error'], 0)) == count($_FILES['images']['error'])) {
        $data = [];
        foreach ($_FILES['images'] as $key => $item) {
            foreach ($item as $k => $i) {
                $data[$k][$key] = $i;
            }
        }
        if (move_uploaded_file($img['tmp_name'], "./../../$imgName")) {
            $query = "INSERT INTO `programs`( `name`, `description`,`full_description`, `image`) VALUES ('$name', '$discription','$full_description','./$imgName')";
            mysqli_query($link, $query) or die(mysqli_error($link));
            $id = $link->insert_id;
            foreach ($data as $key => $item) {
                $img = "assets/images/programs/description_" . translit($name . time()) . "_$key." . pathinfo($item['full_path'], PATHINFO_EXTENSION);
                if (move_uploaded_file($item['tmp_name'], "./../../$img")) {
                    $query = "INSERT INTO `program_images`( `id_program`, `image`) VALUES ('$id','./$img')";
                    mysqli_query($link, $query) or die(mysqli_error($link));
                } else http_response_code(500);
            }
        } else {
            echo "error";
            http_response_code(500);
        }
    }
} else {

    echo "<pre>";
    print_r($_FILES['image']);
    http_response_code(500);
    echo "</pre>";
}
