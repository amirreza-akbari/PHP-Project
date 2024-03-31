 // تعریف متغیرهای مورد نیاز
 var canvas = document.getElementById('networkCanvas');
 var ctx = canvas.getContext('2d');
 var particles = [];
 var numParticles = 200; // تعداد ذرات (خطوط)
 var minDistance = 100;
 var lineColor = '#fff';
 var velocityMultiplier = 0.1; // ضریب سرعت
 
 // تنظیم اندازه صفحه 
 canvas.width = window.innerWidth;
 canvas.height = window.innerHeight * 0.9; // 90% از ارتفاع صفحه
 
 // تعریف کلاس ذرات
 class Particle {
     constructor() {
     this.x = Math.random() * canvas.width;
     this.y = Math.random() * canvas.height;
     this.vx = Math.random() * 2 - 1;
     this.vy = Math.random() * 2 - 1;
     this.radius = Math.random() * 2 + 1;
     }
     
     draw() {
     ctx.beginPath();
     ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
     ctx.fillStyle = '#fff';
     ctx.fill();
     }
     
     update() {
     this.x += this.vx;
     this.y += this.vy;
     
     // بررسی و اصلاح موقعیت ذره در صورت خروج از محدوده
     if (this.x < 0 || this.x > canvas.width) {
         this.vx *= -1;
     }
     if (this.y < 0 || this.y > canvas.height) {
         this.vy *= -1;
     }
     }
 }
 
 // ایجاد ذرات
 for (let i = 0; i < numParticles; i++) {
     particles.push(new Particle());
 }
 
 // تابع به روز رسانی و رسم
 function update() {
     ctx.clearRect(0, 0, canvas.width, canvas.height);
     
     particles.forEach(particle => {
     particle.update();
     particle.draw();
     });
     
     connectParticles();
     
     requestAnimationFrame(update); // تکرار تابع به روز رسانی
 }
 
 // اتصال نقاط
 function connectParticles() {
     for (let i = 0; i < particles.length; i++) {
     for (let j = i + 1; j < particles.length; j++) {
         const dx = particles[i].x - particles[j].x;
         const dy = particles[i].y - particles[j].y;
         const distance = Math.sqrt(dx * dx + dy * dy);
         
         if (distance < minDistance) {
         ctx.beginPath();
         ctx.strokeStyle = lineColor;
         ctx.lineWidth = 1 - distance / minDistance;
         ctx.moveTo(particles[i].x, particles[i].y);
         ctx.lineTo(particles[j].x, particles[j].y);
         ctx.stroke();
         ctx.closePath();
         }
     }
     }
 }
 
 // تابع برای اضافه کردن نقاط جدید با کلیک
 canvas.addEventListener('click', function(event) {
     particles.push(new Particle());
 });
 
 // اجرای تابع به روز رسانی!
 update();