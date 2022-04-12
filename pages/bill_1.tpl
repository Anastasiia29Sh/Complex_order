<!DOCTYPE HTML>
<html>

<head>
    <title>Круизы</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../css/kruis.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="main">
        <header>
            <img src="../img/top.jpg" width="769" height="127" />
        </header>
        <section>
            <aside>
                <ul>
                    <li>
                        <img id='about' src="../img/menu_01.gif" width="23" height="24"
                            align="absmiddle">&nbsp;&nbsp;&nbsp;<a href="../index.htm" class="over">ГЛАВНАЯ </a>
                    </li>
                    <li>
                        <img id='price' src="../img/menu_02.gif" width="23" height="24"
                            align="absmiddle">&nbsp;&nbsp;&nbsp;<a href="#">ЦЕНЫ</a>
                    </li>
                    <li>
                        <img id='services' src="../img/menu_03.gif" width="23" height="24"
                            align="absmiddle">&nbsp;&nbsp;&nbsp;<a href="zakaz.php">УСЛУГИ</a>
                    </li>
                    <li>
                        <img id='gallery' src="../img/menu_04.gif" width="23" height="24"
                            align="absmiddle">&nbsp;&nbsp;&nbsp;<a href="#">ФОТОГАЛЕРЕЯ</a>
                    </li>
                    <li>
                        <img id='where' src="../img/menu_05.gif" width="23" height="24"
                            align="absmiddle">&nbsp;&nbsp;&nbsp;<a href="#">КООРДИНАТЫ</a>
                    </li>
                </ul>
            </aside>
            <section>
                <header>
                    <h1 style="font-size: 18px; margin-right: 10px; margin-top: 7px;">
                        Проверьте Ваш заказ
                        <br> <img src="../img/line.gif" width="402" height="2" align="right">
                    </h1>

                </header>
                <article>
                    <p>

                    </p>
                </article>
                <article>
                    <p>
                    </p>
                </article>

                <!-- ********************************************************************************************************* -->

                <table class="table_bill_1">
                    <tr>
                        <td>Порт отправления - Порт прибытия</td>
                        <td>
                            <?=$port?>
                        </td>
                    </tr>
                    <tr>
                        <td>Контейнер 2,5 т</td>
                        <td>
                            <?=$count_25?>
                        </td>
                    </tr>
                    <tr>
                        <td>Контейнер 5 т</td>
                        <td>
                            <?=$count_5?>
                        </td>
                    </tr>
                    <tr>
                        <td>Контейнер 10 т</td>
                        <td>
                            <?=$count_10?>
                        </td>
                    </tr>
                    <tr>
                        <td>Тип погрузки</td>
                        <td>
                            <?=$loading?>
                        </td>
                    </tr>
                    <tr>
                        <td>Дополнительные услуги</td>
                        <td>
                            <?=$services?>
                        </td>
                    </tr>
                    <tr>
                        <td>День погрузки</td>
                        <td>
                            <?=$day?>
                        </td>
                    </tr>
                    <tr>
                        <td>Общая стоимость</td>
                        <td>
                            <?=$price?>
                        </td>
                    </tr>
                </table>

                <div class="submit">
                    <div class="btm1">
                        <form action="../php/OrderProcessingBack.php" method="post">
                            <input type="submit" name="back" value="Вернуться">
                        </form>
                    </div>
                    <div class="btm2">
                        <form action="../php/OrderConfirmation.php" method="post">
                            <input type="submit" name="next" value="Продолжить">
                        </form>
                    </div>
                </div>

                <!-- ********************************************************************************************************* -->

            </section>
        </section>
        <footer> Copyright&copy;2012&quot;Морские круизы&quot; </footer>
    </div>
</body>

</html>