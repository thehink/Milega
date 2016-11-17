/*function showLogin() {
  let login = document.getElementById('login');
  if (login.style.display != "block") {
    login.style.display = "block";
  } else {
    login.style.display = "none";
  }
}*/

function showTextarea(id){

  let saveButton = document.getElementsByClassName('saveButton');
  let textid = document.getElementById(id);

  if (textid.style.height != '400px') {
    textid.style.height = '400px';

    for (let i = 0; i < saveButton.length; i++) {
      saveButton[i].style.display= 'block';

    }
  }
}


function closeTextarea(id){
  let saveButton = document.getElementsByClassName('saveButton');
  let textid = document.getElementById(id);

  if(textid.style.height != '120px') {
    textid.style.height = '120px';
    for (let i = 0; i < saveButton.length; i++) {
      saveButton[i].style.display= 'none';

    }
  }
}
