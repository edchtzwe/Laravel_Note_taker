<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <title>@yield("title") - Note Entry</title>
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

<!-- @verbatim causes all expressions it encloses to NOT be parsed by blade. In our case, Angular.js will take over -->
<!-- @verbatim -->
<div>
<!-- ng-repeat the message after breaking it down into 10 word blocks for better presentation -->
    <textarea rows="4" cols="50" id="preview" name="preview" ng-bind="preview" disabled="">@{{ message }}</textarea>
</div>
<!-- @endverbatim -->

<div my-directive>
</div>

</div>

<script src="{{ asset('js/myApp.js') }}"></script>
<script src="{{ asset('js/myController.js') }}"></script>
<script src="{{ asset('js/myDirective.js') }}"></script>

</form>
</section>

</body>

</html>