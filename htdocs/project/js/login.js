let html;

function start(id) {
    if (id == 1) {
        html = `
         <div id="input1">
               <input type="text" id="name" placeholder="Enter your Name">
            </div>
            <div id="input2">
                <input type="text" id="pwd" placeholder="Enter your Password">
            </div>
        
        
            <div id="options">
                <div id="opt1">
                <p>Login</p>
                </div>

                <div id="opt2" onclick="returnClicked()">
                <p> Return </p> 
                </div>
            </div>
        `

        document.getElementById('logregBox').innerHTML = html;
    } else if(id == 2) {
  
            html = `
    
             <div id="input1">
                   <input type="text" id="name" placeholder="Enter your Name">
                </div>
                <div id="input2">
                    <input type="text" id="pwd" placeholder="Enter your Password">
                </div>
            
            
                <div id="options">
                    <div id="opt1">
                    <p>Register</p>
                    </div>
    
                    <div id="opt2" onclick="returnClicked()">
                    <p> Return </p> 
                    </div>
                </div>
            `
    
            document.getElementById('logregBox').innerHTML = html;
        
    }

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

    document.getElementById('logregBox').innerHTML = html;
}
