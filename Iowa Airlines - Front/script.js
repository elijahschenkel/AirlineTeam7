document.getElementById("foot01").innerHTML =
    '<p>&copy;  ' + new Date().getFullYear() + ' FSE - Team Seven. All rights reserved.</p>';

document.getElementById("nav01").innerHTML = "<ul id='menu'>" + "<li><a href='index.html'>Home</a></li>" + "<li><a href='about.html'>About Us</a></li>" + "<li><a href='map.html'>Map</a></li>" + "<li><a href='plan.html'>Book a Trip</a></li>" + "</ul>";

function login_validation() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var attempt = 3;

    if(username == "tester" && password == "1213"){
        alert("Login successful!");
        return false;
    } else {
        attempt--;
        alert("Login unsuccessful.You have " +attempt+ " attempts left.");
    }
}

//redirect function (map --> book trip?)
function load(url){
    location.href = url;
}

