<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegAut_PHP</title>

    <link rel="stylesheet" href="./style/styles.css">
    <script src="./script/jquery/jquery-3.6.1.min.js"></script>
</head>

<body>

    <?php
    require("./classes/View.php");
    require("./classes/Authorization.php");
    ?>

    <header>
        <div class="content">
            <h1>RegAut_PHP</h1>
            <?php include 'header.php'; ?>
        </div>
    </header>

    <main>
        <div class="content">
            <?php include 'main.php'; ?>
        </div>
    </main>

    <script src="./script/script.js"></script>
</body>

</html>