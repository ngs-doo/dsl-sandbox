function ConsoleController($scope)
{
    $scope.messages = [];

    $scope.log = function() {
        for (arg in arguments) {
            $scope.messages.push(arg);
        }
    }
    
    window.console.log = $scope.log;
}