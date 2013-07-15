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
                <a title="Show help" ng-click="toggleHelp()" href="" class="btn btn-primary btn-mini">
                    <i class="icon icon-white icon-question-sign"></i>
                </a>
            </div>
        </div>
        <div class="clear"></div>
        <div id="box-intro" ng-show="box.intro" ng-bind-html-unsafe="box.intro"></div>
        <div class="row-fluid">
            <div class="span6">
                <ul class="nav nav-tabs nav-files" data-intro="Domain model is defined in DSL files." data-position="bottom">
                    <li ng-repeat="file in box.dsl" ng-class="{active:file.name==dslEditor.current}" ng-click="openDsl(file.name)">
                        <a href="">{{ file.name }}</a>
                    </li>
                </ul>
                <div id="dsl-editor"></div>
            </div>
            <div class="span6">
                <ul class="nav nav-tabs nav-files" data-intro="Try it out by writing your own PHP which you can execute on the server" data-position="bottom">
                    <li ng-repeat="file in box.php" ng-class="{active:file.name==phpEditor.current.name}" ng-click="openPhp(file.name)">
                        <a class="float-left" href="">
                            <span>{{ file.name }}</span>
                            <span ng-show="file.readOnly" class="clickable" title="Close file" ng-click="closePhp(file.name)"><i class="icon icon-remove-sign"></i></span>
                        </a>
                    </li>
                </ul>
                <div ng-show="phpEditor.current.readOnly" class="editor-label label label-info">* read-only</div>
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
                    <hr>
                    <h4>Additional files</h4>
                    <ul class="font-fixed file-tree">
                        <li ng-repeat="file in box.uploads">
                            <i class="icon icon-file"></i>
                            <a href="/file?path={{file}}">{{ filename(file) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="span9" data-intro="PHP output will appear here. You can click links and submit forms to run the code." data-position="top">
                <div class="append-vertical">
                    <button  class="btn btn-primary" ng-click="run()" ng-class="{disabled: state.isRunning || !box.php}">
                        <i class="icon icon-white icon-play"></i>
                        <span>Run</span>
                    </button>
                    
                    <span ng-show="state.isRunning">
                        <i class="icon icon-loading"></i>
                        <span>Running</span>
                    </span>
                </div>

                <div class="alert alert-error" ng-show="state.phpError">{{ state.phpError }}</div>
                <div ng-show="state.syntaxErrors">
                    <div class="alert alert-danger">Found {{state.syntaxErrors.length}} syntax error{{ state.syntaxErrors.length > 1 ? 's' : '' }}:</div>
                    <ul>
                        <li ng-repeat="error in state.syntaxErrors">
                            <a ng-click="highlightPhp(error.file, error.line)" href="">{{ error.file }}, line {{ error.line }}:</a>
                            <span class="syntax-error">{{ error.message }}</span>
                        </li>
                    </ul>
                </div>
                <div ng-show="state.phpOutput">
                    <div id="php-output" class="white-box" ng-bind-html-unsafe="state.phpOutput">
                    </div>
                </div>
                <div ng-show="!state.phpOutput && !state.isRunning">
                    <small>Click the "Run" button to show PHP output</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/ng-template"  id="tree_item_renderer.html">
    <a href="" ng-show="!data.isConverter || showConverters" ng-click="loadFile(data)">
        <i class="icon icon-folder-open" ng-show="{{data.isDir}}"></i>
        <i class="icon icon-file" ng-show="{{data.isFile}}"></i>
        <span>{{data.name}}</span>
    </a>
    <ul class="">
        <li ng-repeat="data in data.nodes" ng-include="'tree_item_renderer.html'"></li>
    </ul>
</script>

<script src="/static/js/dsl-sandbox-init.js" type="text/javascript" charset="utf-8"></script>
