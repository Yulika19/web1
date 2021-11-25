<?php
date_default_timezone_set('Europe/Moscow');

session_start();

//var_dump($_POST);
$start = microtime(true);
$x = isset($_POST["x"]) ? $_POST["x"] : null;
$y = (double)str_replace(",", ".", $_POST["y"]);
if ($_POST["y"] == "-0.0" || $_POST["y"] == "-0.00" || $_POST["y"] == "-0" || $_POST["y"] == "0") {
    $y = 0.0;
}

$r = (double)str_replace(",", ".", $_POST["r"]);
if ($_POST["r"] == "-0.0" || $_POST["r"] == "-0.00" || $_POST["r"] == "-0" || $_POST["r"] == "0") {
    $r = 0.0;
}
$is_catch = "Не попал";
$answer = "";
$currentTime = date("H:i:s");

if (isset($_POST['submit'])) {
    if (is_numeric($x) && is_numeric($y) && $y != 0 && is_numeric($r) &&
        in_array($x, array(-2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2)) &&
        ($y >= -5 && $y <= 5) && in_array($r, array(1, 1.5, 2, 2.5, 3))) {
        if ($x <= 0 && $y <= 0 && ($x * $x + $y * $y) <= ($r / 2) * ($r / 2)
            || ($x <= 0 && $y >= 0 && $y <= $r / 2 && $x >= -$r && ($x - 2 * $y >= -$r))
            || ($x >= 0 && $y >= 0 && $y <= $r && $x <= $r)) {
            $is_catch = "Попал";
        }
        if (!isset($_SESSION['table'])) {
            $_SESSION['table'] = array();
        }
        $time = round((microtime(true) - $start) * 1e6, 2) . ' ms';
        $res_table = array($x, $y, $r, $is_catch, $currentTime, $time);


        array_push($_SESSION['table'], $res_table);


    }
} else if (isset($_POST['clear'])) {
    require_once('clearTable.php');
    clear_table();

}
header('Location: ../index.php');