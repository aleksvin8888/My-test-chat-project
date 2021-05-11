
<?php
// подключаем фаил с настройками базы даных
    include "configs/bd.php"; 
// условия для загрузки страницы авторизацыя в первую очеридь
// создадим переменную со значениям null    
$polzovatel_id = null;
// если появилась КУКА  с ID пользователя 
if(isset($_COOKIE["polzovatel_id"])) {
  // перезаписываем значения  polzovatel_id
  $polzovatel_id = $_COOKIE["polzovatel_id"];
}
// теперь если значения переменной polzovatel_id ровно null   
if($polzovatel_id == null) {
  // делаем перенаправления на страницу авторизацыи  
  header("Location: /login.php");
}  // если нет загружем  дальше главную страницу 
?>
<!--============================ Основной  файл index.php ========================================== -->   
    <!DOCTYPE html>
    <html>
    <head>
    	<META charset="utf-8">
    	<title></title>
    	<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php
    include "chasty_sayt/shapka.php"
    ?>  
    
    <!-- основной блок для отображения контента  -->  
    <div id = "content">
        <!-- блок со спискам пользоватилей-->
        <div id = "users">
        <!-- блок поиска пользоватилей-->        
          <form id = "poisk" action= "http://chat.local/user_search.php"; method="POST" >  
               <input type="text" name="poisk-text">
               <button type="submit" name="seorch_name"><img src = "images/icon-seorch.png">
               </button>
          </form>       
        <?php
        //список пользоватилей подключен с папки модули 
         include "modules/spisokKontackt.php";
        ?>
        </div>
        <!-- блок переписки пользоватилей  -->
        <div id = "blokPerepiska">
            <!--  блок отображения сообщений -->
            <div id ="spisokSoobsheny">
                 <?php
                   //  блок сообщений вынисен в папку модули
                   include "modules/messegs.php";
                  ?>
            </div>

            <!-- форма  отправки сообщений  -->
            <form id="form" action="http://chat.local/send_meseg.php?user=<?php echo $_GET["user"];?>" method="POST">
              <input type="hidden" name="user_id" value= "<?php echo $_COOKIE ["polzovatel_id"] ?>">    
              <input type="hidden" name="user_id_2" value= "<?php echo $_GET["user"]; ?>"> 
              <textarea name="messeg"></textarea>
              <button type="submit" name="send_sms"><img src="images\send.png"></button>            
            </form>


        </div>
     </div>
     <?php
    include "modules/contakts.php";
    ?>
  
    <script src="script.js"></script>
 </body>
 </html>