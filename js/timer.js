var timerDuration = 150;
var countdownElement = document.getElementById('countdown');

function updateTimer() {
  var minutes = Math.floor(timerDuration / 60);
  var seconds = timerDuration % 60;

  countdownElement.textContent = minutes + ' دقیقه و ' + seconds + ' ثانیه';

  if (timerDuration <= 0) {
    redirectToAnotherPage();
  } else {
    timerDuration--;
    setTimeout(updateTimer, 1000); 
  }
}

function redirectToAnotherPage() {
  window.location.href = '../index.html';
}

updateTimer();

function back(){
  window.location.replace("../index.html");
  }