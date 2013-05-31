<div class="message-wrapper">
    <div class="message-center">
        <div class="alert alert-info notice" ng-show="state.isRunning"><span>PHP is running...</span></div>
        <div class="alert alert-info notice" ng-show="state.isLoading"><span>Loading example...</span></div>
        <div class="alert alert-danger notice" ng-show="state.error"><span><i class="icon-exclamation-sign icon"></i> {{ state.error }}</span></div>
    </div>
</div>

<div class="row-fluid">
    <div class="span2" id="sidebar">
        <div class="marginless">
            <? require('menu.php') ?>
        </div>
    </div>

    <div class="span10" ng-class="{fade: state.isLoading}">
       <div class="help-btn">
            <div data-position="bottom" data-intro="Toggle help">
                <a ng-click="toggleHelp()" href="#" class="btn btn-primary btn-mini">Show help</a>
            </div>
        </div>
        <div class="clear"></div>
        <div ng-show="box.intro" ng-bind-html-unsafe="box.intro"></div>
        <div class="row-fluid">
            <div class="span6">
                <ul class="nav nav-tabs nav-files" data-intro="Domain model is defined in DSL files." data-position="bottom">
                    <li ng-repeat="file in box.dsl" ng-class="{active:file.name==editor.currentDsl}" ng-click="selectDsl(file.name)">
                        <a href="#">{{ file.name }}</a>
                    </li>
                </ul>
                <div id="dsl-editor"></div>
            </div>
            <div class="span6">
                <ul class="nav nav-tabs nav-files" data-intro="Try it out by writing your own PHP" data-position="bottom">
                    <li ng-repeat="file in box.php" ng-class="{active:file.name==editor.currentPhp}" ng-click="selectPhp(file.name)">
                        <a href="#">{{ file.name }}</a>
                    </li>
                </ul>
                <div id="php-editor"></div>
            </div>
        </div>

        <hr>
        <div class="row-fluid">
            <div class="span3" data-position="top" data-intro="PHP files are generated out of definitions written in DSL.">
                <div class="span12">
                    <h4>Generated PHP</h4>
                    <div class="append-vertical">

                        <div>
                            <div class="pull-right">
                                <label class="btn-check" for="showConverters">
                                    <input id="showConverters" type="checkbox" ng-model="showConverters"><span> Show converters</span>
                                </label>
                            </div>
                            <ul class="font-fixed file-tree">
                                <li ng-repeat="data in box.modules" ng-include="'tree_item_renderer.html'"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span12" ng-show="box.uploads">
                    <h4>Additional files</h4>
                    <ul class="font-fixed file-tree">
                        <li ng-repeat="file in box.uploads"><i class="icon icon-file"></i> {{ file }}</li>
                    </ul>
                </div>
            </div>
            <div class="span9" data-intro="Execute your PHP on server" data-position="top">
                <div class="append-vertical">
                    <button  class="btn btn-primary" ng-click="run()" ng-class="{disabled: state.isRunning || !box.php}">
                        <i class="icon icon-white icon-play"></i>
                        <span>Run</span>
                    </button>
                    <div class="clear"></div>
                    <span ng-show="state.isRunning">
                        <i class="icon icon-loading"></i>
                    </span>

                    <span ng-show="state.isRunning">Running</span>
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
                    <div id="php-output" class="white-box" ng-bind-html-unsafe="state.phpOutput">
                    </div>
                </div>
                <div ng-show="!state.phpOutput">
                    <small>Click run to show php output</small>
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
    if (urlHash && urlHash.indexOf('#/example/')===0)
        var example = urlHash.replace('#/example/', '');
    else
        var example = 'hello-world';
    var link = $('.nav-list a[href="#/example/'+example+'"]');
    link.click();

    // handle click events in output
    var bodyScope = angular.element(document.body).scope();
    $('#php-output').on('click', 'a', function(event) {
        event.preventDefault();
        var cfg = {
            url: $(this).attr('href')
        };
        var async = $(this).data('async');
        if (async==='0' || async===0)
            cfg.async = false;
        bodyScope.run(cfg);
    });

})
</script>