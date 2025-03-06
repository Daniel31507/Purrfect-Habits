

function getAllHabits() {
    fetch('./api/getHabits.php')
    .then((response) => { return response.json(); })
    .then((data) => {
        console.log(data);

       
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });
}
getAllHabits();