// creating starting form
function form () {
  let email = document.getElementById('app');
  email.innerHTML = `<form>
  <input id="userEmail" type="email">
  <div id="submit" class="button">Prenumeruoti</div>
  </form>`;
}
form();

let send = document.getElementById('submit');

send.addEventListener("click", function(){
    let userEmail = document.getElementById('userEmail').value;
    // fecthing data to php
    fetch("http://localhost/newsletter/emails.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
      },
      body: `useremail=${userEmail}`,
    })
    .then((response) => response.text())
    .then((res) => (document.getElementById("app").innerHTML = res));
  })