// скрывает попап по нажатию на пустую область
$(document).mousedown(function (e){
if (!$('.login_popup_form').is(e.target) && $('.login_popup_form').has(e.target).length === 0){
	// $('.bg_login_popup').hide()
$('.bg_login_popup').addClass('display_none');
$('#login_popup_form').addClass('display_none');
$('#register_popup_form').addClass('display_none');
$('#restore_popup_form').addClass('display_none');
$('#new_pass_popup_form').addClass('display_none');
}
});


    // active settings menu
$(function() {
  $('.mb-2 a').each(function() {
    if (this.href == window.location.href) {
      $(this).addClass('active_01');
    }
  });
});

$(function() {
  $('.setting_menu_ul a').each(function() {
    if (this.href == window.location.href) {
      $(this).addClass('active_01').parent().addClass('active_02');
    }
  });
});
$(function() {
  $('.account_tabs_1').each(function() {
    if (this.href == window.location.href) {
      $(this).addClass('active').parent().addClass('active');
    }
  });
});




// let offset = 0;




// new login popup IFRAME
// const login_btn_popup2 = document.querySelector("#login_btn_popup2");
// const login_popup_iframe = document.querySelector("#login_popup_iframe");

// login_btn_popup2.addEventListener("click", function () {
//   login_popup_iframe.classList.toggle('display_none');
// });



// кнопка login в меню - открывает popup login
const login_popup_form = document.querySelector("#login_popup_form");
const login_btn_popup = document.querySelector("#login_btn_popup");
const bg_login_popup = document.querySelector(".bg_login_popup");

login_btn_popup.addEventListener("click", function () {
	bg_login_popup.classList.toggle('display_none');
	login_popup_form.classList.toggle('display_none');

	// register_popup_form.classList.remove('display_none');
});


// кнопка отправки - закрывает popup
const btn__close_popup1  = document.querySelector("#btn__close_popup1");
const btn__close_popup2  = document.querySelector("#btn__close_popup2");
const btn__close_popup3  = document.querySelector("#btn__close_popup3");

// btn__close_popup1.addEventListener("click", function () {
// 	bg_login_popup.classList.add('display_none');
// 	login_popup_form.classList.add('display_none');
// });
// btn__close_popup2.addEventListener("click", function () {
// 	bg_login_popup.classList.add('display_none');
// 	register_popup_form.classList.add('display_none');
// });
// btn__close_popup3.addEventListener("click", function () {
// 	bg_login_popup.classList.add('display_none');
// 	restore_popup_form.classList.add('display_none');
// });


// кнопка восстановить или залогиниться - заменяет popup	


const restore_popup_form = document.querySelector("#restore_popup_form");
const register_popup_form = document.querySelector("#register_popup_form");

// кнопка регистрации - открывает popup register
const create_new_ac = document.querySelector("#create_new_ac");
create_new_ac.addEventListener("click", function () {
	login_popup_form.classList.add('display_none');
	register_popup_form.classList.remove('display_none');
});

// кнопка вспомнил пароль/залогиниться - закрывает popup register,restore открывает login
const login_to_ac1 = document.querySelector("#login_to_ac1");
const login_to_ac2 = document.querySelector("#login_to_ac2");
login_to_ac1.addEventListener("click", function () {
	login_popup_form.classList.remove('display_none');
	register_popup_form.classList.add('display_none');
});
login_to_ac2.addEventListener("click", function () {
	login_popup_form.classList.remove('display_none');
	restore_popup_form.classList.add('display_none');
});


// кнопка забыл пароль - открывает popup востаовление
const fogot_ac = document.querySelector("#fogot_ac");
fogot_ac.addEventListener("click", function () {
	login_popup_form.classList.add('display_none');
	restore_popup_form.classList.remove('display_none');
});

const input_restore_popup_form = document.querySelector(".input_restore_popup_form");
if (!input_restore_popup_form.checkValidity()) {
	document.querySelector("#invalid_email_popup").innerHTML = input_restore_popup_form.validationMessage};



