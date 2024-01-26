var timerDuration = 300; // مدت زمان تایمر به ثانیه (پنج دقیقه)
var countdownElement = document.getElementById('countdown');

function updateTimer() {
  var minutes = Math.floor(timerDuration / 60);
  var seconds = timerDuration % 60;

  countdownElement.textContent = minutes + ' دقیقه و ' + seconds + ' ثانیه';

  if (timerDuration <= 0) {
    redirectToAnotherPage();
  } else {
    timerDuration--;
    setTimeout(updateTimer, 1000); // به‌روزرسانی هر یک ثانیه
  }
}

function redirectToAnotherPage() {
  window.location.href = 'صفحه-دیگر.html';
}

// شروع تایمر
updateTimer();