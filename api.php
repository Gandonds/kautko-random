<?php
$apiKey = "867d2e96fba44e07acd471ecf22ec549";

function iegtSpeles($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // max 10 sekundes
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $atbilde = curl_exec($ch);
    curl_close($ch);

    if ($atbilde === false) return [];
    $dati = json_decode($atbilde, true);
    return isset($dati['results']) ? $dati['results'] : [];
}

function izvadotSpeleKartiti($spele) {
    $zanri = "Nav datu";
    if (!empty($spele['genres'])) {
        $z = [];
        foreach ($spele['genres'] as $zanrs) $z[] = $zanrs['name'];
        $zanri = implode(", ", $z);
    }

    $platformas = "Nav datu";
    if (!empty($spele['platforms'])) {
        $p = [];
        foreach ($spele['platforms'] as $pl) $p[] = $pl['platform']['name'];
        $platformas = implode(", ", $p);
    }

    $bilde      = !empty($spele['background_image']) ? $spele['background_image'] : "https://via.placeholder.com/250x150";
    $nosaukums  = htmlspecialchars($spele['name']);
    $rating     = $spele['rating'] ?? "N/A";
    $metacritic = $spele['metacritic'] ?? "N/A";
    $released   = $spele['released'] ?? "Unknown";

    echo "
    <div class='game-card'>
        <img src='$bilde' alt='$nosaukums'>
        <h3>$nosaukums</h3>
        <div class='game-info'>
            <p><span>Rating:</span> $rating/5</p>
            <p><span>Metacritic:</span> $metacritic/100</p>
            <p><span>Released:</span> $released</p>
            <p><span>Genre:</span> " . htmlspecialchars($zanri) . "</p>
            <p><span>Platform:</span> " . htmlspecialchars($platformas) . "</p>
        </div>
    </div>";
}
?>