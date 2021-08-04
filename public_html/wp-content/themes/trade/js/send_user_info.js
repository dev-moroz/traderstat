// var home_url = 'http://185.244.172.89/wordpress/wp-content/themes/traderstat/';



 $( document ).ready(function(){


$("#btn").click(
    function(){
        sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
        return false; 
    }
);


    $( '#change_email-pass_btn' ).click(function(){
        sendAjaxForm1('result_form', 'ajax_form', 'action_ajax_form.php');
        return false; 
    });
    //     var formData = $( '#change_email-pass' ).serialize();
    //     $.ajax({
    //         // url: home_url + 'send_email-pass.php',
    //         url: '<?php echo get_template_directory_uri()?>/assets/send_email-pass.php',
    //         type: 'POST',
    //         data: formData, 
    //         success: function( data ) {
    //             $( "#result_email-pass" ).html( "<div id='result_success'>Changed successfully</div>" );
    //             },
    //         error: function( data ) {
    //             $( "#result_email-pass" ).html( "<div id='result_error'>Changed error</div>" );
    //             },

    //         });
    //                 // если элемент – ссылка, то не забываем:
    //                  return false;
    // });


    $( '#change_pass_btn' ).click(function(){
        var formData = $( '#change_pass' ).serialize();
        $.ajax({
            // url: home_url + 'send_email-pass.php',
            // url: 'http://185.244.172.89/wordpress/wp-content/themes/traderstat/send_email-pass.php',
            type: 'POST',
            data: formData, 
           success: function( data ) {
                $( "#result_pass" ).html( "<div id='result_success'>Changed successfully</div>" );
                },
            error: function( data ) {
                $( "#result_pass" ).html( "<div id='result_error'>Changed error</div>" );
                },


            });
                    // если элемент – ссылка, то не забываем:
                     return false;
        });

 



    $( '#change_username_btn' ).click(function(){
        var formData = $( '#update_user_info' ).serialize();
        $.ajax({
            // url: home_url + 'send_email-pass.php',
            // url: 'http://185.244.172.89/wordpress/wp-content/themes/traderstat/send_email-pass.php',
            type: 'POST',
            data: $_POST['new_user_login'], 
           success: function( data ) {
                $( "#result_username" ).html( "<div id='result_success'>Changed successfully</div>" );
                },
            error: function( data ) {
                $( "#result_username" ).html( "<div id='result_error'>Changed error</div>" );
                },


            });
                    // если элемент – ссылка, то не забываем:
                     return false;
        });


     // 


     // var refer_url = $_POST['referal_code'];
     $( '#test_send_form_btn' ).click(function(){
        var formData = $( '#test_send_form' ).serialize();
        $.ajax({

     // $( '#change_email-pass_btn1' ).click(function(){
     //    var formData = $( '#change_email-pass1' ).serialize();
     //    $.ajax({
            // url: home_url + 'send_email-pass.php',
            // url: '<?php echo get_template_directory_uri()?>/assets/send_email-pass.php',
            // url: '<?php echo get_template_directory_uri()?>/assets/test.php',
            url: 'http://cf52359-wordpress.tw1.ru/wp-content/themes/trade/assets/test.php',
            type: 'POST',
            data: formData, 
            // data: $_POST['referal_code'],
            success: function(data) {
                $( "#message_r" ).html( "<div id='result_success'>Changed successfully</div>" );
                },
            error: function( data ) {
                $( "#message_r" ).html( "<div id='result_error'>Changed error</div>" );
                // window.location.href = '<?php echo $_POST['referal_code']?>';
                },

            });
                    // если элемент – ссылка, то не забываем:
                     return false;
    });

     // 

});

function sendAjaxForm(result_form, ajax_form, url) {

    $.ajax({
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


function sendAjaxForm1(result_form, ajax_form, url) {
        var formData = $( '#change_email-pass' ).serialize();
        $.ajax({
             // url: "http://cf52359-wordpress.tw1.ru/wp-content/themes/trade/assets/action_ajax_form.php",
            url: '<?php echo get_template_directory_uri()?>/assets/send_email-pass.php',
            type: 'POST',
            dataType: "html", //формат данных
            data: formData, 
            success: function( data ) {
                $( "#result_email-pass" ).html( "<div id='result_success'>Changed successfully</div>" );
                },
            error: function( data ) {
                $( "#result_email-pass" ).html( "<div id='result_error'>Changed error</div>" );
                },

            });
                    // если элемент – ссылка, то не забываем:
                     return false;
    };



