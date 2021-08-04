/* Article FructCode.com */
$( document ).ready(function() {
    $("#btn").click(
      function(){
       sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
       return false; 
   }
   );
});

function sendAjaxForm(result_form, ajax_form, url) {


    $.ajax({
        // url:     url, //url страницы (action_ajax_form.php)
        url: "http://cf52359-wordpress.tw1.ru/wp-content/themes/trade/assets/action_ajax_form.php",
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        	result = $.parseJSON(response);
        	// $('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.phonenumber);
            window.location.href = result.url_ref + result.referal_code;
            // $('#result_form').html('url:'+result.url_ref + result.referal_code);
        },
    	error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}

