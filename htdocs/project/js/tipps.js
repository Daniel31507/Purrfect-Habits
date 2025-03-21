function getCurrentTimeAndDay() {
    const now = new Date();

    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');

    const weekdays = ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"];
    const weekday = weekdays[now.getDay()];

    return `${weekday} ${hours}:${minutes} Uhr`; 
}


setInterval(function() {
    document.getElementById('datum').innerHTML = getCurrentTimeAndDay();
}, 1000);


function arrowButton(){
    window.location.href = "../html/Hauptseite.php";
}