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
                    // printAllNotes();
                    console.log("Erfolgreich hinzugefügt")
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

}