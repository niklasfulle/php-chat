
function events(){
  document.getElementById("chatfeld")
      .addEventListener("keyup", function(event) {
      event.preventDefault();
      if (event.keyCode == 13) {
          document.getElementById("chatsubmit").click();
      }
  });
loadChat();

}
