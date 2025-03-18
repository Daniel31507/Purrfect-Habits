function getAllHabits() {
    fetch('../api/getHabits.php')
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data.code == 200) {
                let html = "";
                for (let i = 0; i < data.habits.length; i++) {
                    let habit = data.habits[i];
                    html += `
                    <div class="habitBox">
                        <input type="radio" onclick="show(${i})" id="habit_${i}" name="habit_selection" value="${habit.name}">
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
    fetch(`../api/getHabits.php?id=${habit}`)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            
            let html = "";
            
            if (data.code == 200 && data.habits.length > 0) {
                html = `
                <div class="icon">
                    <img src="${data.habits[habit].mainIcon}"> <!-- Zugriff auf das erste Element -->
                </div>`;
            }

            document.getElementById("iconBox").innerHTML = html;
        })
        .catch((error) => {
            console.error("Fetch error:", error);
            document.getElementById("iconBox").innerHTML = "<p>Fehler beim Laden.</p>";
        });
}


