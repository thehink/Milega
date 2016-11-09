<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Milega</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon" />
    <link href="./assets/css/normalize.css" rel="stylesheet" />
    <link href="./assets/css/style.css" rel="stylesheet" />
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
      <li><a onclick="showLogin()" style="cursor: pointer">Login</a></li>
    </ul>
  </nav>

  <div class="login" id="login">
      <form class="login-form" action="/login" method="POST">
        <input type="email" name="email" placeholder="Din email" />
        <input type="password" name="password" placeholder="Lösenord"/>
        <input type="submit" value="Logga in">
      </form>
  </div>
</header>

<div class="content-wrapper">
