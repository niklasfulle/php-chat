function loadFreunde() {
  setInterval(function(){
  showFreunde();
},3000);
}

function showFreunde() {
  var hr = new XMLHttpRequest();
  var url = "Freunde.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("ProfilFreundeliste1").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadFreundschaftsanfragebekommen() {
  setInterval(function(){
  showFreundschaftsanfragebekommen();
},2000);
}

function showFreundschaftsanfragebekommen() {
  var hr = new XMLHttpRequest();
  var url = "Freunschaftsanfragenbekommen.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("ProfilFreundeAnfragebekommen1").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadFreundschaftsanfragegeschickt() {
  setInterval(function(){
  showFreundschaftsanfragegeschickt();
},2000);
}

function showFreundschaftsanfragegeschickt() {
  var hr = new XMLHttpRequest();
  var url = "Freunsdschaftsanfragengeschickt.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("ProfilFreundeAnfragegechickt1").innerHTML = return_data;
    }
  }
  hr.send();
}
