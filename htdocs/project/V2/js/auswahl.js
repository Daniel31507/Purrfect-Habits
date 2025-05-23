let userID;
let habitID;

function getAllHabits() {
    fetch('../api/getHabits.php')
        .then((response) => response.json())
        .then((data) => {
            if (data.code == 200) {
                let html = "";
                for (let i = 0; i < data.habits.length; i++) {
                    let habit = data.habits[i];
                    html += `
                    <div class="habitBox">
                        <input type="radio" onclick="show(${i + 1})" id="habit_${i}" name="habit_selection" value="${habit.name}">
                        <label for="habit_${i}">${habit.icon} ${habit.name}</label>
                    </div>`;
                }
                document.getElementById("boxes").innerHTML = html;
            }
        })
        .catch((error) => {
            console.error('Fetch error:', error);
        });
}
getAllHabits();

function show(habit) {
    fetch(`../api/getHabits.php?habitID=${habit}`)
        .then((response) => response.json())
        .then((data) => {
            let html = "";
            
            if (data.code == 200) {
                habitID = data.habits.ID;

                html = `
                <div class="icon">
                    <img src="${data.habits.mainIcon_path}">
                </div>`;
            }            

            document.getElementById("iconBox").innerHTML = html;
        })
        .catch((error) => {
            console.error("Fetch error:", error);
        });
}


function getUserId(){
    fetch(`../api/getUserID.php`)
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            userID = data.userID;   
        })
        .catch((error) => {
            console.error("Fetch error:", error);
        });
}
getUserId();


function saveHabit() {
    if(userID != 0 || habitID != 0) {
        console.log(userID);
        console.log(habitID);
    let userData = new FormData();
    userData.append('userID', userID);
    userData.append('habitID', habitID);

    let fetch_URL = `../api/setHabit.php`;
    let fetch_CONFIG = {
        method: "POST",
        body: userData
    }

    fetch(fetch_URL, fetch_CONFIG)
        .then((response) => response.json())
        .then((data) => {

            console.log(data);

            if(data.code == 200){
                window.location.href = '../php/Hauptseite.php';
            }
            
        })
        .catch((error) => {
            console.error("Fetch error:", error);
        });
    }
}