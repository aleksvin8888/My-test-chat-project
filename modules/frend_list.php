<?php
//===================== Возвращает html c пользователями ================================//

  // запит у Б.Д. вивести усіх корристувачів чий ID не відповідає значенню 
  // змінної $polzovatel_id тобто  усіх окрім авторизованого користувача
  $sql = "SELECT * FROM polzovateli WHERE id!=" . $polzovatel_id;
  $result = mysqli_query($connect, $sql); 
  $col_polzovateli = mysqli_num_rows($result);

  $i = 0;        
  while ( $i < $col_polzovateli) {
  // отримужм данні кожного користувача з бази  
  $polzovatel = mysqli_fetch_assoc($result);
  // виводимо  данні  про користувачів 
?>          
    <li>  
        <div class="avatar"><img src='<?php echo $polzovatel["photo"]; ?>'></div>
        <h2><?php echo $polzovatel["name"]; ?></h2>

        <?php
        // виконуем порівняльний запит у Б.Д.   таблиця друзі 
        // вибрати усі поля з таблиці друзі   де us_f1 = ID обраного користувача та 
        // us_f2 = ID користувача з COOKiE або  навпаки 
          $sql = "SELECT * FROM frends WHERE
          us_f1=" . $polzovatel["id"] . " AND us_f2=" . $polzovatel_id . "  
          OR us_f1=" . $polzovatel_id . " AND us_f2=" . $polzovatel["id"];
          $frendsResult = mysqli_query($connect, $sql);
          $col_frends = mysqli_num_rows($frendsResult);
          // якщо кількість результатів запиту більше  0  
          if ($col_frends > 0) {
            // створюємо ссилку на запит для видалення з таблиці ДРУЗІ 
            ?>                            
             <div data-link="http://chat.local/delete_frends.php?user_id=<?php echo $polzovatel["id"];?>" onclick="deleteFrend(this)">удалить из друзей</div>
           <?php
           // або створюємо ссилку  на добавлення у друзі   
          } else {
            ?>
            <div data-link="http://chat.local/add_frends.php?user_id=<?php echo $polzovatel["id"];?>" onclick="add(this)">добавить в друзя
         </div>  
            <?php
          }
        ?>          
    </li> 
  <?php                                                         
    $i = $i + 1;
    }
  ?>