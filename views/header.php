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
    <ul>
      <li><a href="/profile"><?=Localization::get('PROFILE')?></a></li>
      <li><a href="/"><?=Localization::get('MATERIAL')?></a></li>
      <li><a href="/"><?=Localization::get('ATTATCHMENTS')?></a></li>
    </ul>
    <a href="/"><img src="./assets/images/milegalogo.png" alt="Logotype" /></a>
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

<? if(isset($subHeader)): ?>
<div class="sub-header">
  <div class="content">
    <? foreach ($subHeader as $title => $arr) : ?>
    <div class="sub-header-item<?=$arr['selected'] ? ' selected' : ''?>">
      <a href="<?=$arr['url']?>"><?=$title?></a>
    </div>
    <? endforeach; ?>
  </div>
</div>
<? endif; ?>

<div class="content-wrapper">
