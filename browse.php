<?php
include 'api.php';

$mekletVards = "";

if (isset($_GET['search']) && trim($_GET['search']) !== "") {
    $mekletVards = trim($_GET['search']);
    $url = "https://api.rawg.io/api/games?key=" . $apiKey . "&search=" . urlencode($mekletVards) . "&page_size=24";
} else {
    $randomLapa = rand(1, 15);
    $url = "https://api.rawg.io/api/games?key=" . $apiKey . "&page_size=24&page=" . $randomLapa;
}

$speles = iegtSpeles($url);
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVault - Browse</title>
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
            <div class="content">

                <div class="search-wrapper">
                    <form method="GET" action="browse.php" class="search-form">
                        <input type="text" name="search" class="input" 
                               placeholder="Meklēt spēles..." 
                               value="<?php echo htmlspecialchars($mekletVards); ?>"
                               style="width: 420px; height: 52px; font-size: 17px;">
                        <button type="submit" class="glow-on-hover" 
                                style="width: 140px; height: 52px; margin-top: 0 !important;">
                            Meklēt
                        </button>
                    </form>
                </div>

                <?php if (!empty($mekletVards)): ?>
                    <h2 style="color:white; text-align:center; margin-bottom:30px;">
                        Search results: "<?php echo htmlspecialchars($mekletVards); ?>"
                    </h2>
                <?php else: ?>
                    <h2 style="color:white; text-align:center; margin-bottom:30px;">
                        Random Games
                    </h2>
                <?php endif; ?>

                <div class="game-box">
                    <?php if (empty($speles)): ?>
                        <p style="color:white; padding:40px; text-align:center;">Couldnt load the games</p>
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