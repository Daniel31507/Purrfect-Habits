printAllNotes();

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


function printAllNotes() {
    let leftPage = document.getElementById("leftPage");
    leftPage.innerHTML = "<h1 class='pageHeadline'>Überschrift</h1>";

    fetch("../api/mappe.php")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data.notes && Array.isArray(data.notes)) {
                data.notes.forEach((note) => {
                    let noteDiv = document.createElement("div");
                    noteDiv.className = "noteBox";
                    noteDiv.innerText = note;
                    leftPage.appendChild(noteDiv);
                });
            } else {
                leftPage.innerHTML = "<p>Keine Notizen gefunden.</p>";
            }
        })
        .catch((error) => {
            console.error("Fehler beim Laden der Notizen:", error);
            leftPage.innerHTML = "<p>Fehler beim Laden der Notizen.</p>";
        });
}
