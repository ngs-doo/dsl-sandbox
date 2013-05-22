<html ng-app>
<head>
    <title>DSL Sandbox</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/sandbox.css">
    <script src="/static/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.4/angular.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.4/angular-sanitize.min.js"></script>
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
                <div ng-show="intro" ng-bind-html-unsafe="intro"></div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <ul class="nav nav-tabs nav-files">
                        <li ng-repeat="file in dsl" ng-class="{active:file.name==currentDsl}" ng-click="selectDsl(file.name)">
                            <a href="#">{{ file.name }}</a>
                        </li>
                    </ul>
                    <div id="dsl-editor"></div>
                </div>
                <div class="span6">
                    <ul class="nav nav-tabs nav-files">
                        <li ng-repeat="file in php" ng-class="{active:file.name==currentPhp}" ng-click="selectPhp(file.name)">
                            <a href="#">{{ file.name }}</a>
                        </li>
                    </ul>
                    <div id="php-editor" ></div>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span6">
                    <div>
                        <span>Generated PHP</span>
                        <label class="pull-right" for="showConverters"><input id="showConverters" type="checkbox" ng-model="showConverters"> Show converters</label>
                    </div>
                    
                    <ul class="font-fixed file-tree">
                        <li ng-repeat="data in modules" ng-include="'tree_item_renderer.html'"></li>
                    </ul>
                </div>
                <div class="span6">
                    <div>
                        <span class="center">
                            <button ng-click="runCode()" class="btn btn-success"><i class="icon icon-white icon-play"></i> Run index.php</button>
                            <span ng-show="isRunning">PHP is running, please wait...</span>
                        </span>
                    </div>
                    <div class="alert alert-error" ng-show="phpError">{{ phpError }}</div>
                    <div ng-show="phpOutput">
                        <div id="php-output">
                            
                        </div>
                        <div ng-bind-html="phpOutput">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/ng-template"  id="tree_item_renderer.html">
        <a href="#" ng-show="!data.isConverter || showConverters"><i class="icon icon-folder-open" ng-show="{{data.isDir}}"></i><i class="icon icon-file" ng-show="{{data.isFile}}"></i><span>{{data.name}}</span></a>
        <ul class="">
            <li ng-repeat="data in data.nodes" ng-include="'tree_item_renderer.html'"></li>
        </ul>
    </script>

    <script type="text/javascript">
        $(function(){
            var dslEditor = ace.edit("dsl-editor");
            window.dslEditor = dslEditor;

            var editor = ace.edit("php-editor");
            editor.getSession().setMode("ace/mode/php");
            window.phpEditor = editor;

            $(window).resize(function() {
                $('#php-editor,#dsl-editor').each(function() {
                    $(this).width($(this).parent().width() - 0);
                });
            }).trigger('resize');

            // simple routing, @todo ng routes
            if (window.location.hash.startsWith('#/example/')) {
                var example = window.location.hash.replace('#/example/', '');
                var link = $('#nav-menu [href="'+window.location.hash+'"]');
                link.click();
            }
        })
    </script>
</body>
</html>
