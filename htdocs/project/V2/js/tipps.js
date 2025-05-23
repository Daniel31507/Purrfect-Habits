function getUserID() {
    fetch("../api/getUserID.php")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            getUserHabitID(data.userID);
        })
        .catch((error) => {
            console.error("Fehler beim Abrufen der Habit-ID:", error);
        });
}
getUserID();


function getUserHabitID(userID) {
    fetch(`../api/getUserData.php?uid=${userID}`)
        .then((response) => response.json())
        .then((data) => {
            loadTipsForHabit(data.habitID[0].habitID);
        })
        .catch((error) => {
            console.error("Fehler beim Abrufen der Habit-ID:", error);
        });
}


let tips = [];
function loadTipsForHabit(habitId) {
    fetch(`../api/getHabitTips.php?habitID=${habitId}`)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            tips = data.tips;
            showTipp();
        })
        .catch((err) => console.error("Fehler beim Laden der habits", err));
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

function arrowButton() {
    window.location.href = "../php/Hauptseite.php";
}


function showTipp() {

    const randomTip = tips[Math.floor(Math.random() * tips.length)];
    document.getElementById("bubble").innerHTML = randomTip;
}


