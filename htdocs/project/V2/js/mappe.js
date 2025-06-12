

let userID;
let habitID;
let habitName;

function getUserID() {
    fetch("../api/getUserID.php")
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.userID !== 0) {
                userID = data.userID;
                getHabitName(userID);
                getUserHabitID(userID);
            }
        })
        .catch(error => {
            console.error("Fehler beim Abrufen der User-ID:", error);
        });
}
getUserID();


function getHabitName(userID) {
    fetch(`../api/getHabitTitle.php?userID=${userID}`)
        .then(response => response.json())
        .then(data => {
            if (data.code === 200) {
                console.log("Habit-Name:", data.habitName);
                habitName = data.habitName;
            }
        })
        .catch(error => {
            console.error("Fehler beim Abrufen des Habits:", error);
        });
}


function getUserHabitID(userID) {
    fetch(`../api/getUserData.php?uid=${userID}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.code === 200) {
                habitID = data.habitID[0].habitID;
                printAllNotes();
                loadInfosForHabit(habitID);
            }
        })
        .catch(error => {
            console.error("Fehler beim Abrufen der Habit-ID:", error);
        });
}

function openPopUp() {
    document.getElementById("popUpBack").style.display = "flex";
}

function closePopUp() {
    document.getElementById("popUpBack").style.display = "none";
}function addNote() {
    if (userID !== 0) {
        let note = document.getElementById("noteInput").value;

        if (note !== "") {
            let formData = new FormData();
            formData.append('entry', note);
            formData.append('userID', userID);

            // Vollständiges Datum: YYYY-MM-DD
            let now = new Date();
            let year = now.getFullYear();
            let month = String(now.getMonth() + 1).padStart(2, '0');
            let day = String(now.getDate()).padStart(2, '0');
            let createdAt = `${year}-${month}-${day}`;
            formData.append('created_at', createdAt);

            fetch('../api/setEntry.php', {
                method: "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.code === 200) {
                        document.getElementById("popUpBack").style.display = "none";
                        console.log("Erfolgreich hinzugefügt");
                        printAllNotes();
                    } else {
                        alert("Fehler beim Hinzufügen der Notiz");
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
        } else {
            alert("Notizfeld ist leer.");
        }
    } else {
        console.log("Nicht angemeldet");
    }
}
    

function printAllNotes() {
    let formData = new FormData();
    formData.append('userID', userID);
    let leftPage = document.getElementById("leftPage");

    fetch('../api/getEntries.php', {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);


            let html = `<h1 id='h1H' class='pageHeadline'>${habitName}</h1>`;

            if (data.code == 200) {
                for (let i = 0; i < data.entry.length; i++) {
                    html += `
                    <div class="noteBox">
                        ${data.entry[i]}
                    </div>`;
                }


            }
            leftPage.innerHTML = html;
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
}

let note;
function loadInfosForHabit(habitId) {
    fetch(`../api/getHabits.php?habitID=${habitId}`)
        .then((response) => response.json())
        .then((data) => {
            console.log("Habits:", data);
            note = data.habits.info;
            showTipp();
        })
        .catch((err) => console.error("Fehler beim Laden der habits", err));
}

function showTipp() {
    document.getElementById("rightPage").innerHTML = `<h1> ${note} </h1>`;
}
