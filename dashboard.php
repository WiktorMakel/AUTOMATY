<?php

session_start();

if (!isset($_SESSION['loggedin'])) {

    header("Location: index.php");
    exit();


}

$user = $_SESSION['user'];

?>

<!DOCTYPE hmtl>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>

       *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:#f2f2f2;
    padding:12px;
}

.topbar{
    width:100%;

    background:white;

    border:3px solid #222;

    margin-bottom:15px;

    padding:25px 30px;

    overflow:hidden;
}

.top-left{
    float:left;

    font-size:34px;
    font-weight:bold;

    margin-top:5px;
}

.top-right{
    float:right;
}

.top-right a{
    text-decoration:none;
}

.add-btn{
    padding:14px 28px;

    border:none;

    background:green;
    color:white;

    cursor:pointer;

    font-size:16px;

    margin-right:10px;

    transition:0.3s;
}

.add-btn:hover{
    background:darkgreen;
}

.logout-btn{
    padding:14px 28px;

    border:none;

    background:#111;
    color:white;

    cursor:pointer;

    font-size:16px;

    transition:0.3s;
}

.logout-btn:hover{
    background:#333;
}

.main{
    width:100%;

    overflow:hidden;
}

.sidebar{
    float:left;

    width:18%;

    min-height:700px;

    background:white;

    border:3px solid #222;

    padding:30px;
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    margin-bottom:55px;
}

.sidebar ul li a{
    text-decoration:none;

    color:#111;

    font-size:22px;

    transition:0.3s;
}

.sidebar ul li a:hover{
    color:green;
}


.content{
    float:right;

    width:80%;

    min-height:700px;

    background:white;

    border:3px solid #222;

    padding:30px;
}

.content h1{
    font-size:48px;

    margin-bottom:25px;
}

.content p{
    font-size:18px;
}
.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

    </style>

 
</head>
<body>

    <div class="topbar">

    <div class="top-left">
        Witaj <?php echo $user['username']; ?>
    </div>

    <div class="top-right">

        <a href="logout.php">
            <button class="logout-btn">Wyloguj</button>
        </a>
    </div>

</div>

<div class="main">

    <div class="sidebar">
        <ul>
            <li><a href="#">Użytkownicy</a></li>
            <li><a href="#">Klienci</a></li>
            <li><a href="#">Produkty</a></li>
            <li><a href="#">Płatności</a></li>
        </ul>
    </div>

<div class="content">

    <div class="content-header">
        <h1>Dashboard</h1>

        <a href="#">
            <button class="add-btn">Dodaj Produkty</button>
        </a>
    </div>

    <p>nic</p>

</div>



</div>

</body>
</html>