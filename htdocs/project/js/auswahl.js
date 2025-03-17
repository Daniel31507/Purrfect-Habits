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
                    <h1>${habit.icon} ${habit.name}</h1>
                </div>
                `;
            }

            document.getElementById("boxes").innerHTML = html;
        }
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });
}
getAllHabits();
