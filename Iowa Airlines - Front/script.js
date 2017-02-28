document.getElementById("foot01").innerHTML =
    '<p>&copy;  ' + new Date().getFullYear() + ' FSE - Team Seven. All rights reserved.</p>';

document.getElementById("nav01").innerHTML = "<ul id='menu'>" + "<li><a href='index.html'>Home</a></li>" + "<li><a href='about.html'>About Us</a></li>" + "<li><a href='map.html'>Map</a></li>" + "<li><a href='plan.html'>Book a Trip</a></li>" + "</ul>";

/*
function login_validation() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var attempt = 3;

    //Bug: does not loop properly (after 1st incorrect try, displays attempt # correctly, but not after 2nd
    //     incorrect try)
    if(username == "tester" && password == "1213"){
        alert("Login successful!");
        return false;
    } else {
        attempt--;
        alert("Login unsuccessful.You have " +attempt+ " attempts left.");
    }
}

function find_user(){
    
}

// just gather data from user -- java will do the logic 
// next meeting - cost estimation (come prepared with documents)

STEP 1: Use the functions username_okay and password_okay to check whether the username and password respect the
          constraints
  STEP 2: Use the find_user function to obtain a node to the linked list 
          If the node returned by find_user is not null that means the user already exists
	      In which case print the error message "Error: User already exists\n" and return ERROR  

function register_user() {
    
}

function change_user_password(){
    
}

//redirect function (map --> book trip?)
function load(url){
    location.href = url;
}*/


