   <?php
    /*
     отправка  сообщения 
     1. дизайн/мокап - готово \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
     2. сделать отправку формы - готово \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
     3. проверить заполнил ли пользователь поле формы - готово \\\\\\\\\\\\\\\\\\\
     4. если все предвидущие шаги прошли  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
      4.1 добавить сообщения в базу даных - готово \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    */
    //================= обработчик формы отправки сообщений  ===========================//     
             
// подключаем фаил с настройками базы даных
    include "configs/bd.php";
              
if(
  // проверка если существует POST запрос с даними  text, user_id, user_id_2
  isset($_POST["send_sms"]) && isset($_COOKIE["polzovatel_id"]) && isset($_GET["user"])
  // и если поля для данных не пустые 
  && $_POST["messeg"] != "" && $_COOKIE["polzovatel_id"] != "" && $_GET["user"] != ""
) 
 {
  //  добавляем сообщения в базу даных 
  // в строку с сообщениями вставляем $_POST[messeg] из формы отправки 
  // ID  авторизированого пользователя  взт с  файла КУКИ 
  // ID кому отправить взят с $_GET["user"] запроса который произошол при клике на пользователя    
  $sql = "INSERT INTO messegs (messeg, user_id, user_id_2) VALUES ('" . $_POST["messeg"] . "',
     '" . $_COOKIE["polzovatel_id"] . "', '" . $_GET["user"] . "')";
    // проверка или добавлено новое сообщения  
  if (mysqli_query($connect,$sql)) {
        
      } 
  }
  // перезаписываем значения  ID  отправляющего  и  получателя 
  // для коректного  вывида  сообщений из  БД
  $poluchatel = $_GET["user"];
  $otpravitel = $_COOKIE["polzovatel_id"];

  include "modules/messegs.php";    
?>