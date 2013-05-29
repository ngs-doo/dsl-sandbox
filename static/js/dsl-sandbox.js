function DslSandboxCtrl($scope, $http, $location) {

    $scope.box = {};
    $scope.state = {};
    $scope.editor = {};
    
    $scope.selectDsl = function (dslFile) {
        $scope.editor.currentDsl = dslFile;
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
        var editor = $scope.editor;
        if (editor.currentPhp !== null) {
            var current = getIndexByName(editor.currentPhp, 'php');
            if (current)
                $scope.box.php[current].content = window.phpEditor.getValue();
        }
    };

    $scope.selectPhp = function (phpFile) {
        $scope.saveCurrent();
        var file = $scope.box.php[getIndexByName(phpFile, 'php')];
        if (file) {
            $scope.editor.currentPhp = phpFile;
            window.phpEditor.setValue(file.content);
            window.phpEditor.clearSelection();
        }
    }

    $scope.loadExample = function(example) {
        if (example === $scope.box.example && !confirm('Reload current example? You will lose all changes?'))
                return ;
        $scope.state = { isLoading: true };
        $scope.editor = {};

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
        async: true
    };

    $scope.run = function(options) {

        var opt = $.extend({}, $scope.runDefaults, options);

        if ($scope.state.isRunning || !$scope.box.php)
            return;
        
        $scope.state = { isRunning: true };
        $scope.saveCurrent();
        
        var postData = {
            'php': $scope.box.php,
            'method': opt.method,
            'url': opt.url
        };  

        if (!opt.async && opt.method==='get') {
            $scope.state = { isRunning: false };
            var query = encodeURIComponent(opt.url);
            var url = '/run/'+$scope.box.example+'?boxId='+$scope.box.id+'&query='+query;
            window.location = url;
        }
        else {
            $http.post('/run/'+$scope.box.example, postData)
                .success(function(data) {
                    $scope.state.isRunning = false;

                    if (data.hasOwnProperty('syntaxErrors') && data.syntaxErrors) {
                        $scope.state.syntaxErrors = data.syntaxErrors;
                    }
                    else {
                        if(data.hasOwnProperty('boxId'))
                            $scope.box.id = data.boxId;
                        $scope.state.phpOutput = data.output;
                        $scope.state.phpStatus = data.status;
                    }
                })
                .error(function(data) {
                    $scope.state.error = data;
                    $scope.state.isRunning = false;
                })
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
}


