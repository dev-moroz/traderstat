<?php
/*
Template Name: test_bd_output
Template Post Type: post, page, product
 */

get_header();
?>


<?php

/* Подключение к серверу MySQL */

$mysqli = new mysqli('92.53.96.174', 'cr08935_0', '5cKV13BP', 'cr08935_0');

if (mysqli_connect_errno()) {
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
   exit;
}

/* Посылаем запрос серверу */
if ($result = $mysqli->query('SELECT * FROM wp_users')) {


    print("данные изтаблицы:<br>");

    ?>


     <div class="slider-row">

                <table class="info_table tablesorter {sortlist: [[1,0]]}" id="myTable">
                    <thead>
                        <tr class="color_table_title">
                            <th class="sortless">Trader name</th>
                            <th>Number of ideas</th>
                            <th>Successful ideas</th>
                            <th>Successful percentage</th>
                        </tr>
                    </thead>
                    <tbody>


    <?php

    /* Выбираем результаты запроса: */
    while( $row = $result->fetch_assoc() ){
        // $format = "Это %s (%s) <br>";
        // printf($format , $row['ID'], $row['user_login']);
     ?>
        

    

                        <tr class="color_table">
                           <td class="info_table_name"><?php print($row['user_login']); ?></td>
                           <td><?php print($row['ID']); ?></td>
                           <td><?php print($row['ID']); ?></td>
                           <td><?php print($row['ID']); ?></td>
                       </tr>
                       

                       





     <?php
        // print($row['ID']);
    }

?>
     </tbody>
                  </table>
                  <div class="back_shadowTable"></div>


<?php

    /* Освобождаем память */
    $result->close();
}

/* Закрываем соединение */
$mysqli->close();
?> 

<p>lol</p>





<?php
get_footer();