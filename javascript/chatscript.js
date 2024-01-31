function ajax_post(){
    var hr = new XMLHttpRequest();
    var url = "class_Chat.php";
    var nachricht = document.getElementById("chatfeld").value;
    var typ = document.getElementById("chatoptionenselect").value;
    var vars = "msg="+nachricht+"&typ="+typ;

    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
      document.getElementById("chat").innerHTML = return_data;
      }
    }
    hr.send(vars);
    //var snd = new Audio('../chat/sounds/msn.mp3');
    //snd.play();
    document.getElementById("msg").value = "";
  }


  function Scroll1() {
      var obj = document.getElementById("PrivatChatMainChat1");
      obj.scrollBottom = obj.scrollHeight;
  }


function loadChat() {
  setInterval(function(){
  showChat();
},1000);
}

function showChat() {
  var hr = new XMLHttpRequest();
  var url = "Generieren.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("chat").innerHTML = return_data;
    }
  }
    hr.send();
}

function loadPrivatChat1() {
  setInterval(function(){
  showPrivatChat1();
},1000);
}

function showPrivatChat1() {
  var hr = new XMLHttpRequest();
  var url = "GenerierenPrivat1.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("PrivatChatMainChat1").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadPrivatChat2() {
  setInterval(function(){
  showPrivatChat2();
},1000);
}

function showPrivatChat2() {
  var hr = new XMLHttpRequest();
  var url = "GenerierenPrivat2.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("PrivatChatMainChat2").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadPrivatChat3() {
  setInterval(function(){
  showPrivatChat3();
},1000);
}

function showPrivatChat3() {
  var hr = new XMLHttpRequest();
  var url = "GenerierenPrivat3.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("PrivatChatMainChat3").innerHTML = return_data;
    }
  }
  hr.send();
}

function loadPrivatChat4() {
  setInterval(function(){
  showPrivatChat4();
},1000);
}

function showPrivatChat4() {
  var hr = new XMLHttpRequest();
  var url = "GenerierenPrivat4.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("PrivatChatMainChat4").innerHTML = return_data;
    }
  }
  hr.send();
}

function showPrivatChatFrame1() {
  var hr = new XMLHttpRequest();
  var url = "Privatchat1.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("PrivatChatFrame1index").innerHTML = return_data;
    }
  }
  hr.send();

}

function showPrivatChatFrame2() {
  var hr = new XMLHttpRequest();
  var url = "Privatchat2.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("PrivatChatFrame2index").innerHTML = return_data;
    }
  }
  hr.send();

}

function showPrivatChatFrame3() {
  var hr = new XMLHttpRequest();
  var url = "Privatchat3.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("PrivatChatFrame3index").innerHTML = return_data;
    }
  }
  hr.send();

}

function showPrivatChatFrame4() {
  var hr = new XMLHttpRequest();
  var url = "Privatchat4.php";
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
    document.getElementById("PrivatChatFrame4index").innerHTML = return_data;
    }
  }
  hr.send();

}

function ajax_post(){
    var hr = new XMLHttpRequest();
    var url = "send.php";
    var fn = document.getElementById("msg").value;
    var vars = "msg="+fn;

    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
      document.getElementById("chat").innerHTML = return_data;
      }
    }
    hr.send(vars);
    //var snd = new Audio('../chat/sounds/msn.mp3');
    //snd.play();
    document.getElementById("msg").value = "";
  }

  function eventschat(){
    document.getElementById("chatfeld")
        .addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode == 13) {
            document.getElementById("chatsubmit").click();
        }
    });
  }


window.addEventListener("load", showPrivatChatFrame1);
window.addEventListener("load", showPrivatChatFrame2);
window.addEventListener("load", showPrivatChatFrame3);
window.addEventListener("load", showPrivatChatFrame4);
