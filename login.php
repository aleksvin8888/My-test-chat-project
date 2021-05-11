<?php
/*
	1. дизайн/мокап - done
	2. отправка формы - done
	3. сделать обработку данных формы проверить заполнены ли даные емеил и пароль - done 
	4. сделать проверку есть ли такой пользователь в базе даных - done
	5. если нет то вывести ошыбку. Иначе пункт 6 - done
	6. авторизовать пользователя - done
	

*/
include "configs/bd.php";
if(
	// проверка если существует POST запрос с даними email и password
	isset($_POST["email"]) && isset($_POST["password"]) 
	// и если поля для данных не пустые 
	&& $_POST["email"] != "" && $_POST["password"] != "" 
) {
	// проверка есть ли в базе пользователь с емейлом и паролем как в POST запросе 
	$sql = "SELECT *  FROM `polzovateli` WHERE `emeil` LIKE '" . $_POST["email"] . "' AND `password` LIKE '" . $_POST["password"] . "'";
	// в переменную $result получаем результат из Б.Д.
	$result = mysqli_query($connect, $sql);
	// получаем количество результатов запроса
	$col_polzovately = mysqli_num_rows($result);
	    // если количество результатов запроса равно " 1 "  
		if($col_polzovately == 1){
			// преобразовуем полученые даные в масив 
			$polzovatel = mysqli_fetch_assoc($result);
			// создаем КУКИ для хранения данных пользователя на протежени оприделенного времени 
			//time()+...сек или минут или суток
			setcookie("polzovatel_id",$polzovatel["id"], time() + 60*60*30);
			// перенаправляем авторизмрованого пользователя на главную страницу 
			header("Location: /");
		} else {
			echo "<h2>невірний логін або пароль</h2>"; // у майбутному зробити виліт модального вікна
		}
				
		}


?>


<!DOCTYPE html>
<html>
<head>
	<META charset="utf-8">
	<title>авторизацыя</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	 
   <?php
    include "chasty_sayt/shapka.php"
    ?> 
    <div id = "content"> 
    	<form class="css3Form" action="login.php" method="POST">
    		<h1>Увійти в аккаунт</h1>
    			<ul>
    				<li>
    					<p>Email</p>
    					<input type="text"  name="email"/>
    				</li>
			        <li>
			        	<p>password</p>
			        	<input type="password"  name="password"/>
			        </li>
			        <li><input type="submit" class="button" value="Увійти" /></li>
			        <li><input type="button" value="пройти реєстрацію" onClick='location.href="register.php"'></li>	
			    </ul>                          
		</form>								        
	</div>

</body>
</html>