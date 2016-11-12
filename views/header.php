<?php
$page = $page ?? 'profile';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=isset($title) ? $title . ' | ' :  ''?>Milega</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon" />
    <link href="/assets/css/normalize.css" rel="stylesheet" />
    <link href="/assets/css/style.css" rel="stylesheet" />
    <link href="/assets/css/form.css" rel="stylesheet" />
    <? if(isset($assets)){
      foreach ($assets as $asset) {
        echo $asset;
      }
    }?>
    <script type="text/javascript" src="/assets/js/functions.js"></script>
  </head>
  <body>
<header>
  <nav class="nav">
    <ul>
      <? if(Flight::has('user')) : ?>
      <li class="<?=$page === 'profile' ? 'selected' : ''?>"><a href="/profile"><?=Localization::get('PROFILE')?></a></li>
      <li class="<?=$page === 'material' ? 'selected' : ''?>"><a href="/material"><?=Localization::get('MATERIAL')?></a></li>
      <li class="<?=$page === 'attachments' ? 'selected' : ''?>"><a href="/attachments"><?=Localization::get('ATTACHMENTS')?></a></li>
      <li><a href="/logout"><?=Localization::get('LOGOUT')?></a></li>
      <? endif; ?>
      <? if($page === 'login') :?>
      <li class="selected"><a href="/login"><?=Localization::get('LOGIN')?></a></li>
      <? endif; ?>
      <? if($page === 'register') :?>
      <li class="selected"><a href="/register"><?=Localization::get('REGISTER')?></a></li>
      <? endif; ?>

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

<div class="sub-header">
  <div class="content">
<? if(isset($subHeader)): ?>

    <? foreach ($subHeader as $title => $arr) : ?>
    <div class="sub-header-item<?=$arr['selected'] ? ' selected' : ''?>">
      <a href="<?=$arr['url']?>"><?=$title?></a>
    </div>
    <? endforeach; ?>
<? endif; ?>
  </div>
</div>

<div class="content-wrapper">
