function DslSandboxCtrl($scope, $http, $location) {

    $scope.isRunning = false;

    $scope.code = {};
    $scope.dsl = null;
    $scope.php = null;
    
    $scope.intro = '';
    $scope.example = false;

    $scope.currentPhp = null;
    $scope.currentDsl = null;
    $scope.phpSyntax = null;

    $scope.phpOutput = '<strong>test</strong>';

    $scope.selectDsl = function (dslFile) {
        $scope.currentDsl = dslFile;
        for(index in $scope.dsl)
            if ($scope.dsl[index].name===dslFile)
                window.dslEditor.setValue($scope.dsl[index].content);
        window.dslEditor.clearSelection();
    }

    function getIndexByName(name, property) {
        for(index in $scope[property])
            if ($scope[property][index].name===name)
                return index;
        return null;
    };

    $scope.saveCurrent = function () {
        if ($scope.currentPhp !== null) {
            var current = getIndexByName($scope.currentPhp, 'php');
            if (current)
                $scope.php[current].content = window.phpEditor.getValue();
        }
    };

    $scope.selectPhp = function (phpFile) {
        $scope.saveCurrent();
        var file = $scope.php[getIndexByName(phpFile, 'php')];
        if (file) {
            $scope.currentPhp = phpFile;
            window.phpEditor.setValue(file.content);
            window.phpEditor.clearSelection();
        }
    }

    $scope.loadExample = function(example) {
        if (example === $scope.example)
            if (!confirm('Reload current example? This will lose all changes?'))
                return ;
        $location.path('example/'+example);
        $http.get('/example/'+example)
            .success(function(data) {
                $scope.phpOutput = '';
                $scope.example = example;

                $scope.dsl = data.dsl;
                $scope.selectDsl(data.dsl[0].name);

                $scope.php = data.php;
                $scope.currentPhp = null;
                $scope.selectPhp('index.php');

                $scope.intro = data.intro;
                $scope.modules = data.modules;
            })
            .error(function(data) {
                alert(data);
            })
    }

    $scope.runCode = function() {
        if ($scope.isRunning)
            return;
        //$scope.phpSyntax
        $scope.syntaxErrors = null;
        $scope.phpError = null;
        $scope.phpOutput = '';
        $scope.isRunning = true;
        $scope.saveCurrent();
        var postData = {
            'php': $scope.php
        }
        $http.post('/run/'+$scope.example, postData)
            .success(function(data) {
                $scope.isRunning = false;
                if (data.hasOwnProperty('syntax') && data.syntax === false) {
                    $scope.phpSyntax = false;
                    $scope.syntaxErrors = data.syntaxErrors;
                }
                else {
                    // @todo ngSanitize
                    $('#php-output').html(data.output);
                    $scope.phpOutput = data.output;
                    $scope.phpStatus = data.status;
                }
            })
            .error(function(data) {
                $scope.phpError = data;
                $scope.isRunning = false;
            })

    }
}


