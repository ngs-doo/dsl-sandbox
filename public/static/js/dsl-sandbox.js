function DslSandboxCtrl($scope, $http) {

    $scope.isRunning = false;

    $scope.code = {};
    $scope.code.dsl = '';
    $scope.code.php = '';
    $scope.intro = '';
    $scope.example = false;

    $scope.loadExample = function(example) {
         $http.get('/example/'+example)
             .success(function(data) {
                 $scope.example = example;
                 $scope.code.dsl = data.dsl;
                 //$scope.code.php = data.php;
                 window.phpEditor.setValue(data.php)
                 window.phpEditor.clearSelection();
                 $scope.intro = data.intro;
                 $scope.modules = data.modules;
             })
             .error(function(data) {

             })
    }

    $scope.runCode = function() {
        if ($scope.isRunning)
            return;
        $scope.phpError = null;
        $scope.phpOutput = false;
        $scope.isRunning = true;
        var postData = {
            'php': window.phpEditor.getValue(),
            'dsl': $scope.code.dsl
        }
        $http.post('/run/'+$scope.example, postData)
            .success(function(data) {
                $scope.phpOutput = data.output;
                $scope.isRunning = false;
            })
            .error(function(data) {
                $scope.phpError = data.message;
                $scope.isRunning = false;
            })

    }
}
