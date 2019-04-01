<?php

	if(isset($_POST['Parse'])) {
        //подлючаем базу данных
        include ("link.php");
        //считываем API
        $read = file_get_contents('https://iextrading.com/api/1.0/stock/market/collection/list?collectionName=in-focus');
        //преобразуем API
        $read = json_decode($read, true);
        $i = 0;
        foreach ($read as $elem) {
            global $i;
            global $conn;
            //общаемся к таблице и обовляем данные
            $sql = 'UPDATE company SET
		    name = "' . $elem["companyName"] . '", prise = "' . $elem['latestPrice'] . '"
		    WHERE id = "' . $i++ . '"';'"';
            if($conn->query($sql) === TRUE){}
            else { echo " Ошибка: ".$conn->error.'<br>';}
        }
        $conn->close();
    }

    echo "
    <html>
        <head>
        <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
    </head>
    </html>
    ";
?>