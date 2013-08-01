angular.module('sandbox', [])

angular.module('sandbox', [])
    .filter('filename', function () {
        return function (path) {
        };
    });


window._sandboxExamples = {}

function SandboxProxy(scope) {
    var _scope = scope;
    this.run = _scope.run;
    this.loadFile = _scope.loadFile;

    this.getAjax = function(url) {
        return  _scope.run({
            method: 'GET',
            url: url,
            ajax: true
        })
    };
    this.postAjax = function() {
        
    }
}

(function() {
var jsLoadedInterval;

function onLoadChatApp()
{
    $.connection.hub.url = '/beta_6ab06d637442ca86edf0c0-signalR/'+'signalr/hubs';
    var config = {};
    var hub = $.connection.notifyHub;
    
    hub.client.error = function(r) { console.warn('Error', r); };

    // chrome fix, has issues with other transports
    var isChrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
    if (isChrome)
        config.transport = 'longPolling';

    $.connection.hub.start(config).done(function(){
        hub.server.listen('Chat.Message')
            .fail(function(msg){
                console.error('server.listen failed', msg);
            })
            .done(function() {
                var delay = 500;
                jsLoadedInterval = window.setInterval(function() {
                    if($('#loading-js').length)
                        $('#loading-js').slideUp(function() {
                            $('#chat-msg-form').slideDown()
                        });
                }, delay);
            })
    }).fail(function(r) {
        console.error('failed to start SignalR connection', r);
    });

    function MessageList(msgList) {
        var list = msgList;
        var listMaxLength = 7;
        pad = function(n) { return n<10 ? "0"+n : n }
        
        this.recycle = function() {
            var items = list.children();
            if(items.length > listMaxLength) {
                var itemsToRemove = items.length - listMaxLength;
                items.slice(0, itemsToRemove)
                    .filter(':not(.for-removal)')
                    .addClass('for-removal')
                    .slideUp(200, function() { $(this).remove() });
            }
        }

        this.append = function(msg) {
            var d = new Date(msg.created);
            var time = [pad(d.getHours()), pad(d.getMinutes()) ,pad(d.getSeconds())].join(':')
            var msgNode = $('<li></li>')
                .append($('<span>').text('['+time+'] User #'+msg.fromID+': '))
                .append($('<span>').text(msg.content));
            return msgNode.hide().appendTo(list).slideDown(200);
        }
    }

    hub.client.notify = function(root, uris) {
        var proxy = new SandboxProxy(angular.element(document.body).scope());
        var msgList = new MessageList($('#php-output .chat-window ul'));
        var res = proxy.getAjax('?uris='+uris.join(';'))
            .done(function(data) {
                var messages = JSON.parse(data);
                $.each(messages, function(i, msg) {
                    msgList.append(msg);
                    msgList.recycle();
                });
            });
    };
}

function onUnloadChatApp() {
    $.connection.hub.stop();
    clearInterval(jsLoadedInterval);
}

window._sandboxExamples['chat-app'] = {
    'onload': onLoadChatApp,
    'onunload': onUnloadChatApp
}
})();


