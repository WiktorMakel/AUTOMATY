<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>

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

    <h2>Rejestracja</h2>

    <form action="register.php" method="POST">

        <input type="text" name="username" placeholder="Login" required>

        <input type="password" name="password" placeholder="Hasło" required>

        <button type="submit">Zarejestruj</button>

    </form>

    <a href="index.php">Powrót do logowania</a>

</div>

</body>
</html>