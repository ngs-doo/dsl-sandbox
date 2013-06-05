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
    
    $scope.selectDsl = function (dslFile) {
        $scope.dslEditor.current = dslFile;
        var box = $scope.box;
        for(index in box.dsl) {
            if (box.dsl[index].name===dslFile)
                window.dslEditor.setValue(box.dsl[index].content);
        }
        window.dslEditor.clearSelection();
    }

    function getIndexByName(name, property) {
        for(index in $scope.box[property])
            if ($scope.box[property][index].name===name)
                return index;
        return null;
    };

    $scope.saveCurrent = function () {
        var editor = $scope.phpEditor;
        if (editor.current !== null) {
            var current = getIndexByName(editor.current, 'php');
            if (current)
                $scope.box.php[current].content = window.phpEditor.getValue();
        }
    };

    $scope.selectPhp = function (phpFile) {
        $scope.saveCurrent();
        var file = $scope.box.php[getIndexByName(phpFile, 'php')];
        if (file) {
            $scope.phpEditor.current = phpFile;
            window.phpEditor.setValue(file.content);
            window.phpEditor.clearSelection();
        }
    }

    $scope.loadExample = function(example) {
        if (example === $scope.box.example && !confirm('Reload current example? You will lose all changes?'))
                return ;
        $scope.state = { isLoading: true };
        $scope.dslEditor = {};
        $scope.phpEditor = {};

        $location.path('example/'+example);
        $http.get('/example/'+example)
            .success(function(data) {
                $scope.state = {};
                $scope.box = data;
                $scope.box.example = example;
                $scope.selectDsl(data.dsl[0].name);
                $scope.selectPhp('index.php');
            })
            .error(function(data) {
                $scope.state.error = data;
                $scope.state.isLoading = false;
            });
    }

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
        
        $scope.state = {
            phpOutput: $scope.state.phpOutput,  // preserve output
            isRunning: true
        };
        $scope.saveCurrent();

        // async GET, used for downloads
        if (!opt.async && opt.method==='get') {
            $scope.state = { isRunning: false };
            var query = encodeURIComponent(opt.url);
            var url = '/run/'+$scope.box.example+'?boxId='+$scope.box.id+'&query='+query;
            window.location = url;
        }
        else {
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
                if (data.hasOwnProperty('syntaxErrors') && data.syntaxErrors) {
                    $scope.state.syntaxErrors = data.syntaxErrors;
                }
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
    }

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
        var name = file.name,
            path = file.path;
        if(_.any($scope.box.php, function(f) { return f.name===name }))
            return $scope.selectPhp(name);
        
        $.ajax({
            url: '/file?path='+encodeURIComponent(path+'/'+name),
            type: 'GET',
            dataType: 'text'
        }).success(function(data) {
            $scope.$apply(function() {
                $scope.box.php.push({
                    name: name,
                    content: data,
                    readOnly: true
                });
                $scope.selectPhp(name);
            });
        }).error(function(data) {
            console.warn(data.responseText);
        });
    };

    $scope.filename = function(path) { return path.split('/').pop() };
}


