<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title> Для Айви Аппс</title>
    	<link rel="stylesheet" href="Css.css" media="all">
	</head>
	<body>
		<!--Тут находится логотип-->
		<div class="logo">
		<header>
			<h1> Тестовое задание для АйвиAппс</h1>
		</header>
		</div>

        <!--Кнопки управления-->
        <div class="button">
            <form method="post" action="script.php">
                <input type="submit" name="Parse" value="Parse" title="нажми для обновления данных"/>
            </form>
            <form method="post" action="index.php">
                <input type="submit" name="Show" value="Show" title="нажми для отображения таблицы">
            </form>
        </div>

		<!--Тут будет таблица-->
		<div  class="table">
			<table>
			    <?php
                if (isset($_POST['Show'])) {
                    ?>
                    <tr>
                        <td>Name</td>
                        <td>Prise</td>
                    </tr>
                    <?php

                    include ("link.php");
                    //Запрос на данные из таблицы//
                    $query = "SELECT * FROM company";
                    $table = $conn->query($query);
                     if($table->num_rows > 0) {
                        while ($row = $table->fetch_assoc()) {
                            ?>
                            <!--Вывод таблицы-->
                            <tr>
                                <td><?php echo $row["name"]; ?> </td>
                                <td><?php echo $row["prise"]; ?></td>
                            </tr>
                            <?php
						}
					 }
				}
				?>
			</table>
		</div>

	</body>
</html>