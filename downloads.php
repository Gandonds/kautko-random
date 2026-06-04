<?php
include 'api.php';
$url = "https://api.rawg.io/api/games?key=" . $apiKey . "&page_size=30&ordering=-added";
$speles = iegtSpeles($url);
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVault - Top Downloads</title>
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="images/gamevault.jpg" width="80" height="80" alt="GameVault">
            </div>
            <div class="btn-group">
                <a href="index.php"><button class="glow-on-hover">Home</button></a>
                <a href="all.php"><button class="glow-on-hover">All games</button></a>
                <a href="trending.php"><button class="glow-on-hover">Trending</button></a>
                <a href="downloads.php"><button class="glow-on-hover">Top downloads</button></a>
            </div>
        </div>
        <div class="main-cont">
            <div class="content" style="display:flex; flex-direction:column; align-items:center;">
                <h1 style="color:white; margin-bottom:20px; font-family:sans-serif;">Top Downloads</h1>
                <div class="game-box" id="downloads-grid">
                    <?php if (empty($speles)): ?>
                        <p style="color:white; padding:20px;">Couldnt load the data.</p>
                    <?php else: ?>
                        <?php foreach ($speles as $spele): ?>
                            <?php izvadotSpeleKartiti($spele); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>