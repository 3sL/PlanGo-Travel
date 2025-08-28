<?php
session_start();
include('db.php');  // استدعاء ملف الاتصال بقاعدة البيانات

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id'];
    $booking_type = $_POST['booking_type'];  // حجز مشوار، طيران، أو فندق

    // إدخال الحجز في قاعدة البيانات
    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, booking_type) VALUES (:user_id, :booking_type)");
    $stmt->execute(['user_id' => $user_id, 'booking_type' => $booking_type]);

    echo "<script>alert('تم الحجز بنجاح');</script>";
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>حجز</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>حجز مشوار، طيران أو فندق</h1>
    <form action="bookings.php" method="POST">
        <label for="booking_type">اختر نوع الحجز:</label>
        <select name="booking_type" required>
            <option value="ride">حجز مشوار</option>
            <option value="flight">حجز طيران</option>
            <option value="hotel">حجز فندق</option>
        </select><br>
        <button type="submit">تأكيد الحجز</button>
    </form>

</body>
</html>
``
