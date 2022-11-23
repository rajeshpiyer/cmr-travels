function contactFormFun() {

  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;
  sendContactMailFun(name,email,message)
}
