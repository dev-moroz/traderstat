$(document).mousedown(function (e){
if (!$('.tinkoff_pay').is(e.target) && $('.tinkoff_pay').has(e.target).length === 0){
  // $('.bg_login_popup').hide()
$('.bg_iframe_tinkoff').addClass('display_none');
$('#easy_level_pay').addClass('display_none');
$('#medium_level_pay').addClass('display_none');
$('#pro_level_pay').addClass('display_none');
}
});


// popup bye

const easy_level_tarif  = document.querySelector("#easy_level_tarif");

const medium_level_tarif  = document.querySelector("#medium_level_tarif");
const pro_level_tarif  = document.querySelector("#pro_level_tarif");
const bg_iframe_tinkoff = document.querySelector(".bg_iframe_tinkoff");

const easy_level_pay  = document.querySelector("#easy_level_pay");
const medium_level_pay  = document.querySelector("#medium_level_pay");
const pro_level_pay  = document.querySelector("#pro_level_pay");

easy_level_tarif.addEventListener("click", function () {
  bg_iframe_tinkoff.classList.toggle('display_none');
  easy_level_pay.classList.toggle('display_none');
});

medium_level_tarif.addEventListener("click", function () {
  bg_iframe_tinkoff.classList.toggle('display_none');
  medium_level_pay.classList.toggle('display_none');
});

pro_level_tarif.addEventListener("click", function () {
  bg_iframe_tinkoff.classList.toggle('display_none');
  pro_level_pay.classList.toggle('display_none');
});






