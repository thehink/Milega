/*function showLogin() {
  let login = document.getElementById('login');
  if (login.style.display != "block") {
    login.style.display = "block";
  } else {
    login.style.display = "none";
  }
}*/
'use strict';

function onLoad(){
  document.querySelector('.hamburger').addEventListener('click', event => {
    event.preventDefault();
    toggleMenu();
  });

  document.addEventListener('scroll', event => {
    const element = document.querySelector('.jti-result .stats');
    if(!element || window.innerWidth < 610){
      return;
    }

    const height = 230;

    window.requestAnimationFrame(() => {
      const deltaHeight = window.scrollY - height;
      if(deltaHeight > 0){
        element.style.marginTop = `${deltaHeight}px`;
      }else{
        element.style.marginTop = `0px`;
      }
    });


  });
}

function showTextarea(textareaId, buttonId){

  let textid = document.getElementById(textareaId);
  let buttonid = document.getElementById(buttonId);

  if (textid.style.height != '250px') {
    textid.style.height = '250px';
    buttonid.style.display= 'inline-block';
    textid.removeAttribute('disabled');
    textid.focus();
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
    body: JSON.stringify({id: id, text:text}),
    mode: 'cors',
    credentials: 'include',
    headers: new Headers({
  		'Content-Type': 'application/json'
  	})
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

function toggleMenu(){
  document.querySelector('.nav > ul').classList.toggle('show');
}

document.addEventListener('DOMContentLoaded', onLoad, false);
