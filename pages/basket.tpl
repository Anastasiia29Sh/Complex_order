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
                        <?=$title_date?>
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

                <div class="info">
                    <p>
                        <?=$_SESSION['name']?> ,
                    </p>
                    <p>Груз принят в работу.</p>
                    <p>Вам выставлен счет на
                        <?=$_SESSION['price']?>
                    </p>
                    <p>Данные по грузу записаны в файл.</p>
                    <p>Информация отправлена на почту.</p>
                    <p>Форма отчета:
                        <?=$_SESSION['document']?>
                    </p>

                </div>

                <!-- ********************************************************************************************************* -->

            </section>
        </section>
        <footer> Copyright&copy;2012&quot;Морские круизы&quot; </footer>
    </div>
</body>

</html>