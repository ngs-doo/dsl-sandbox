<html ng-app>
<head>
    <title>DSL Sandbox</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/sandbox.css">
    <link rel="stylesheet" type="text/css" href="/static/css/chardinjs.css">
    <script src="/static/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.4/angular.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.4/angular-sanitize.min.js"></script>
    <script src="/static/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/dsl-sandbox.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/chardinjs.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body ng-controller="DslSandboxCtrl">

    <div class="alert alert-info" style="position: absolute; witdh: 50px; top: -5px; right: -5px; z-index: 10000">
        <a ng-click="toggleHelp()" href="#">
            <i class="icon icon-info-sign"></i>
            <strong>Show help</strong>
        </a>
    </div>

    <div class="message-wrapper">
        <div class="message-center">
            <div class="alert alert-info notice" ng-show="phpIsRunning"><span>PHP is running...</span></div>
            <div class="alert alert-info notice" ng-show="exampleIsLoading"><span>Loading example...</span></div>
            <div class="alert alert-danger notice" ng-show="error"><span><i class="icon-exclamation-sign icon"></i> {{ error }}</span></div>
        </div>
    </div>

    <div class="row-fluid" ng-class="{fade: exampleIsLoading}">
        <div class="span2">
            <? require('menu.php') ?>
        </div>

        <div class="span10">

            <div class="row-fluid">
                <div ng-show="intro" ng-bind-html-unsafe="intro"></div>
            </div>

            <div class="row-fluid">
                <div class="span6" data-intro="Domain model is defined in DSL files." data-position="top">
                    <ul class="nav nav-tabs nav-files">
                        <li ng-repeat="file in dsl" ng-class="{active:file.name==currentDsl}" ng-click="selectDsl(file.name)">
                            <a href="#">{{ file.name }}</a>
                        </li>
                    </ul>
                    <div id="dsl-editor"></div>
                </div>
                <div class="span6" data-intro="Try it out by writing your own PHP" data-position="top">
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
                <div class="span6" data-position="bottom" data-intro="PHP files are generated out of definitions written in DSL.">
                    <span>Generated PHP</span>
                    <div class="span11 well well-small">
                        
                        <div>
                            <label class="btn-check pull-right" for="showConverters">
                                <input id="showConverters" type="checkbox" ng-model="showConverters"><span> Show converters</span>
                            </label>
                        </div>
                        
                        <ul class="font-fixed file-tree">
                            <li ng-repeat="data in modules" ng-include="'tree_item_renderer.html'"></li>
                        </ul>
                    </div>
                </div>
                <div class="span6" data-intro="Execute your PHP on server" data-position="bottom">
                    <div>
                        <span class="center">
                            <button  class="btn btn-primary" ng-click="runCode()" ng-class="{disabled: phpIsRunning || !php}">
                                <i class="icon icon-white icon-play"></i>
                                <span>Run index.php</span>
                            </button>
                            <span ng-show="phpIsRunning">
                                <i class="icon icon-loading"></i>
                            </span>
                        </span>
                    </div>
                    <div class="alert alert-error" ng-show="phpError">{{ phpError }}</div>
                    <div ng-show="syntaxErrors">
                        <div class="alert alert-warning">Check your code for syntax errors:</div>
                        <ul>
                            <li ng-repeat="error in syntaxErrors">
                                <span>{{ error.file }}, line {{ error.line }}:</span>
                                <span class="syntax-error">{{ error.message }}</span>
                            </li>
                        </ul>
                    </div>
                    <div ng-show="phpOutput">
                        <div id="php-output">
                            
                        </div>
                        <div ng-bind-html-unsafe="phpOutput">
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

            // simple routing, @todo replace with actual ng routing
            var urlHash = window.location.hash;
            if (urlHash && urlHash.indexOf('#/example/')===0) {
                var example = urlHash.replace('#/example/', '');
                var link = $('#nav-menu [href="'+urlHash+'"]');
                link.click();
            } else {
                var example = 'hello-world';
                $('#nav-menu [href="#/example/hello-world"]').click();
            }
        })
    </script>
</body>
</html>
