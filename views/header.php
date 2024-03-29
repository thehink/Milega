<?php
$page = $page ?? 'profile';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=isset($title) ? Localization::get($title) . ' | ' :  ''?>Milega</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon" />
    <link href="/assets/css/avenir-next.css" rel="stylesheet" />
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
      <li class="<?=$page === 'course' ? 'selected' : ''?>"><a href="/course"><?=Localization::get('COURSE')?></a></li>
      <li class="<?=$page === 'material' ? 'selected' : ''?>"><a href="/material"><?=Localization::get('MATERIAL')?></a></li>
      <li class="<?=$page === 'profile' ? 'selected' : ''?>"><a href="/profile"><?=Localization::get('PROFILE')?></a></li>
      <li class="float-right"><a href="/logout"><?=Localization::get('LOGOUT')?></a></li>
      <? endif; ?>
      <? if($page === 'login' || !Authentication::$isLoggedIn) :?>
      <li class="<?=$page === 'login' ? 'selected' : ''?>"><a href="/login"><?=Localization::get('LOGIN')?></a></li>
      <? endif; ?>
      <? if($page === 'register' || Authentication::isAdmin()) :?>
      <li class="<?=$page === 'register' ? 'selected' : ''?>"><a href="/register"><?=Localization::get('REGISTER')?></a></li>
      <? endif; ?>
    </ul>
    <a class="logo" href="/"><img src="/assets/images/milegalogo.png" alt="Logotype" /></a>
    <a class="hamburger" href="#">&#9776;</a>
  </nav>
</header>

<div class="sub-header">
  <div class="content">
<? if(isset($subHeader)): ?>

    <? foreach ($subHeader as $subMenuTitle => $arr) : ?>
    <div class="sub-header-item<?=$arr['selected'] ? ' selected' : ''?>">
      <a href="<?=$arr['url']?>"><?=Localization::get($subMenuTitle)?></a>
    </div>
    <? endforeach; ?>
<? endif; ?>
  </div>
</div>
<div class="bg"></div>
<div class="content-wrapper">
