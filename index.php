<?php
include("assets\php\config\config.php");
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirm = $_POST['confirm'];

    if ($pass != $confirm) {
        echo "<script>alert('Mật khẩu không trùng khớp. Vui lòng nhập lại!')</script>";
    } else {
        $sql = "INSERT INTO ACCOUNTS(A_EMAIL, A_PASSWORD) VALUES ('" . $email . "', md5('" . $pass . "'))";
        $res = mysqli_query($mysqli, $sql);
        echo "<script>  
                alert('Đăng ký thành công!');
                window.location.href = 'index.php';
            </script>;";
    }
} elseif (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Create a hashed password from the input password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Prepare the SQL query using prepared statements
    $stmt = $mysqli->prepare("SELECT A_PASSWORD FROM ACCOUNTS WHERE A_EMAIL = ? LIMIT 1");

    if (!$stmt) {
        die("Prepare failed: " . $mysqli->error);
    }

    // Bind the value to the parameter (?)
    $stmt->bind_param("s", $email);

    // Execute the query
    $stmt->execute();

    // Get the result from the query
    $res = $stmt->get_result();
    if (!$res) {
        die("Query failed: " . $mysqli->error);
    }

    // Check if the email was found
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $hashed_password = $row['A_PASSWORD'];

        // Verify if the input password matches the hashed password
        if (password_verify($pass, $hashed_password)) {
            session_start();
            $_SESSION['username'] = $email;
            header("Location: index.php");
        } else {
            echo "<script>alert('Incorrect username or password!')</script>";
        }
    } else {
        echo "<script>alert('Incorrect username or password!')</script>";
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You & Me</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="app">
        <?php
        include("./assets/php/header.php");
        include("./assets/php/app-container.php");
        include("./assets/php/footer.php");
        ?>
    </div>

    <?php

    if (isset($_GET['action'])) {
        $temp = $_GET['action'];
    } else {
        $temp = '';
    }

    if ($temp == 'login') {
        include("assets\php\admin-component\modal-login.php");
    } elseif ($temp == 'register') {
        include("assets\php\admin-component\modal-register.php");
    }
    ?>

</body>

</html>