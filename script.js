 // открыть модальное окно контатов
    // создаем переменную для кнопки контакты выбрав по селектору
    var btnOpenContact = document.querySelector("#open_contact");
        // создаем функцыю для клика
         btnOpenContact.onclick = function() {
	    // создаем переменную для модального окна выбрав его по селектору   
	    var contactsModal = document.querySelector("#contacts-modal");
	    // маняем свойство стиля модального окна для отображения в документе 
	    contactsModal.style.display = "block";  

};

	// закрыть модальное окно контактов 
	// создаем переменную для кнопки закрыть в мод. окн. выбра по селектору и класу кнопки  
	var contactsModalCloseBtn = document.querySelector("#contacts-modal .close");
        // создаем функцыю для клика по кнопке 
	    contactsModalCloseBtn.onclick = function() {
	    // выбераем модальное окно по селектору 
	    var contactsModal = document.querySelector("#contacts-modal");
	    // меняем свойства стиля для мод.окн. чотбы убрать окно из документа 
	    contactsModal.style.display = "none";
};

//================== добавить в друзя без перезагрузки страницы ========================//
                    //=============== ajax =====================//
					/*
					1 винести вивід усіх контактів у окремий фаїл - готово
					2 js- добавить события на кнопку добавить в друзя
					3 js- отправить запрос на сервер
					4 если запрос успешен вивести контакти 
					*/
// функція додати друга 
function add(element) {
	var frend_list = document.querySelector("#frend_list");
	var link = element.dataset.link;
	// создать обект для отправеи http запроса 
	var ajax = new XMLHttpRequest();
		// откриваем ссылку передавая метод запроса и саму ссылку
		ajax.open("GET", link, false);
		// отправляем  запрос 
		ajax.send();
	// меняем контент в блоке frend_list 
	frend_list.innerHTML = ajax.response;
}

// функція видалити друга 
function deleteFrend(element) {
	var frend_list = document.querySelector("#frend_list");
	var link = element.dataset.link;
	var ajax = new XMLHttpRequest();
	ajax.open("GET", link, false);
	ajax.send();
	frend_list.innerHTML = ajax.response;
}

// вивод  списка  сообщений  через ajax 

// создаем переменную для форми вобор по селектору 
var form = document.querySelector("#form");
// закрепляем  собития отпраки для формы
form.onsubmit = function(sobitye) {
// запретить событи отправки формы  по умолчанию 	
sobitye.preventDefault();
	// выбираем нужные  нам даные для отправки из формы используя инструменты консоли 
	var komu = form.querySelector("input[name='user_id_2']");
	var ot = form.querySelector("input[name='user_id']");	
	var messeg = form.querySelector("textarea");
	// формируем все выбраные даные в одну  переменную 	
	var danye = "send_sms=1" +
				"&user_id_2=" + komu.value +
				"&user_id=" + ot.value +
				"&messeg=" + messeg.value;
// создаем новый обект AJAX				
var ajax = new XMLHttpRequest();
    // передаем необходимые параметры для ajax 
    // 1- метод отправки  2- ссылка на фаил обработчик формы 
    // 3- true/false - асинхронный/синхронный запрос
	ajax.open("POST", form.action, false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	// прикреплям собраные  даные 
	ajax.send(danye);
	// меняем  содержымое блока сообщений 
var spisokSoobsheny = document.querySelector("#spisokSoobsheny");
	spisokSoobsheny.innerHTML = ajax.response;
};

// пошук користувача без перезавантаження сторінки через ajax

// створюем змінну  для пошукової форми вбравши по селектору 
var poisk = document.querySelector("#poisk");
// закрепляем  собития отпраки для формы
poisk.onsubmit = function(sobitye) {
	// запретить событи отправки формы  по умолчанию 	
	sobitye.preventDefault();
	var poiskText = poisk.querySelector("input[name='poisk-text']");	
	// создаем новый обект AJAX				
	var ajax = new XMLHttpRequest();
	ajax.open("POST", poisk.action, false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("poisk-text=" + poiskText.value);	
	// змінюем контент у списку користувачів 
var spisok = document.querySelector("#spisok");
	spisok.innerHTML = ajax.response;
};