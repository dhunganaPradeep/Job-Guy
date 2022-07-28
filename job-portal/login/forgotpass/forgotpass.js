// email validation
document.getElementById("email").onblur = validateEmail;

function validateEmail() {
  var email = document.getElementById("email").value;
  if (email == "") {
    alert("Email cannot be empty");
    return false;
  }
  else {
    var pos = email.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
    if (pos == -1) {
      alert("Email is not valid");
      return false;
    } else {
      return true;
    }
  }
}