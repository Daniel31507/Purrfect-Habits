let html;

function start(id) {
    if (id == 1) {
        html = `
         <div id="input1">
               <input type="text" id="name" placeholder="Name">
            </div>
            <div id="input2">
                <input type="text" id="pwd" placeholder="Passwort">
            </div>
        
        
            <div id="options">
                <div id="opt1" onclick="login()">
                <p>Login</p>
                </div>

                <div id="opt2" onclick="returnClicked()">
                <p> Zurück </p> 
                </div>
            </div>
        `

        document.getElementById('logregBox').innerHTML = html;
    } else if(id == 2) {
  
            html = `
    
             <div id="input1">
                   <input type="text" id="name" placeholder="Name">
                </div>
                <div id="input2">
                    <input type="text" id="pwd" placeholder="Passwort">
                </div>
            
            
                <div id="options">
                    <div id="opt1">
                    <p>Registrieren</p>
                    </div>
    
                    <div id="opt2" onclick="returnClicked()">
                    <p> Zurück </p> 
                    </div>
                </div>
            `
    
            document.getElementById('logregBox').innerHTML = html;
 
    }
    document.getElementById('logregBox').style.height = '55vh';
}

function returnClicked() {
    html = `
            <div id="imgBox">
                <img src="../img/katze.png">
            </div>

            <div id="login" onclick="start(1)">
                <p>Login</p>
            </div>
    
            <div id="register" onclick="start(2)">
                <p>Registrieren</p>
            </div>
    
    `
    document.getElementById('logregBox').style.height = '62.5vh';
    document.getElementById('logregBox').innerHTML = html;
}



function login() {
        let user = document.querySelector('#name').value;
        let pw = document.querySelector('#pwd').value;
    
        if (user != '' && pw != '') {
            let formData = new FormData();
            formData.append('user', user);
            formData.append('password', pw);
    
            let fetch_URL = '../api/login.php';
            let fetch_CONFIG = {
                method: "POST",
                body: formData
            }
    
            fetch(fetch_URL, fetch_CONFIG)
                .then((response) => { return response.json(); })
                .then((data) => {
                    console.log(data);
    
                    if (data.code == 200) {
                       window.location.href = '../html/Main.html'
                    } else {
                        alert("Falsche Anmeldedaten");
                    }
                })
                .catch((error) => {
                    console.error('Fetch error:', error);
                });
        } else {
            console.log('Fehler');
        }
    }