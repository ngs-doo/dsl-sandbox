angular.module('sandbox', [])

angular.module('sandbox', [])
    .filter('filename', function () {
        return function (path) {
        };
    });

function DslSandboxCtrl($scope, $http, $location) {

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

    $scope.loadExample = function(example, opt) {
        if (example === $scope.box.example && !confirm('Reload current example? You will lose all changes?'))
                return ;
        $scope.state = { isLoading: true };
        $scope.dslEditor = {};
        $scope.phpEditor = { stack: [] };

        $location.path('example/'+example);
        $http.get('/example/'+example)
            .success(function(data) {
                $scope.state = {};
                $scope.box = data;
                $scope.box.example = example;
                var startDsl = _.has(opt, 'defaultDsl') ? opt.defaultDsl : data.dsl[0].name;
                $scope.openDsl(startDsl);
                var startPhp = _.has(opt, 'defaultPhp') ? opt.defaultPhp : 'index.php';
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
        data: ''
    };

    $scope.run = function(options) {
        if (typeof options === 'undefined')
            options = {};
        var opt =  _.defaults(options, $scope.runDefaults);

        if ($scope.state.isRunning || !$scope.box.php)
            return;
        
        // async GET, used for downloads
        if (!opt.async && opt.method==='get') {
            var query = encodeURIComponent(opt.url);
            var url = '/run/'+$scope.box.example+'?boxId='+$scope.box.id+'&query='+query;
            window.location = url;
        }
        else {
            // reset state, but preserve output
            $scope.state = {
                phpOutput: $scope.state.phpOutput,
                isRunning: true
            };
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

            $.ajax({
                url: '/run/'+$scope.box.example,
                type: 'POST',
                data: opt,
                dataType: 'json'
            }).success(function(data) {
                $scope.state.isRunning = false;
                if (_.has(data, 'syntaxErrors') && data.syntaxErrors)
                    $scope.state.syntaxErrors = data.syntaxErrors;
                else {
                    if(data.hasOwnProperty('boxId'))
                        $scope.box.id = data.boxId;
                    $scope.state.phpOutput = data.output;
                }
                $scope.$apply();
            }).error(function(data) {
                $scope.state.error = data;
                $scope.state.isRunning = false;
                $scope.$apply();
            });
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
        if(_.isObject(file) && _.has(file, 'isFile') && file.isFile) {
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


