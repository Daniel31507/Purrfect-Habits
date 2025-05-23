let habitID;

function getUserHabitID() {
    fetch("../api/userInfo.php")
        .then((response) => response.json())
        .then((data) => {
            if (data.loggedIn && data.habitIds.length > 0) {
                habitID = data.habitIds[0];
                console.log("Aktuelle Habit-ID:", habitID);

                // Jetzt kannst du basierend darauf z. B. Tipps laden:
                loadTipsForHabit(habitID);
            }
        })
        .catch((error) => {
            console.error("Fehler beim Abrufen der Habit-ID:", error);
        });
}

function loadTipsForHabit(habitId) {
    fetch("../data/habits.json")
        .then((response) => response.json())
        .then((data) => {
            const habit = data.habits.find(h => h.id === habitId);
            if (habit) {
                console.log("Tipps für Habit:", habit.name);
                console.log("Tipps:", habit.tips);
                document.getElementById('h1H').innerHTML = `${habit.name}`
                document.getElementById('rightPage').innerHTML = `<p id='habitDescription'>${habit.noteTexts}</p>`
                // Du kannst die Tipps hier z.B. dynamisch einfügen oder verwenden
            } else {
                console.warn("Kein Habit mit dieser ID gefunden.");
            }
        })
        .catch((err) => console.error("Fehler beim Laden der habits.json:", err));
}


getUserHabitID();



function addNotePopUp() {
    document.getElementById("popUpBack").style.display = "flex";
}

function closePopUp() {
    document.getElementById("popUpBack").style.display = "none";

}

function addNote() {
    let note = document.getElementById("noteInput").value;

    if (note == "") {
        alert("Falscher Input")
    } else {

        let formData = new FormData();
        formData.append('note', note);

        let fetch_URL = '../api/mappe.php';
        let fetch_CONFIG = {
            method: "POST",
            body: formData
        }

        fetch(fetch_URL, fetch_CONFIG)
            .then((response) => { return response.json(); })
            .then((data) => {
                console.log(data);

                if (data.code == 200) {
                    console.log("Erfolgreich hinzugefügt")
                    printAllNotes();
                } else {
                    alert("Fehler beim hinzufügen der Notiz");
                }
            })
            .catch((error) => {
                console.error('Fetch error:', error);
            });



    }
}

printAllNotes();
function printAllNotes() {
    let leftPage = document.getElementById("leftPage");
    leftPage.innerHTML = "<h1 id='h1H' class='pageHeadline'></h1>";

    fetch("../api/mappe.php")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data.usernotes && Array.isArray(data.usernotes)) {
                let currentUserId = 1;

                let userEntry = data.usernotes.find(u => u.userid === currentUserId);

                if (userEntry && Array.isArray(userEntry.notes) && userEntry.notes.length > 0) {
                    userEntry.notes.forEach((note) => {
                        let noteDiv = document.createElement("div");
                        noteDiv.className = "noteBox";
                        noteDiv.innerText = note;
                        leftPage.appendChild(noteDiv);
                    });
                } else {
                    leftPage.innerHTML = "<p>Keine Notizen gefunden.</p>";
                }
            } else {
                leftPage.innerHTML = "<p>Keine Notizen gefunden.</p>";
            }
        })
        .catch((error) => {
            console.error("Fehler beim Laden der Notizen:", error);
            leftPage.innerHTML = "<p>Fehler beim Laden der Notizen.</p>";
        });
}
