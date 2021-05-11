
<?php
//<!--=================  список пользоватилей   выведен с помощю базы даных  ===============-->//


    // запрос в Б.Д. вывести список всех пользователей кроме АВТОРИЗИРОВАНОГО 
    $sql = "SELECT * FROM polzovateli WHERE id NOT IN ( '" . $_COOKIE["polzovatel_id"] . "' )";
    // выполнить SQL запрос к базе даных 
    $result = mysqli_query($connect, $sql);
    // // mysqli_num_rows - получить количество результатов запроса 
    $col_polzovateli = mysqli_num_rows($result);
?> 
    <div id = "spisok">
        <ul>
            <?php       
                // переменная счетчик для подсчета количества пользоватилей 
                $i = 0;        
                // если существует запрос на поиск пользоватнля выводим искомого пользователя
                while ( $i < $col_polzovateli) {
                // mysqli_fetch_assoc - преобразовать получыне даные пользоватиля в масив 
                //   $polzovateli - переменная  в  которой  хранияца дание  как  в  масиве 
                $polzovateli = mysqli_fetch_assoc($result);
            ?>                  
                <li>
                    <a href='/index.php?user= <?php echo $polzovateli["id"]; ?>'>
                        <div class="avatar"><img src='<?php echo $polzovateli["photo"]; ?>'></div>
                        <h2><?php echo $polzovateli["name"]; ?></h2> 
                        <p><?php echo $polzovateli["data"]; ?></p>                               
                    </a>
                </li>                 
            <?php                                                         
              $i = $i + 1;
            }
        ?>
        </ul>   
    </div>   


