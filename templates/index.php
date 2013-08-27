<!DOCTYPE html>
<html ng-app>
<head>
    <meta charset="UTF-8">
    <title>DSL Sandbox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if IE 7]>
      <link rel="stylesheet" href="/static/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="https://static.dsl-platform.com/static/css/style-full-20130717.min.css">
    <link type="text/css" href="/static/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/static/css/chardinjs.css">
    <link rel="stylesheet" type="text/css" href="/static/css/sandbox.css">

    <script src="/static/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/static/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular-sanitize.min.js"></script>
    <script src="/static/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/lodash.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/dsl-sandbox.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/chardinjs.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/functions.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/jquery.signalR-1.0.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/beta_6ab06d637442ca86edf0c0-signalR/signalr/hubs" type="text/javascript" charset="utf-8"></script>
</head>
<body ng-controller="DslSandboxCtrl">
 <!-- header start -->
<header id="header">
    <div class="container-fluid">
      <a href="https://dsl-platform.com/" class="logo pull-right"></a>
      <div class="nav-container">
        <nav>
          <div class="navbar navbar-inverse">
            <a class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="https://dsl-platform.com/">Home</a></li>
                <li><a href="https://docs.dsl-platform.com/" class="active">Docs</a></li>
                <li><a href="https://panel.dsl-platform.com/" >Panel</a></li>
                <li><a href="https://blog.dsl-platform.com/">Blog</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="slogan-container">
        <p class="slogan">Welcome to <span class="black">DSL platform</span> sandbox</p>
      </div>
      <div class="login-container" id="loggedin">
        <a href="#" class="login-user"><span class="login-icon"><span class="login-user-name"></span> <i class="icon-arrow-down-custom"></i></span></a>
        <ul class="login-user-list">
            <li><a href="https://panel.dsl-platform.com/profile">View profile</a></li>
            <li><a href="https://panel.dsl-platform.com/profile/account-settings">Change password</a></li>
            <li><a href="https://panel.dsl-platform.com/logout">Log out</a></li>
            <!--<li><a href="#">Request info</a></li>-->
        </ul>
      </div>

      <div class="login-container" id="loggedout">
        <div class="login-btns">
            <a href="https://panel.dsl-platform.com/login" class="login-btn nowrap">Log in</a>
            <a class="btn btn-primary upper" href="https://dsl-platform.com/register" id="register-btn">Register</a>
        </div>
      </div>
    </div>
</header>
<!-- header end -->

<!-- content start -->
<section>
    <div class="container-fluid">
        <div class="append-bottom append-top">
            <? require 'sandbox.php' ?>
        </div>
    </div>
</section>
<!-- content end -->

<!-- footer start -->
<?
if (file_exists('../templates/google_analytics.php'))
    require 'google_analytics.php';
?>
<footer id="footer">
  <div class="footer-inner">
    <div class="container">
      <p><a class="logo" href="https://dsl-platform.com/"></a></p>
      <p class="copyright">&copy; Nova Generacija Softvera d.o.o. &amp; Element d.o.o. 2013., <span class="nowrap">All rights reserved.</span></p>
    </div>
  </div>
</footer>
<!-- footer end -->
</body>
</html>
