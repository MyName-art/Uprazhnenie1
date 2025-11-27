<?php

if (isset($_GET['name']) && isset($_GET['age']) && $_GET['name'] !== '' && $_GET['age'] !== '') {

    $name = htmlspecialchars($_GET['name']);
    $age = (int)$_GET['age'];


    $message = "Привет, $name! ";
    $message .= ($age >= 18) ? "Ты совершеннолетний." : "Ты несовершеннолетний.";


    session_start();
    $_SESSION['result'] = $message;


    header("Location: index.php");
    exit();
}


session_start();
$result = $_SESSION['result'] ?? '';
unset($_SESSION['result']);
?>

<form method="get">
    Имя:
    <input type="text" name="name"><br><br>

    Возраст:
    <input type="number" name="age"><br><br>

    <button type="submit">Отправить</button>
</form>

<?php
if ($result !== '') {
    echo $result;
}
?>
