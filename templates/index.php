<html ng-app>
<head>
    <title>DSL Sandbox</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/sandbox.css">
    <script src="/static/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/static/js/angular-1.1.4.min.js" type="text/javascript"></script>
    <script src="/static/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/dsl-sandbox.js" type="text/javascript" charset="utf-8"></script>
</head>
<body ng-controller="DslSandboxCtrl">
    <div class="row-fluid">
        <div class="span2">
            <? require('menu.php') ?>
        </div>

        <div class="span10">

            <div class="row-fluid">
                <div class="well well-small" ng-show="intro" ng-bind-html-unsafe="intro"></div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <h4>DSL</h4>
                    <textarea ng-model="code.dsl" rows="20" class="span12 font-fixed"></textarea>
                </div>
                <div class="span6">
                    <h4>PHP</h4>
                    <!--<textarea id="php-editor" rows="20" class="span12 font-fixed"></textarea>-->
                    <div id="php-editor" ></div>
                    <div>
                        <button ng-click="runCode()" class="btn btn-success"><i class="icon icon-white icon-play"></i> Run!</button>
                        <span ng-show="isRunning">PHP is running, please wait...</span>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <h4>Generated PHP</h4>
                    <ul class="unstyled">
                        <li ng-repeat="file in modules">
                            <a href="">{{ file }}</a>
                        </li>
                    </ul>
                </div>
                <div class="span6">
                    <h4>PHP result</h4>
                    <div class="alert alert-error" ng-show="phpError">{{ phpError }}</div>
                    <div ng-show="phpOutput"><pre>{{ phpOutput }}</pre></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            var editor = ace.edit("php-editor");
            editor.getSession().setMode("ace/mode/php");
            window.phpEditor = editor;

            $(window).resize(function() {
                var $editor = $('#php-editor');
                $editor.width($editor.parent().width() - 15);
            }).trigger('resize');
        })
    </script>
</body>
</html>
