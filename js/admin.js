let backgroundImages = ["../pics/bg-01.jpg", "../pics/02.jpeg","../pics/bg-01.jpg"];
let currentImageIndex = 0;

function changeBackgroundImage() {
  if (currentImageIndex >= (backgroundImages.length)) {
    currentImageIndex = 0;
  }
  document.body.style.backgroundImage = url('${backgroundImages[currentImageIndex]}');
  currentImageIndex++;
}