<?php
session_start();

if (!isset($_SESSION['chat'])) {
    $_SESSION['chat'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'send') {
        $msg = strip_tags($_POST['message']);
        $_SESSION['chat'][] = $msg;
        echo json_encode(["status" => "sent"]);
    } elseif ($action === 'get') {
        echo json_encode($_SESSION['chat']);
    }
}
?>
