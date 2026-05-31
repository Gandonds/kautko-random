const apiKey = "f639a1dc738d4b5cad0b33c8728ed2f2";
const trendingGrid = document.getElementById("trending-grid");

function ieladetTrendingSpeles() {
let noDatuma = "2024-01-01";
let lidzDatumam = "2026-12-31";
fetch(`https://api.rawg.io/api/games?key=${apiKey}&dates=${noDatuma},${lidzDatumam}&ordering=-added&page_size=24`)

.then(function(response) {
    return response.json();
})
.then(function(data) {

trendingGrid.innerHTML = "";
for (let i = 0; i < data.results.length; i++) {
    let spele = data.results[i];
    let zanri = "Nav datu";
    if (spele.genres) {
        zanri = spele.genres.map(function(g) {
            return g.name;
        }).join(", ");
    }
    let platformas = "Nav datu";
    if (spele.platforms) {
        platformas = spele.platforms.map(function(p) {
            return p.platform.name;
        }).join(", ");
    }
    let bilde = spele.background_image;
    if (!bilde) {
        bilde = "https://via.placeholder.com/250x150";
    }

trendingGrid.innerHTML += `
    <div class="game-card">
        <img src="${bilde}" alt="${spele.name}">
        <h3>${spele.name}</h3>

        <div class="game-info">
            <p>Rating: ${spele.rating}/5</p>
            <p>Metacritic: ${spele.metacritic || "N/A"}/100</p>
            <p>Released: ${spele.released || "Unknown"}</p>
            <p>Žanri: ${zanri}</p>
            <p>Platformas: ${platformas}</p>
        </div>
    </div>
`;
        }
        })
    .catch(function(error) {

        console.log("Kļūda:", error);

        trendingGrid.innerHTML =
            "<p>Neizdevās ielādēt spēles.</p>";
    });
}

window.onload = function() {
    ieladetTrendingSpeles();
};