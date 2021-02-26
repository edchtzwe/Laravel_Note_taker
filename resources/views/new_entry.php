<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <title>Note Entry</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>


<body>

<section>
<form action="/note/save" method="POST" style="padding: 15px;" name="form">

    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

<div ng-app="myApp" ng-controller="myController">

<div>
    <label for="message">Note</label>
    <textarea rows="4" cols="50" id="message" name="message" ng-model="message" ng-change="UpdatePreview()" required=""></textarea>
</div>

<div>
    <textarea rows="4" cols="50" id="preview" name="preview" ng-bind="preview" disabled="">{{ preview }}</textarea>
{{ preview }}
</div>

</div>

<script>
var myApp = angular.module("myApp", []);
myApp.controller("myController", function($scope) {
    // $scope.preview = $scope.message;
    $scope.UpdatePreview = function() {
        $scope.preview = $scope.message;        
    };
});
</script>

<div>
    <input type="submit" value="submit"/>
</div>

</form>
</section>

</body>

</html>