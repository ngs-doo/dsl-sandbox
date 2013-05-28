<html ng-app>
<head>
    <title>DSL Sandbox</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/sandbox.css">
    <link rel="stylesheet" type="text/css" href="/static/css/main.css">
    <link rel="stylesheet" type="text/css" href="/static/css/chardinjs.css">
    <script src="/static/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.4/angular.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.4/angular-sanitize.min.js"></script>
    <script src="/static/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/dsl-sandbox.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/chardinjs.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/functions-full.js" type="text/javascript" charset="utf-8"></script>
</head>
<body ng-controller="DslSandboxCtrl">
 <!-- header start -->
<header id="header">
  <div class="container">
    <div class="row-fluid">
      <a href="https://dsl-platform.com/" class="logo"></a>
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
                <li><a href="https://dsl-platform.com/"  class="active" >Home</a></li>
                <li><a href="https://docs.dsl-platform.com/" >Docs</a></li>
                <li><a href="https://panel.dsl-platform.com/" >Panel</a></li>
                <li><a href="https://blog.dsl-platform.com/">Blog</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="slogan-container">
        <p class="slogan"><span class="black">Build</span> better applications</p>
      </div>
      <div class="login-container" id="loggedin">
        <a href="#" class="login-user"><span class="login-icon"><span class="login-user-name"></span> <i class="icon-arrow-down-custom"></i></span></a>
        <ul class="login-user-list">
            <li><a href="https://panel.dsl-platform.com/profile">View profile</a></li>
            <li><a href="https://panel.dsl-platform.com/profile/account-settings">Manage account</a></li>
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
  </div>
</header>
<!-- header end -->

<!-- content start -->
<section id="main">
    <div class="container">
        <div class="row append-bottom append-top">
            <? require 'sandbox.php' ?>
        </div>
    </div>
</section>
<!-- content end -->

<!-- footer start -->
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
