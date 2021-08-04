document.addEventListener('DOMContentLoaded', () => {

  const inputDate = document.querySelector('#date') 
  const inputDate1 = document.querySelector('#date1')
  const inputNumber = document.querySelector('#number1')
  const inputCVC = document.querySelector('#cvc')
  const inputZIP = document.querySelector('#zip_num')
  
  const maskDate = { // создаем объект параметров
    mask: '00/00' // задаем единственный параметр mask
  }

  // const maskDate1 = { 
  //   mask: '00/00' 
  // }

  const maskNumber = { 
    mask: '0000 0000 0000 0000' 
  }

  const maskCVC = { 
    mask: '000' 
  }

  const maskZIP = {
    mask: '000 000'
  }

  IMask(inputDate, maskDate)
  IMask(inputDate1, maskDate)
  IMask(inputNumber, maskNumber) 
  IMask(inputCVC, maskCVC)
  IMask(inputZIP, maskZIP)
})