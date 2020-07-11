let elements= document.querySelectorAll(".checkbox");
let labelesAdministration = document.querySelectorAll(".administratorLabel");

function sendForm(form, status) {
		let data = {status: status};
		console.log(data);
		$.ajax({
        url:     form.action, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        data: {status: status},
        success: function(response) { //Данные отправлены успешно
        	console.log('suc');
    	},
    	error: function(response) { // Данные не отправлены
            console.log('Ошибка. Данные не отправлены.');
    	}
 	});
}

function updateStatus(element) {
	let label = document.querySelector(`[for="${element.id}"]`);
	if (element.value == 0) {
		element.value = 1;
		element.checked = true;
		label.innerHTML = "Выполнено";
	} else {
		element.value = 0;
		element.checked = false;
		label.innerHTML = "Невыполнено";
	}
	sendForm(element.parentNode, element.value);
}

function initStatus(element) {
	if (element.value == 1) {
		element.checked = true;
	}
}

function initLabelAdministrator(element) {
	if (element.innerHTML == 1) {
		element.innerHTML = "Отредактировано администратором";
	} else {
		element.innerHTML = '';
	}
}

labelesAdministration.forEach((element) => {
	initLabelAdministrator(element);
});

elements.forEach((element) => {
	initStatus(element);
	element.addEventListener('click', function(event) {
		updateStatus(element);
	});
})