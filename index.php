<?php
session_start();
if (!key_exists('table', $_SESSION) || sizeof($_SESSION['table']) == 0) {
    $_SESSION['table'] = array();
}

?>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №1</title>
    <link rel="stylesheet" href="css/table.css">
    <script defer src="js/painter.js"></script>
    <script defer src="js/validator.js"></script>
    <style>
        header {
            margin: 10px 0px 0px 0px;
            font-family: Arial, serif;
            color: #181717;
            text-align: center;

        }
        /*селектор по атрибуту*/
        img[src $=".png"] {
            width: 35px;
            height: 35px;
        }

        body {
            background-repeat: no-repeat;
            /*background-image: url("../img/purple.jpg");*/
            background-color: thistle;
        }

        button {
            color: black;
            margin-left: 8px;
            border-radius: 6px;
            letter-spacing: 2px;
            display: inline-block;
            background-color: white;
            border: 2px solid black;
        }
        /*селектор по классу*/
        .mobile-table {
            margin: 20px auto auto;
            width: 900px;
            background-color: rgba(179, 153, 241, 0.7);
        }

        .table {
            overflow-y: scroll;
        }

        th {
            border: 1px solid black;
        }
        /*селектор по id*/
        #coordinate {
            float: left;
            background-color: rgba(179, 153, 241, 0.51);
        }

        .block-items {
            margin-top: 20px;
        }

        input {
            font-size: 20px;
        }

        td {
            font-size: 20px;

        }

        input[type = checkbox] {
            float: left;
            margin: auto;
        }

        .item-y {
            margin-top: 20px;
        }

        .item-radius {
            margin-top: 20px;
        }

        button {
            margin-top: 10px;
        }

        table.item-x {
            width: 600px;
            height: 100px;
            margin: auto;
            background-color: #b399f1;
            box-shadow: 0 0 10px 1px black;


        }

        .x {
            margin-bottom: 2px;
            box-sizing: border-box;
            width: 50px;
            padding: 5px;
            background-color: white;

        }

        label {
            font-size: 25px;
            margin: auto;
        }
        /*псевдоэлемент*/
        p::first-line {
            font-style: italic;
        }
    </style>
</head>
<body>
<div>
    <header>
        <h1>Проверка попадания точки на заданную область</h1>
        <p>
            Мальцева Юлия Игоревна P3210
            <a class="link" href="https://github.com/Yulika19" target="_blank">
                <img alt=github src="img/github.png">
            </a>
            <br> Вариант: 10204
        </p>
    </header>
</div>
<div class="content">
    <div class="block-column1">
        <div class="block-item">
            <canvas id="coordinate" height="500px" width="500px"
            ></canvas>
        </div>
    </div>
    <div class="block-column2">
        <div class="block-items">
            <form class="form" method="POST" id="_form" action="php/check1.php" name="form">
                <table class="item-x" id="_x">
                    <tbody>
                    <tr>
                        <th></th>
                        <th>Координата X:</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="-2" form="_form" id="x">-2
                            </label>
                        </td>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="-1.5" form="_form" id="x">-1.5
                            </label>
                        </td>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="-1" form="_form" id="x">-1
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="-0.5" form="_form" id="x">-0.5
                            </label>
                        </td>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="0" form="_form" id="x">0
                            </label>
                        </td>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="0.5" form="_form" id="x">0.5
                            </label></td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="1" form="_form" id="x">1
                            </label></td>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="1.5" form="_form" id="x">1.5
                            </label></td>
                        <td>
                            <label>
                                <input class="x" type="radio" name="x" value="2" form="_form" id="x">2
                            </label></td>
                    </tr>
                    </tbody>
                </table>
                <div class="item-y">
                    <label>Координата Y:
                        <input class="y" size="12px" id="y" name="y" form="_form" type="text"
                               maxlength="8"
                               placeholder="от -5 до 5" data-rule="number">
                    </label>
                </div>
                <div class="item-radius">
                    <label>
                        Радиус R:
                        <input class="r" type="radio" name="r" value="1" form="_form" id="r">1
                        <input class="r" type="radio" name="r" value="1.5" form="_form" id="r">1.5
                        <input class="r" type="radio" name="r" value="2" form="_form" id="r">2
                        <input class="r" type="radio" name="r" value="2.5" form="_form" id="r">2.5
                        <input class="r" type="radio" name="r" value="3" form="_form" id="r">3
                    </label>
                </div>


                <button class="send" type="submit" form="_form" value="submit" name="submit" id="submit">Отправить
                </button>
                <button class="reset" type="reset" form="_form">Сбросить</button>
                <button class="clear" type="submit" form="_form" name="clear">Очистить таблицу</button>


            </form>
        </div>
        <div class="table">

            <table class="mobile-table">
                <thead>
                <tr>
                    <td>X</td>
                    <td>Y</td>
                    <td>R</td>
                    <td>Попал?</td>
                    <td>Время</td>
                    <td>Время выполнения</td>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($_SESSION['table'] as $value) {
                    echo "<tr>
                <td> $value[0]</td>
                <td> $value[1]</td>
                <td> $value[2]</td>
                <td> $value[3]</td>
                <td> $value[4]</td>
                <td> $value[5]</td>
            </tr>";
                }
                ?>
                </tbody>
            </table>


        </div>
    </div>


</div>
</body>
</html>