function DslSandboxCtrl($scope, $http, $location, $window) {

    $scope.box = {};
    $scope.state = {};
    $scope.dslEditor = {};
    $scope.phpEditor = {};
    
    $scope.openDsl = function (dslFile) {
        $scope.dslEditor.current = dslFile;
        var box = $scope.box;
        for(index in box.dsl) {
            if (box.dsl[index].name===dslFile)
                window.dslEditor.setValue(box.dsl[index].content);
        }
        window.dslEditor.clearSelection();
    };

    $scope.saveCurrent = function () {
        var editor = $scope.phpEditor;
        if (_.has(editor, 'current') && editor.current) {
            var indexCurrent = _.findIndex($scope.box.php, function(f) {
                return f.name===editor.current.name });
            if (indexCurrent >= 0)
                $scope.box.php[indexCurrent].content = window.phpEditor.getValue();
        }
    };

    $scope.openPhp = function (filename) {
        $scope.saveCurrent();
        var file = _($scope.box.php).find(function(f) { return f.name === filename });
        if (file) {
            $scope.phpEditor.stack.push(filename);
            $scope.phpEditor.current = file;
            window.phpEditor.setReadOnly(_.has(file, 'readOnly') && file.readOnly);
            window.phpEditor.setValue(file.content);
            window.phpEditor.gotoLine(0);
            window.phpEditor.clearSelection();
        }
    };

    $scope.closePhp = function (file) {
        var editor = $scope.phpEditor;
        $scope.box.php = _.filter($scope.box.php, function(f) { return f.name!==file; });
        editor.stack = _.filter(editor.stack, function(f) { return f!==file; });
        editor.current = null;
        if (editor.stack.length>0) {
            var lastOpened = editor.stack.pop();
            $scope.openPhp(lastOpened);
        }
    };

    var highlight = function (startLine, endLine) {
        editor.gotoLine(startLine);
        if (typeof(endLine)!=='undefined' && endLine!==null)
            editor.selection.selectTo(endLine);
        else
            editor.selection.selectLineEnd();
    }

    $scope.highlightPhp = function (filename, startLine, endLine) {
        $scope.openPhp(filename);
        highlight(window.phpEditor, startLine, endLine);
    };

    $scope.highlightDsl = function (filename, startLine, endLine) {
        $scope.openDsl(filename);
        highlight(window.dslEditor, startLine, endLine);
    };

    $scope.loadExample = function(example, opt) {
        if (example === $scope.box.example && !confirm('Reload current example? You will lose all changes?'))
                return ;

        // @todo as service
        // handles js scripts to run on load/unload
        if ($window._sandboxExamples.hasOwnProperty($scope.box.example)) {
            // unload scripts for previous example
            var exampleCurrent = $window._sandboxExamples[$scope.box.example];
            if (exampleCurrent.hasOwnProperty('onunload'))
                exampleCurrent.onunload.call();
        }
        if ($window._sandboxExamples.hasOwnProperty(example)) {
            // load scripts for new example
            var exampleNew = $window._sandboxExamples[example];
            if (exampleNew.hasOwnProperty('onload')) exampleNew.onload.call();
        }

        $scope.state = { isLoading: true };
        $scope.dslEditor = {};
        $scope.phpEditor = { stack: [] };

        $location.path('example/'+example);
        
        $http.get('/example/'+example)
            .success(function(data) {
                $scope.state = {};
                $scope.box = data;
                $scope.box.example = example;
                var startDsl = _.has(opt, 'dsl') ? opt.dsl : data.dsl[0].name;
                $scope.openDsl(startDsl);
                var startPhp = _.has(opt, 'php') ? opt.php : 'index.php';
                $scope.openPhp(startPhp);
            })
            .error(function(data) {
                $scope.state.error = data;
                $scope.state.isLoading = false;
            });
    };

    $scope.runDefaults = {
        url: '',
        method: 'get',
        async: true,
        data: '',
        ajax: false
    };

    $scope.run = function(options) {
        if (typeof options === 'undefined')
            options = {};
        var opt =  _.defaults(options, $scope.runDefaults);

        if (!$scope.box.php || (!opt.ajax && $scope.state.isRunning))
            return ;
        
        // sync GET, used for downloads
        if (!opt.async && opt.method==='get') {
            var query = encodeURIComponent(opt.url);
            var url = '/run/'+$scope.box.example+'?boxId='+$scope.box.id+'&query='+query;
            window.location = url;
        }
        else {
            // reset state, but preserve output
            $scope.state = {
                phpOutput: $scope.state.phpOutput
            }
            if (!opt.ajax)
                $scope.state.isRunning = true;
            
            $scope.saveCurrent();

            // need to update isRunning state when called outside of scope
            if($scope.$$phase !== '$apply')
                $scope.$apply();

            opt.php = _($scope.box.php).filter(function(f) {
                    return !_.has(f, 'readOnly') || !f.readOnly
                }).map(function(f) {
                    return {
                        name: f.name,
                        content: f.content
                    };
                }).valueOf();

            var dfd = jQuery.Deferred();
            $.ajax({
                url: '/run/'+$scope.box.example,
                type: 'POST',
                data: opt,
                dataType: 'json'
            }).success(function(data) {
                if (_.has(data, 'syntaxErrors') && data.syntaxErrors)
                    $scope.state.syntaxErrors = data.syntaxErrors;
                else {
                    if(data.hasOwnProperty('boxId'))
                        $scope.box.id = data.boxId;
                    if(!opt.ajax)
                        $scope.state.phpOutput = data.output;
                    dfd.resolve(data.output);
                }
                $scope.$apply();
            }).error(function(data) {
                dfd.reject(data);
                $scope.state.error = data;
                $scope.$apply();
            }).always(function() {
                if(!opt.ajax)
                    $scope.state.isRunning = false;
                if($scope.$$phase !== '$apply')
                    $scope.$apply();
            })
            return dfd.promise();
        }
    };

    $scope.httpGet = function(query) {
        var query = query ? encodeURIComponent(query) : '';
        window.location.href = '/run/'+$scope.box.example + '?boxId='+$scope.box.id+'&query='+query;
    };

    $scope.httpGetSynced = function(query) {
        var query = query ? encodeURIComponent(query) : '';
        window.location.href = '/run/'+$scope.box.example + '?boxId='+$scope.box.id+'&query='+query;
    };

    $scope.toggleHelp = function() {
        $('body').chardinJs('toggle');
    };

    $scope.loadFile = function(file) {

        if(_.isObject(file)) {
            if (!_.has(file, 'isFile') || !file.isFile)
                return false;
            var name = file.name,
                path = file.path;
        }
        else if (_.isString(file)) {
            var parts = file.split('/');
            var name = parts.pop();
            var path = parts.join('/');
        }
        else
            throw Error('loadFile: file must be an object or a string');

        if ($scope.box.php.current && name===$scope.box.php.current)
            $scope.openPhp(name);

        if(_.any($scope.box.php, function(f) { return f.name===name })) {
            $scope.openPhp(name);
            var dfd = new jQuery.Deferred();
            setTimeout(function () { dfd.resolve(); }, 50);
            return dfd.promise();
        }
        return $.ajax({
            url: '/file',
            data: {
                path: path+'/'+name,
                example: $scope.box.example
            },
            //?path='+encodeURIComponent(path+'/'+name),
            type: 'GET',
            dataType: 'text'
        }).done(function(data) {
            $scope.$apply(function() {
                $scope.box.php.push({
                    name: name,
                    content: data,
                    readOnly: true
                });
                $scope.openPhp(name);
            });
        }).error(function(data) {
            throw Error(data.responseText);
        });
    };


    $scope.filename = function(path) { return path.split('/').pop(); };
}


