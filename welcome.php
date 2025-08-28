<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مرحبًا بك في التطبيق</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>مرحبًا بك في تطبيق مشاوير, <?php echo $_SESSION["user"]; ?>!</h1>
    <p>أنت الآن مسجل دخولك بنجاح.</p>

    <section id="bookings">
        <h2>خيارات الحجز:</h2>
        <button>🚗 حجز مشوار</button>
        <button>✈️ حجز طيران</button>
        <button>🏨 حجز فندق</button>
    </section>

    <section id="logout">
        <button onclick="window.location='logout.php'">تسجيل الخروج</button>
    </section>

</body>
</html>
