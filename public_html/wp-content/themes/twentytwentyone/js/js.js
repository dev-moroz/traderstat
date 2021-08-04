document.addEventListener('DOMContentLoaded', () => {

  const inputDate = document.querySelector('#date') // ищем наш единственный input
  const inputNumber = $('#card_number')
  const inputCVC = $('#cvc')
  
  const maskDate = { // создаем объект параметров
    mask: '00/00' // задаем единственный параметр mask
  }

  const maskNumber = { 
    mask: '0000 0000 0000 0000' 
  }

  const maskCVC = { 
    mask: '000' 
  }

  IMask(inputDate, maskDate)// запускаем плагин с переданными параметрами
  IMask(inputNumber, maskNumber) 
  IMask(inputCVC, maskCVC)
})