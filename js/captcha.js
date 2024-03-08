function generateCaptcha() {
  var num1 = Math.floor(Math.random() * 10) + 1;
  var num2 = Math.floor(Math.random() * 10) + 1;
  var captchaText = num1 + " + " + num2 + " = ?";
  document.getElementById("captchaImage").innerHTML = captchaText;
  window.captchaResult = num1 + num2;
}

function checkCaptcha() {
  var userInput = document.getElementById("userInput").value;
  var isNumeric = /^\d+$/;

  if (isNaN(userInput.trim()) || parseInt(userInput) !== window.captchaResult) {

    alert('کد امنیتی اشتباه است لطفا حاصل عبارت را صحیح وارد کنید');
    generateCaptcha();
    return false; 
  }

 }


generateCaptcha();
