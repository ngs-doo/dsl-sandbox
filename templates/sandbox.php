    <div class="message-wrapper">
        <div class="message-center">
            <div class="alert alert-info notice" ng-show="state.isRunning"><span>PHP is running...</span></div>
            <div class="alert alert-info notice" ng-show="state.isLoading"><span>Loading example...</span></div>
            <div class="alert alert-danger notice" ng-show="state.error"><span><i class="icon-exclamation-sign icon"></i> {{ state.error }}</span></div>
        </div>
    </div>

    <div class="pull-right">
        <div data-position="bottom" data-intro="Toggle help">
            <a ng-click="toggleHelp()" href="#">
                <i class="icon icon-info-sign"></i>
                <strong>Show help</strong>
            </a>
        </div>
    </div>

    <div class="row-fluid" ng-class="{fade: state.isLoading}">
        <div class="span2">
            <? require('menu.php') ?>
        </div>

        <div class="span10">

            <div class="row-fluid">
                <div ng-show="box.intro" ng-bind-html-unsafe="intro"></div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <ul class="nav nav-tabs nav-files" data-intro="Domain model is defined in DSL files." data-position="bottom">
                        <li ng-repeat="file in box.dsl" ng-class="{active:file.name==state.currentDsl}" ng-click="selectDsl(file.name)">
                            <a href="#">{{ file.name }}</a>
                        </li>
                    </ul>
                    <div id="dsl-editor"></div>
                </div>
                <div class="span6">
                    <ul class="nav nav-tabs nav-files" data-intro="Try it out by writing your own PHP" data-position="bottom">
                        <li ng-repeat="file in box.php" ng-class="{active:file.name==state.currentPhp}" ng-click="selectPhp(file.name)">
                            <a href="#">{{ file.name }}</a>
                        </li>
                    </ul>
                    <div id="php-editor" ></div>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span6" data-position="top" data-intro="PHP files are generated out of definitions written in DSL.">
                    <div class="span12">
                        <span>Generated PHP</span>
                        <div class="span11 well well-small">
                            
                            <div>
                                <label class="btn-check pull-right" for="showConverters">
                                    <input id="showConverters" type="checkbox" ng-model="showConverters"><span> Show converters</span>
                                </label>
                            </div>
                            
                            <ul class="font-fixed file-tree">
                                <li ng-repeat="data in box.modules" ng-include="'tree_item_renderer.html'"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span12" ng-show="box.uploads">
                        <span>Additional files</span>
                        <ul class="font-fixed">
                            <li ng-repeat="file in box.uploads">{{ file }}</li>
                        </ul>
                    </div>
                </div>
                <div class="span6" data-intro="Execute your PHP on server" data-position="top">
                    <div>
                        <button  class="btn btn-primary" ng-click="runCode()" ng-class="{disabled: state.isRunning || !box.php}">
                            <i class="icon icon-white icon-play"></i>
                            <span>Run</span>
                        </button>

                        <span ng-show="state.phpIsRunning">
                            <i class="icon icon-loading"></i>
                        </span>
                    </div>

                    <div class="alert alert-error" ng-show="state.phpError">{{ state.phpError }}</div>
                    <div ng-show="state.syntaxErrors">
                        <div class="alert alert-warning">Check your code for syntax errors:</div>
                        <ul>
                            <li ng-repeat="error in state.syntaxErrors">
                                <span>{{ error.file }}, line {{ error.line }}:</span>
                                <span class="syntax-error">{{ error.message }}</span>
                            </li>
                        </ul>
                    </div>
                    <div ng-show="state.phpOutput">
                        <div id="php-output" ng-bind-html-unsafe="state.phpOutput">
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

            var bodyScope = angular.element(document.body).scope();
            $('#php-output').on('click', 'a', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');
                var example = bodyScope.box.example;
                var boxId = encodeURIComponent(bodyScope.box.id);
                var query = encodeURIComponent(href);
                var url = '/run/'+example+'?boxId='+boxId+'&query='+query;
                window.location = url;
            });

        })
    </script>