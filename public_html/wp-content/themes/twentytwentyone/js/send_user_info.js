var home_url = 'http://185.244.172.89/wordpress/wp-content/themes/traderstat/';



 $( document ).ready(function(){
    $( '#change_email-pass_btn' ).click(function(){
        var formData = $( '#change_email-pass' ).serialize();
        $.ajax({
            // url: home_url + 'send_email-pass.php',
            url: '<?php echo get_template_directory_uri()?>/send_email-pass.php',
            type: 'POST',
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
    });


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

    });

