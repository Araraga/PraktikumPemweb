<?php
session_start();

// Data username dan password default
if (!isset($_SESSION['akun'])) {
    $_SESSION['akun'] = ["user" => "password123"];
}

// Tambah username ke session
if (isset($_POST['add_username']) && !empty($_POST['add_username'])) {
    $new_username = $_POST['add_username'];
    if (!isset($_SESSION['akun'][$new_username])) {
        $_SESSION['akun'][$new_username] = ""; // Set password kosong sementara
    }
}

// Tambah password ke session
if (isset($_POST['add_password']) && !empty($_POST['add_password'])) {
    $new_password = $_POST['add_password'];
    foreach ($_SESSION['akun'] as $username => $password) {
        if ($password === "") {
            $_SESSION['akun'][$username] = $new_password;
            break;
        }
    }
}

// Proses login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($_SESSION['akun'][$username]) && $_SESSION['akun'][$username] === $password) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Tambahkan Username!</h2>
<form method="post" action="">
    <input type="text" name="add_username" required>
    <button type="submit">Tambah Username</button>
</form>

<h2>Tambahkan Password!</h2>
<form method="post" action="">
    <input type="password" name="add_password" required>
    <button type="submit">Tambah Password</button>
</form>

<h2>Silakan Login!</h2>
<form method="post" action="">
    <label>Username</label>
    <input type="text" name="username" required><br><br>
    <label>Password</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
