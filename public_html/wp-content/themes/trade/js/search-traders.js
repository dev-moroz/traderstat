let offset = 0;
const sliderRow = document.querySelector(".slider-row");
const sliderRowMob = document.querySelector(".slider-row_mob");
const sliderNext = document.querySelector(".slider_next");
const sliderPrev = document.querySelector(".slider_prev");

sliderNext.addEventListener("click", function () {
  sliderNext.classList.add('slider_btn_np');
  sliderPrev.classList.remove('slider_btn_np');
  offset = offset + 100;
  if (offset > 100) {
    offset = 100;
  }
  sliderRow.style.left = -offset + "%";
  sliderRowMob.style.left = -offset + "%";
});

sliderPrev.addEventListener("click", function () {
  sliderPrev.classList.add('slider_btn_np');
  sliderNext.classList.remove('slider_btn_np');
  offset = offset - 100;
  if (offset < 0) {
    offset = 0;
  }
  sliderRow.style.left = -offset + "%";
  sliderRowMob.style.left = -offset + "%";
});


// поиск для таблицы

// $(document).ready(function(){
//     $("#search").keyup(function(){
//         _this = this;
//         $.each($("#myTable tbody tr"), function() {
//             if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
//                $(this).hide();
//             else
//                $(this).show();                
//         });
//     });
// });

// поиск для блоков

window.onload=function(){      
    $("#search").keyup(function() {

      var filter = $(this).val(),
        count = 0;

      // $('#results #trololo').each(function() {
        $('.w100 #myTable_mob').each(function() {

        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();

        } else {
          $(this).show();
          count++;
        }
      });
    });

     $("#search").keyup(function() {

      var filter = $(this).val(),
        count = 0;

      $('#myTable tbody tr').each(function() {

        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();

        } else {
          $(this).show();
          count++;
        }
      });
    });
    }
