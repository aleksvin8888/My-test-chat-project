
<?php
/*
		1. дизайн/мокап -  готово \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
		2. сделать отправку формы - готово \\\\//////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
		3. проверети есть ли пользователь с таким емеил - готово \\\\\\\\\\\\\\\\\\\
		4. проверить заполнил ли пользователь поля формы ( емеил пароль ) - готово\\
		5. если все предвидущие шаги прошли ( 3, 4 ) \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
		  5.1 добавить пользователя в базу даных - готово \\\\\\\\\\\\\\\\\\\\\\\\\\
*/
include "configs/bd.php";
if(
	// проверка если существует POST запрос с даними email и password
	isset($_POST["email"]) && isset($_POST["password"]) 
	// и если поля для данных не пустые 
	&& $_POST["email"] != "" && $_POST["password"] != "" 
) {
	// тогда создаем запрос в базу даных для добавления нового пользователя в таблицу
	//  вставить в таблицу "polzovateli" emeil, password которые поступили с POST запроса    
	$sql = "INSERT INTO polzovateli (emeil, password, name, phone) VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["name"] . "', '" . $_POST["phone"] . "')";
	// проверка или добавлен новый пользователь 
	if (mysqli_query($connect,$sql)) {
     
				echo "<h2>пользователь добавлен </h2>";				
			} else{
				echo "<h2>произошла ошыбка</h2>";
			}		
		}		

?>


<!DOCTYPE html>
<html>
<head>
	<META charset="utf-8">
	<title>регистрацыя</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	 <!-- шапка сайта -->
 	<?php
    include "chasty_sayt/shapka.php"
    ?>
    <div id = "content">
    	<form class="css3Form" action="register.php" method="POST">
    		<h1>Укажіть дані для реєстрації</h1>
    			<ul>
    				<li>
    					<p>Email</p>
    					<input type="text"  name="email"/>
    				</li>
			        <li>
			        	<p>password</p>
			        	<input type="password"  name="password"/>
			        </li>
			         <li>
			        	<p>Імя</p>
			        	<input type="text"  name="name"/>
			        </li>
			         <li>
			        	<p>Телефон</p>
			        	<input type="text"  name="phone"/>
			        </li>
			        <li><input type="submit" class="button" value="Зареєструватись" /></li>
			        <li><input type="button" value="Увійти" onClick='location.href="login.php"'></li>	
			    </ul>                          
		</form>	
	</div>
  
</body>
</html>