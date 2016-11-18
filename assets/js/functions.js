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

  if (textid.style.height != '400px') {
    textid.style.height = '400px';
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

  const id = parseInt(textid.id.replace('text',''));
  const text = textid.value;


  fetch('/course/answer', {
    method: 'POST',
    body: JSON.stringify({id: id, text:text})
  })
    .then(response => {
      if(response.status === 200) return response.json();
        else throw new Error('Something went wrong!');
    })
    .then(json => {

    })
    .catch(error => {

    });

}
