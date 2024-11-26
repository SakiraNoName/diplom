function validateRegistration(event) {
  event.preventDefault();
  var username = document.getElementById('username').value;
  var login = document.getElementById('login').value;
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  var confirmPassword = document.getElementById('confirmPassword').value;
  var error1 = document.getElementById('error');
  if (username.trim() === '' || login.trim() === '' || email.trim() === '' || password.trim() === '' || confirmPassword.trim() === '') {
    error1.innerHTML = ('Пожалуйста, заполните все поля');
    return false;
  }
  var userPattern = /[а-яА-ЯЁё\s\-]{1,50}/;
  if (!username.match(userPattern)) {
    error1.innerHTML = ('Пожалуйста, введите корректное ФИО');
    return false;
  }
  var loginPattern = /[a-zA-Z0-9\-]{1,50}/
  if (!login.match(loginPattern)) {
    error1.innerHTML = ('Пожалуйста, введите корректный логин');
    return false;
  }
  var passPattern = /[a-zA-Z0-9\-]{6,16}/
  if (!password.match(passPattern)) {
    error1.innerHTML = ('Пароль должен состоять из букв и цифр</br>Пример: Saab3034');
    return false;
  }
  if (password !== confirmPassword) {
    error1.innerHTML = ('Пароль и подтверждение пароля не совпадают');
    return false;
  }

  var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!email.match(emailPattern)) {
    error1.innerHTML = ('Пожалуйста, введите корректный email адрес');
    return false;
  }

  frmreg.submit()
  return true;
}

var slideIndex = 0;
showSlides();

function showSlides(){
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for ( i = 0; i < slides.length; i++) {
        slides[i].style.display="none"
    }
    slideIndex++;
    if (slideIndex>slides.length) {
        slideIndex=1
    }
    slides[slideIndex-1].style.display="block";
    setTimeout(showSlides,2000);
}
 
 


    

