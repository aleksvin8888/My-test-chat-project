 <ul> 

 <?php
 //==================  БЛОК ДЛЯ ВІДОБРАЖЕННЯ ПОВІДОМЛЕНЬ  ==============================//

    // проверка если существует GET запрос с ID или переменная с ID И  кука с ID  или переменная с ID
     if (isset($_GET["user"]) || isset($poluchatel) && isset($_COOKIE["polzovatel_id"]) || isset($otpravitel)) {
            // установим значения  Null
            $user_id = null;
            $otpravitel = null;
            //  перезаписываем  значения  переменных  в зависимости от  того какой тип даных поступил 
            if(isset($_GET["user"]) || isset($_COOKIE["polzovatel_id"])) {
                $user_id = $_GET["user"];
                $otpravitel = $_COOKIE["polzovatel_id"];
            } else {
                $user_id = $poluchatel;
                $otpravitel = $otpravitel;
            }
        // user_id - кто отправил  
        // user_id_2 - кому отправлено
        // запит у базу на виведення повідомлень які відправив  авторизований користувач 
        // або виведення  повідемлень які прийшли авторизованому користувачу  у відповідь
        $sql = "SELECT * FROM messegs " .
        " WHERE (user_id=" . $otpravitel . " AND user_id_2 = " . $user_id . ") 
         OR (user_id =" . $user_id . " AND user_id_2 =" . $otpravitel . ")";        
         //выполнить SQL запрос к базе даных 
        $result = mysqli_query($connect, $sql);
         // mysqli_num_rows - получить количество результатов запроса 
        $col_messegs = mysqli_num_rows($result);
        //====== ВИВОДИМ  ОТРИМАНІ ПОВІДОМЛЕННЯ З БАЗИ ===================// 
            $i = 0;
            while ($i < $col_messegs) { 
                 // преобразовать дание из Б.Д.  в масив
                 $messegs = mysqli_fetch_assoc($result); 
                ?>                 
                     <li> 
                     <?php
                            // вывести даные конкретного пользователя 
                         $sql = "SELECT * FROM polzovateli WHERE id=" . $messegs["user_id"];
                         $polzovatel = mysqli_query($connect, $sql);
                         $polzovatel = mysqli_fetch_assoc($polzovatel);
                     ?>  
                        <div class="avatar"><img src='<?php echo $polzovatel["photo"]; ?>'></div>
                        <h2><?php echo $polzovatel["name"]; ?></h2>              
                         <p><?php echo $messegs["messeg"]; ?></p>   
                         <div class="time"><?php echo $messegs["time"]?></div>     
                     </li>
                <?php
                $i = $i + 1;
             }       
        }  else {
            echo "<h2>Выберете  пользователя! </h2>";
        } 
                       
    
?>  
</ul>                       




