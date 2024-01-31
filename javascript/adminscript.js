function loadUserliste() {
  setInterval(function(){
  showUserliste();
},1000);
}

function showUserliste() {
  var hr = new XMLHttpRequest();
  var url = "Userliste.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("AdminMainFrameleftfunctionUserliste").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadUserlisteFunktion() {
  setInterval(function(){
  showUserlisteFunktion();
},1000);
}

function showUserlisteFunktion() {
  var hr = new XMLHttpRequest();
  var url = "UserlisteFunktionen.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("AdminMainFrameleftfunctionchatUser").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadFilterliste() {
  setInterval(function(){
  showFilterliste();
},1000);
}

function showFilterliste() {
  var hr = new XMLHttpRequest();
  var url = "FilterAuflistung.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("Filterauflistung1").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadSmileliste() {
  setInterval(function(){
  showSmileliste();
},1000);
}

function showSmileliste() {
  var hr = new XMLHttpRequest();
  var url = "SmileAuflistung.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("Smileauflistung").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadChatStatistiken() {
  setInterval(function(){
  showChatStatistiken();
},1000);
}

function showChatStatistiken() {
  var hr = new XMLHttpRequest();
  var url = "AdminChatStatistik.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("AdminMainFrameleftfunctionchatStatistiken").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadTest() {
  setInterval(function(){
  showTest();
},1000);
}

function showTest() {
  var hr = new XMLHttpRequest();
  var url = "Test.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("test").innerHTML = return_data;
    }
  }
  hr.send();
}
