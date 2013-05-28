function DslSandboxCtrl($scope, $http, $location) {

    $scope.box = {
        id: null,
        dsl: null,
        php: null,
        intro: '',
        example: null
    };

    $scope.state = {
        currentPhp: null,
        currentDsl: null,
        isRunning: false,
        isLoading: false
    };
/*
    $scope.clear = function () {
        $scope.dsl = null;
        $scope.php = null;
        $scope.intro = '';
        $scope.example = false;
        $scope.currentPhp = null;
        $scope.currentDsl = null;
        $scope.phpSyntax = null;
        $scope.phpIsRunning = false;
        $scope.exampleIsLoading = false;
        $scope.error = false;
        $scope.boxId = null;
    };
*/
//    $scope.clear();

    $scope.selectDsl = function (dslFile) {
        $scope.state.currentDsl = dslFile;
        var box = $scope.box;
        for(index in box.dsl)
            if (box.dsl[index].name===dslFile)
                window.dslEditor.setValue(box.dsl[index].content);
        window.dslEditor.clearSelection();
    }

    function getIndexByName(name, property) {
        for(index in $scope.box[property])
            if ($scope.box[property][index].name===name)
                return index;
        return null;
    };

    $scope.saveCurrent = function () {
        var state = $scope.state;
        if (state.currentPhp !== null) {
            var current = getIndexByName(state.currentPhp, 'php');
            if (current)
                $scope.box.php[current].content = window.phpEditor.getValue();
        }
    };

    $scope.selectPhp = function (phpFile) {
        $scope.saveCurrent();
        var file = $scope.box.php[getIndexByName(phpFile, 'php')];
        if (file) {
            $scope.state.currentPhp = phpFile;
            window.phpEditor.setValue(file.content);
            window.phpEditor.clearSelection();
        }
    }

    $scope.loadExample = function(example) {
        if (example === $scope.box.example && !confirm('Reload current example? You will lose all changes?'))
                return ;
        $scope.state.error = false;
        $scope.state.isLoading = true;
        $location.path('example/'+example);
        $http.get('/example/'+example)
            .success(function(data) {
                $scope.box = data;
                $scope.box.example = example;

                /*
                $scope.dsl = data.dsl;
                $scope.php = data.php;
                $scope.intro = data.intro;
                $scope.modules = data.modules;
                $scope.uploads = data.uploads;
                */
                $scope.selectDsl(data.dsl[0].name);

                $scope.state = {};

                $scope.selectPhp('index.php');
            })
            .error(function(data) {
                $scope.state.error = data;
                $scope.state.isLoading = false;
            });
    }

    $scope.runCode = function() {
        if ($scope.state.phpIsRunning || !$scope.box.php)
            return;
        //$scope.phpSyntax
        $scope.state.syntaxErrors = null;
        $scope.state.phpError = null;
        $scope.state.phpOutput = '';
        $scope.state.isRunning = true;
        $scope.saveCurrent();
        var postData = {
            'php': $scope.box.php
        }
        $http.post('/run/'+$scope.box.example, postData)
            .success(function(data) {
                $scope.state.isRunning = false;

                if (data.hasOwnProperty('syntax') && data.syntax === false) {
                    $scope.state.phpSyntax = false;
                    $scope.state.syntaxErrors = data.syntaxErrors;
                }
                //else if(data.hasOwnProperty('output')) {
                else {
                    if(data.hasOwnProperty('boxId'))
                        $scope.box.id = data.boxId;
                    $scope.state.phpOutput = data.output;
                    $scope.state.phpStatus = data.status;
                }
            })
            .error(function(data) {
                $scope.state.phpError = data;
                $scope.state.phpIsRunning = false;
            })

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


