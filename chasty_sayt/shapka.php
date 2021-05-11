  <!-- шапка сайта -->
     <div id = "shapka">
                	<div id = "logo">	
                		 <img src="\images\logo.png"> 
                		 <span><i>BestVinChat</i></span>
                		 <div id = "menu">	
                        <a href="/">Головна</a>
                		    <a href="#" id = "open_contact">Контакты</a>
                        <a href="#">Налаштування</a>

                             <?php
                             if(isset($_COOKIE["polzovatel_id"])) {
                              $sql = "SELECT * FROM polzovateli WHERE id=" . $_COOKIE["polzovatel_id"];
                              $resalt = mysqli_query($connect, $sql);
                              $polzovatel = mysqli_fetch_assoc($resalt);
                              ?>
                              <a href="vihod.php" ><?php echo $polzovatel["name"] ?>  =></a> <!-- выйти -->
                              <?php
                             } else {
                              ?>
                              <a href="login.php">Увійти</a> <!-- Сылка на страницу выход -->
                              <?php
                             }
                             ?>

                             

                	   </div>
                	</div>
    </div>