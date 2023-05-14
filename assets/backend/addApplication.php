<?php
$link = mysqli_connect('', 'root', '', 'sila');
$res = $link->query("INSERT INTO `application`(`id_program`, `name`, `numberPhone`) VALUES ('{$_POST['program']}','{$_POST['name']}','{$_POST['numberPhone']}')");
