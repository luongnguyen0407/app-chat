<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="http://localhost/quanlynhanvien/" target="_parent">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="public/style/main.css">
    <script defer src="public/js/auth.js"></script>
    <title>Login</title>
</head>

<body>
    <main class="main_login">
        <?php
        require_once "./app/views/pages/" . $data['Page'] . ".php"
        ?>
    </main>
</body>

</html>