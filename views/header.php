<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Milega</title>
    <link href="./assets/css/normalize.css" rel="stylesheet" />
    <link href="./assets/css/style.css" rel="stylesheet" />
  </head>
  <body>
<header>
  <nav class="nav">
  <img src="./assets/images/milegalogo.png" alt="Logotype" />
    <ul>
      <li><a href="/">Kursmaterial</a></li>
      <li><a href="/">Tester</a></li>
      <li><a href="/">Föreläsningar</a></li>
      <li><a onclick="showLogin()">Login</a></li>
    </ul>
    <div class="login" style="display: none">
      <span>Login</span>
      <div class="login-wrapper">
        <form class="login-form" action="/login" method="POST">
          <input type="email" name="email" placeholder="Din email" />
          <input type="password" name="password" placeholder="Lösenord"/>
          <input type="submit" value="Logga in">
        </form>
      </div>
    </div>
  </nav>
</header>
