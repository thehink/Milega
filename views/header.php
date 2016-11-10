<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Milega</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon" />
    <link href="./assets/css/normalize.css" rel="stylesheet" />
    <link href="./assets/css/style.css" rel="stylesheet" />
    <link href="./assets/css/form.css" rel="stylesheet" />
    <script type="text/javascript" src="/assets/js/functions.js"></script>
  </head>
  <body>
<header>
  <nav class="nav">
  <img src="./assets/images/milegalogo.png" alt="Logotype" />
    <ul>
      <li><a href="/">Kursmaterial</a></li>
      <li><a href="/">Tester</a></li>
      <li><a href="/">Föreläsningar</a></li>
      <li><a onclick="showLogin()" style="cursor: pointer">Logga in</a></li>
    </ul>
  </nav>

  <div id="login">
      <form class="login-form" action="/login" method="POST">
        <input type="email" class="loginRow" name="email" placeholder="Din email" />
        <input type="password" class="loginRow" name="password" placeholder="Lösenord"/>
        <input type="checkbox" name="remember" id="rememberCheckbox">
        <label for="rememberCheckbox" style="font-size: 12px">Kom ihåg mig</label>
        <input type="submit" id="loginButton" value="Logga in">
      </form>
  </div>
</header>

<div class="content-wrapper">
