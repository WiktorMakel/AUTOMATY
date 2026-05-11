<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zmiana hasła</title>

    <style>

        body{
            margin:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial;
            background:#f0f0f0;
        }

        .box{
            background:white;
            padding:40px;
            border-radius:10px;
            text-align:center;
            width:300px;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:10px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:10px;
            margin-top:10px;
            cursor:pointer;
        }

        a{
            display:block;
            margin-top:15px;
            text-decoration:none;
        }

    </style>

</head>
<body>

<div class="box">

    <h2>Zmiana hasła</h2>

    <form action="reset_password.php" method="POST">

        <input type="text" name="username" placeholder="Login" required>

        <input type="password" name="new_password" placeholder="Nowe hasło" required>

        <button type="submit">Zmień hasło</button>

    </form>

    <a href="index.php">Powrót do logowania</a>

</div>

</body>
</html>