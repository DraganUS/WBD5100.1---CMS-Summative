window.onload = function () {
       console.log('Dokument geladen');
     }

function closeLogIn() {
  document.getElementById("modal").setAttribute("style", "display: none !important;");
}
function openLogIn() {
  document.getElementById("modal").setAttribute("style", "display: visible !important;");
}
var form = document.getElementById('contact');


form.addEventListener('submit', validateForm);

function validateForm(event) {
  var isValid = true;
  var firstNameValue = document.getElementById('firstName').value;
  var patientLastNameValue = document.getElementById('lastName').value;
  var ageFieldValue = document.getElementById('age').value;
  var phoneValue = document.getElementById('phone').value;
  var emailValue = document.getElementById('email').value;
  var userPasword = document.getElementById('userPasword').value;
  var userConfirmPasword = document.getElementById('userConfirmPasword').value;


  // First Name
  if (firstNameValue === 0) {
    isValid = false;
    document.getElementById('firstNameRequied').innerHTML = "Please enter a valid first name * ";
    event.preventDefault();
  }
  if (firstNameValue.indexOf(" ") !== -1) {
    isValid = false;
    document.getElementById('firstNameRequied').innerHTML = "Please enter a valid first name * ";
    event.preventDefault();
  }
  if (!isNaN(firstNameValue)) {
    isValid = false;
    document.getElementById('firstNameRequied').innerHTML = "Please enter a valid first name * ";
    event.preventDefault();
  }


  // Last Name
  if (patientLastNameValue  === 0) {
    isValid = false;
    document.getElementById('lastNameRequied').innerHTML = "Please enter a valid last name * ";
    event.preventDefault();

  }
  if (patientLastNameValue.indexOf(" ") !== -1) {
    isValid = false;
    document.getElementById('lastNameRequied').innerHTML = "Please enter a valid last name * ";
    event.preventDefault();

  }
  if (!isNaN(patientLastNameValue)) {
    isValid = false;
    document.getElementById('lastNameRequied').innerHTML = "Please enter a valid last name * ";
    event.preventDefault();

  }

  // AGE VALIDATION
  ageFieldValue = parseInt(ageFieldValue);
  if (isNaN(ageFieldValue)) {
    document.getElementById('ageCheck').innerHTML = "Please enter a valid age * ";
    isValid = false;
    event.preventDefault();

  }
  if (ageFieldValue <= 17){
    document.getElementById('ageCheck').innerHTML = "Please enter a valid age * ";
    isValid = false;
    event.preventDefault();
  }

    //Phone
  phoneValue = parseInt(phoneValue);
  if (isNaN(phoneValue)) {
    document.getElementById('phoneCheck').innerHTML = "Please enter a valid Phone * ";
    isValid = false;
    event.preventDefault();

  }
  if (phoneValue <= 10000000){
    document.getElementById('phoneCheck').innerHTML = "Please enter a valid Phone * ";
    isValid = false;
    event.preventDefault();
  }

  // email
  if (emailValue.indexOf('@') === -1 || emailValue.indexOf('.') === -1 ) {
    document.getElementById('emailCheck').innerHTML = "Please enter a valid Email * ";
    isValid = false;
    event.preventDefault();

  }
  if (emailValue.length <5 ) {
    document.getElementById('emailCheck').innerHTML = "Please enter a valid Email * ";
    isValid = false;
    event.preventDefault();

  }

  // password
  if (userPasword !== userConfirmPasword) {
    document.getElementById('passwordCheck').innerHTML = "Password dont match * ";
    isValid = false;
    event.preventDefault();

  }
  if (userPasword.length < 8 ) {
      document.getElementById('passwordCheck').innerHTML = "Password minimum length 8 character * ";
      isValid = false;
      event.preventDefault();

  }
  var numbers = /[0-9]/g;
  if (!userPasword.match(numbers) ) {
    document.getElementById('passwordCheck').innerHTML = "Password muss contern a number * ";
    isValid = false;
    event.preventDefault();

  }
   var upperCaseLetters = /[A-Z]/g;
   if (!userPasword.match(upperCaseLetters)) {
     document.getElementById('passwordCheck').innerHTML = "Password muss contern a capital (uppercase) letter * ";
     isValid = false;
     event.preventDefault();
   }
   return isValid;
}
