<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVault - Home</title>
    <link rel="stylesheet" href="css/all.css">
    <style>
        .teksts {
            text-align: center;
            margin-bottom: 30px;
        }

        .teksts p {
            color: red;
            font-size: larger;
            font-weight: 1000;
        }

        .teksts h1 {
            color: white;
            font-family: sans-serif;
            margin-top: 10px;
        }

        .content {
            height: 400px;
            margin-top: 200px;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="images/gamevault.jpg" width="80" height="80" alt="GameVault"></a>
            </div>
            <div class="btn-group">
                <a href="index.php"><button class="glow-on-hover">Home</button></a>
                <a href="all.php"><button class="glow-on-hover">All games</button></a>
                <a href="trending.php"><button class="glow-on-hover">Trending</button></a>
                <a href="downloads.php"><button class="glow-on-hover">Top downloads</button></a>
            </div>
        </div>

        <div class="main-cont">
            <div class="content">
                <div class="teksts">
                    <p>BROWSE GAMES</p>
                    <h1>GameVault - a website where you can quickly and easily<br>find the games you want</h1>
                </div>
                <a href="browse.php"><button class="glow-on-hover">Browse</button></a>
            </div>
        </div>

    </div>
</body>
</html>