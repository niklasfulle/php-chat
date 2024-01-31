function loadUserStatistik() {
  setInterval(function(){
  showUserStatistik();
},1000);
}

function showUserStatistik() {
  var hr = new XMLHttpRequest();
  var url = "UserStatistiken.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("UserProfil2").innerHTML = return_data;
    }
  }
  hr.send();
}
