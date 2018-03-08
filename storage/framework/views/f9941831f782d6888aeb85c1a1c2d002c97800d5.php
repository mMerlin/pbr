<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php if( isset( $header_title )): ?><?php echo e($header_title); ?><?php else: ?> <?php echo app('translator')->get('messages.def_title'); ?><?php endif; ?></title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

  <!-- Styles -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/app.css" rel="stylesheet">
  <!-- need to figure out correct way of building / referencing path through gulp / elixir -->
  <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>

<?php echo $__env->yieldContent('header_css'); ?>
<?php echo $__env->yieldContent('header_js'); ?>
</head>
<body id="app-layout">

<nav class="navbar navbar-inverse">
  <div class="navbar-header">
    <button type="button" data-target="#myNavbar" data-toggle="collapse" class="navbar-toggle">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="http://www.solarbiocells.com"><img class="img-rounded" src="/SolarBioCells_Logo_V1.png" alt="SolarBioCells.com logo"></a>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
<?php if(!Auth::guest()): ?>
      <?php if( isset($route) && $route == "mybio"): ?><li class="active"><?php else: ?><li><?php endif; ?><a href="<?php echo e(url('/mybio')); ?>"><?php echo app('translator')->get('menus.user_bio_r'); ?></a></li>
<?php endif; ?>
      <?php if( isset($route) && $route == "global"): ?><li class="active"><?php else: ?><li><?php endif; ?><a href="<?php echo e(url('/global')); ?>"><?php echo app('translator')->get('menus.global'); ?></a></li>
<?php if(!Auth::guest() && Auth::user()->isadmin): ?>
      <?php if( isset($route) && $route == "users"): ?><li class="active"><?php else: ?><li><?php endif; ?><a href="<?php echo e(url('/users')); ?>"><?php echo app('translator')->get('menus.users'); ?></a></li>
      <?php if( isset($route) && $route == "bioreactors"): ?><li class="active"><?php else: ?><li><?php endif; ?><a href="<?php echo e(url('/bioreactors')); ?>"><?php echo app('translator')->get('menus.all_bio_r'); ?></a></li>
<?php endif; ?>
      <?php if( isset($route) && $route == "about"): ?><li class="active"><?php else: ?><li><?php endif; ?><a href="<?php echo e(url('/about')); ?>"><?php echo app('translator')->get('menus.about'); ?></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
<?php if(Auth::guest()): ?>
      <li><a href="<?php echo e(url('/login')); ?>"><?php echo app('translator')->get('menus.login'); ?></a></li>
<?php if( false ): ?>
      <li><a href="<?php echo e(url('/register')); ?>"><?php echo app('translator')->get('menus.register'); ?></a></li>
<?php endif; ?>
<?php else: ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <?php echo e(Auth::user()->name); ?><span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?php echo e(url('/logout')); ?>"><i class="glyphicon glyphicon-log-out"></i> <?php echo app('translator')->get('menus.logout'); ?></a></li>
          <li><a href="<?php echo e(url('/password')); ?>"><i class="glyphicon glyphicon-lock"></i> <?php echo app('translator')->get('menus.chg_pass'); ?></a></li>
        </ul>
      </li>
<?php endif; ?>
    </ul>
  </div>
</nav>
<div class="container">
<?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->yieldContent('modal_insert'); ?>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php echo $__env->yieldContent('footer_js'); ?>

<?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
</body>
</html>
