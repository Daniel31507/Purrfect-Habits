let statusContent_green = `  
      <div id="greenAnim">
    <img id="greenHead" src="../img/katzenStatusKöpfe/greenHead.png" alt="">

    <div id="wholeGreenMouth">
      <div id="greenMouth">....</div>

      <div id="toungePiece">....</div>
    </div>

  </div>`;
let statusContent_yellow = `
  <div id="yellowAnim">
    <img id="yellowHead" src="../img/katzenStatusKöpfe/yellowHead.png" alt="">

    <div id="yellowStatusBar">placeHolder</div>
  </div>
`;
let statusContent_red = `
    <div id="redAnim">
    <img id="redHead" src="../img/katzenStatusKöpfe/redHead.png" alt="">
    <div id="redStatusBarRight">brows</div>
    <div id="redStatusBarLeft">brows</div>
    </div>
`;

function updateCatHead(healthbar) {
    const catHead = document.getElementById('catHead');
    catHead.innerHTML = '';
    console.log(healthbar)

    if (healthbar >= 5) {
        document.getElementById("catHead").innerHTML = statusContent_green;
    } else if (healthbar >= 3) {
        document.getElementById("catHead").innerHTML = statusContent_yellow;
    } else {
        document.getElementById("catHead").innerHTML = statusContent_red;
    }
}



function arrowButton() {
    window.location.href = "../php/Tipps&Tricks.php";
}

function relocateToPage() {
    window.location.href = "../php/Mappe.php";
}

let hr = document.getElementById('hour');
let min = document.getElementById('min');
let sec = document.getElementById('sec');

function displayTime() {
    let date = new Date();

    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();

    let hRotation = 30 * hh + mm / 2;
    let mRotation = 6 * mm;
    let sRotation = 6 * ss;

    hr.style.transform = `rotate(${hRotation}deg)`;
    min.style.transform = `rotate(${mRotation}deg)`;
    sec.style.transform = `rotate(${sRotation}deg)`;

}
setInterval(displayTime, 1000);

function statusHead() {
    fetch('../api/getUserID.php')
        .then(res => res.json())
        .then(data => {
            const userID = data.userID;

            if (userID === 0) {
                console.log("Nicht eingeloggt");
                return;
            }

fetch(`../api/get_health.php?userID=${userID}`)
  .then(response => response.json())
  .then(data => {
    if (data.code === 200) {
      const health = data.health;
      const lastEntry = data.lastEntry || "kein Eintrag";
      const bonusReceived = data.bonus;

      // UI oder Konsole ausgeben
      console.log("💚 Health:", health);
      console.log("🗓️ Letzter Eintrag:", lastEntry);
      if (bonusReceived) {
        console.log("🎁 Bonusleben erhalten!");
      }

      // Hier kannst du z.B. die Health-Anzeige aktualisieren:
updateCatHead(health);

    } else {
      console.warn("⚠️", data.message || "Fehler beim Abrufen");
    }
  })
  .catch(error => {
    console.error("❌ Fehler beim Fetch:", error);
  });

        });
}

function getCurrentTimeAndDay() {
    const now = new Date();

    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');

    const weekdays = ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"];
    const weekday = weekdays[now.getDay()];

    return `${weekday} ${hours}:${minutes} Uhr`;
}

let lastTime = '';

function updateTime() {
    const currentTime = getCurrentTimeAndDay();

    if (currentTime !== lastTime) {
        document.getElementById('datum').innerHTML = currentTime;
        lastTime = currentTime;
    }

    requestAnimationFrame(updateTime);
}
updateTime();
statusHead();