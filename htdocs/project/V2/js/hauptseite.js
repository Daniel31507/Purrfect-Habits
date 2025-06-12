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

setStatus("red");
function setStatus(color) {
    console.log("setStatus");
    if (color == "green") {
        document.getElementById("catHead").innerHTML = statusContent_green;
    }
    else if (color == "yellow") {
        document.getElementById("catHead").innerHTML = statusContent_yellow;
    }
    else if (color == "red") {
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

// statusHead();

// function statusHead() {
//     let healthbar = 8;

//     //wenn letzter eintrag >= 24h her --> dann -1 leben auf der Healthbar
//     healthbar--;

//     // if (healthbar >= 5) {
//     //     document.getElementById('catHead').innerHTML = '';
//     //     document.getElementById('catHead').innerHTML = `
//     //     <div id="greenAnim">
//     //       <img id="greenHead" src="../img/katzenStatusKöpfe/greenHead.png">
//     //       <div id="wholeGreenMouth">
//     //         <div id="greenMouth">....</div>
//     //         <div id="toungePiece">....</div>
//     //       </div>
//     //     </div>
//     //   `;
//     // } else if (healthbar < 5 && healthbar >= 3) {
//     //     document.getElementById('catHead').innerHTML = '';
//     //     document.getElementById('catHead').innerHTML = `
//     //     <div id="yellowAnim">
//     //     <img id="yellowHead" src="../img/katzenStatusKöpfe/yellowHead.png" alt="">
//     //     <div id="yellowStatusBar">placeHolder</div>
//     //     </div>`;
//     // } else if (healthbar <= 2) {
//     //     document.getElementById('catHead').innerHTML = '';
//     //     document.getElementById('catHead').innerHTML = `
//     //     <div id="redAnim">
//     //     <img id="redHead" src="../img/katzenStatusKöpfe/redHead.png" alt="">
//     //     <div id="redStatusBarRight">brows</div>
//     //     <div id="redStatusBarLeft">brows</div>
//     //     </div>`;
//     // }

//     if (healthbar >= 5) {
//         document.getElementById('catHead').innerHTML = '';
//         document.getElementById('catHead').innerHTML = `<img id="greenHead" src="../img/katzenStatusKöpfe/greenHead.png">`;
//     } else if (healthbar < 5 && healthbar >= 3) {
//         document.getElementById('catHead').innerHTML = '';
//         document.getElementById('catHead').innerHTML = `<img id="yellowHead" src="../img/katzenStatusKöpfe/yellowHead.png">`;
//     } else if (healthbar <= 2) {
//         document.getElementById('catHead').innerHTML = '';
//         document.getElementById('catHead').innerHTML = `<img id="redHead" src="../img/katzenStatusKöpfe/redHead.png">`;
//     }
// }

// Healthbar-Logik dynamisch
// function statusHead() {
//     let healthbar = 8;

//     // Nur abziehen, wenn kein Eintrag in den letzten 24h
//     if (!eintragHeute) {
//         healthbar--;
//     }

//     // Update Head je nach Healthbar
//     const catHead = document.getElementById('catHead');
//     catHead.innerHTML = '';

//     if (healthbar >= 5) {
//         catHead.innerHTML = `<img id="greenHead" src="../img/katzenStatusKöpfe/greenHead.png">`;
//     } else if (healthbar < 5 && healthbar >= 3) {
//         catHead.innerHTML = `<img id="yellowHead" src="../img/katzenStatusKöpfe/yellowHead.png">`;
//     } else {
//         catHead.innerHTML = `<img id="redHead" src="../img/katzenStatusKöpfe/redHead.png">`;
//     }
// }

// Direkt ausführen, wenn Seite lädt
// window.addEventListener('DOMContentLoaded', statusHead);


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