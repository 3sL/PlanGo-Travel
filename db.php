<?php
$host = '127.0.0.1';  // السيرفر المحلي
$dbname = 'uber_clone';  // اسم قاعدة البيانات
$username = 'root';  // اسم المستخدم في XAMPP
$password = '';  // كلمة المرور فارغة في XAMPP

try {
    // الاتصال بقاعدة البيانات
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // تفعيل وضع الأخطاء
} catch (PDOException $e) {
    echo 'خطأ في الاتصال بقاعدة البيانات: ' . $e->getMessage();
}
?>
