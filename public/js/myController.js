myApp.controller("myController", function($scope) {
    $scope.UpdatePreview = function() {
        $scope.preview = $scope.message;        
    };
});
