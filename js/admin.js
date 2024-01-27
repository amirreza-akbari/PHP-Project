let backgroundImages = ["../pics/1.jpg", "../pics/2.jpg","../pics/3.jpg"];
let currentImageIndex = 0;

function changeBackgroundImage() {
  if (currentImageIndex >= (backgroundImages.length)) {
    currentImageIndex = 0;
  }
  document.body.style.backgroundImage = url('${backgroundImages[currentImageIndex]}');
  currentImageIndex++;
}