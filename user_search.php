
<?php
//====================== фаил обработчик поиска пользователя по имени ==================================//


// подключаем фаил с настройками базы даных
    include "configs/bd.php";
// якщо існує запити з пошукової строки користувачів то 
// формуємо запит у Б.Д.  для пошуку співпадінь по  частині імені  
if (isset($_POST["poisk-text"])) {
    $sql = "SELECT * FROM `polzovateli` WHERE `name` LIKE '%" . $_POST["poisk-text"] . "%'";
   // виконуємо запит у базу 
   $result =  mysqli_query($connect, $sql);   
   // отримуємо кількість результаті 
    $col_polzovateli = mysqli_num_rows($result);    
    if ($col_polzovateli == 0) {
      echo "<p>слухай чювак нема таких імен у базі даних  </p>";
    }
    ?>
     <div id = "spisok">
        <ul>
            <?php
                // виводимо  результат пошуку  по імені  у блок  Список  користувачів
               $i = 0;
               while ($i < $col_polzovateli) {
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
<?php
       // якщо  не існує пошукового  запиту  виводимо усіх користівачів 
    } else {
      include "modules/spisokKontackt.php";
    }