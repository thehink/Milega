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

  //let saveButton = document.getElementsByClassName('saveButton');
  let textid = document.getElementById(textareaId);
  let buttonid = document.getElementById(buttonId);

  if (textid.style.height != '400px') {
    textid.style.height = '400px';
    buttonid.style.display= 'block';
  }
}


function closeTextarea(textareaId, buttonId){
  //let saveButton = document.getElementsByClassName('saveButton');
  let textid = document.getElementById(textareaId);
  let buttonid = document.getElementById(buttonId);

  if(textid.style.height != '120px') {
    textid.style.height = '120px';
    buttonid.style.display= 'none';
  }
}
