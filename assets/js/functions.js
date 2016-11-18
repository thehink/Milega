/*function showLogin() {
  let login = document.getElementById('login');
  if (login.style.display != "block") {
    login.style.display = "block";
  } else {
    login.style.display = "none";
  }
}*/
'use strict';

function showTextarea(textareaId, buttonId){

  let textid = document.getElementById(textareaId);
  let buttonid = document.getElementById(buttonId);

  if (textid.style.height != '250px') {
    textid.style.height = '250px';
    buttonid.style.display= 'block';
    textid.removeAttribute('disabled');
  }
}


function closeTextarea(textareaId, buttonId){

  let textid = document.getElementById(textareaId);
  let buttonid = document.getElementById(buttonId);

  if(textid.style.height != '120px') {
    textid.style.height = '120px';
    buttonid.style.display= 'none';
    textid.setAttribute('disabled', 'true');
  }
}
