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
    window.location.href = "../html/Hauptseite.php";
}

showTipp();

function showTipp() {
    fetch('../data/habits.json')
    .then(response => response.json())
    .then(data => {
        const selectedHabit = "Schlafmangel";
        const habit = data.habits.find(h => h.name === selectedHabit);
        
        if (habit) {
            const randomTip = habit.tips[Math.floor(Math.random() * habit.tips.length)];
            document.getElementById("bubble").innerHTML = randomTip;
        } else {
            document.getElementById("bubble").innerHTML = "Kein Tipp verfügbar.";
        }
    })
    .catch(error => console.error("Fehler beim Laden der Tipps:", error));
}


