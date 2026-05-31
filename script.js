// RAWG API atslega
const apiKey = "f639a1dc738d4b5cad0b33c8728ed2f2";
const gamesGrid = document.getElementById("games-grid");

function ieladetVisasSpeles() {

fetch(`https://api.rawg.io/api/games?key=${apiKey}&page_size=45&ordering=-added`)
    .then(function(response) {
    return response.json();
        })  
    .then(function(data) {

gamesGrid.innerHTML = "";

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

gamesGrid.innerHTML += `
    <div class="game-card">
        <img src="${bilde}" alt="${spele.name}">
        <h3>${spele.name}</h3>

        <div class="game-info">
            <p><span>Rating:</span> ${spele.rating}/5</p>
            <p><span>Metacritic:</span> ${spele.metacritic || "N/A"}/100</p>
            <p><span>Released:</span> ${spele.released || "Unknown"}</p>
            <p><span>Genres:</span> ${zanri}</p>
            <p><span>Platforms:</span> ${platformas}</p>
        </div>
    </div>
`;
}
})
.catch(function(error) {
    console.log("Radās kļūda:", error);
});
}

window.onload = function() {
    ieladetVisasSpeles();
};