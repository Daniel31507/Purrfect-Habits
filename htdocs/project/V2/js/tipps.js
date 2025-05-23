let habitID;
let habitName;
// function getUserHabitID() {
//     fetch("../api/userInfo.php")
//         .then((response) => response.json())
//         .then((data) => {
//             if (data.loggedIn && data.habitIds.length > 0) {
//                 habitID = data.habitIds[0];
//                 console.log("Aktuelle Habit-ID:", habitID);

//                 // Jetzt kannst du basierend darauf z. B. Tipps laden:
//                 loadTipsForHabit(habitID);
//                 showTipp();

//             }
//         })
//         .catch((error) => {
//             console.error("Fehler beim Abrufen der Habit-ID:", error);
//         });
// }



// getUserHabitID();

// function loadTipsForHabit(habitId) {
//     fetch("../data/habits.json")
//         .then((response) => response.json())
//         .then((data) => {
//             const habit = data.habits.find(h => h.id === habitId);
//             if (habit) {
//                 console.log("Tipps für Habit:", habit.name);
//                 console.log("Tipps:", habit.tips);
//                 habitName = habit.name;

//                 // Du kannst die Tipps hier z.B. dynamisch einfügen oder verwenden
//             } else {
//                 console.warn("Kein Habit mit dieser ID gefunden.");
//             }
//         })
//         .catch((err) => console.error("Fehler beim Laden der habits.json:", err));
// }


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


// function showTipp() {
//     fetch('../data/habits.json')
//     .then(response => response.json())
//     .then(data => {
//         const selectedHabit = habitName;
//         const habit = data.habits.find(h => h.name == selectedHabit);
        
//         if (habit) {
//             const randomTip = habit.tips[Math.floor(Math.random() * habit.tips.length)];
//             document.getElementById("bubble").innerHTML = randomTip;
//         } else {
//             document.getElementById("bubble").innerHTML = "Kein Tipp verfügbar.";
//         }
//     })
//     .catch(error => console.error(error));
// }


