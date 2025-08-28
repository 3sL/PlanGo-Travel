document.addEventListener("DOMContentLoaded", function() {
  // إذا كان المستخدم قد سجل دخوله، إظهار الخريطة
  if (document.cookie.includes("user")) {
    document.getElementById('loginSection').style.display = 'none';
    document.getElementById('mapSection').style.display = 'block';
  }
});
