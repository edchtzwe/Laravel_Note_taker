<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <title>{{ $page_title }} - Note Entry</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>


<body>
<section>
<form action="/note/save" method="POST" style="padding: 15px;" name="form">

    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

<div ng-app="myApp" ng-controller="myController" style="text-align: center;">

<div>
    <input style="width:75%;" id="title" name="title" placeholder="Note Title..." value="">
</div>

<div style="margin-top: 10px;">
    <textarea placeholder="Enter Your Notes Here..." style="width:75%;" rows="20" id="message" name="message" ng-model="message" ng-change="UpdatePreview()" required=""></textarea>
</div>

<!-- @verbatim causes all expressions it encloses to NOT be parsed by blade. In our case, Angular.js will take over -->
<!-- @verbatim -->
<div>
<!-- ng-repeat the message after breaking it down into 10 word blocks for better presentation -->
    <textarea style="margin-top:10px; width:75%;" rows="20" id="preview" name="preview" ng-bind="preview" disabled="">@{{ message }}</textarea>
</div>
<!-- @endverbatim -->

<div my-directive>
</div>

</div>

@include("view.script_includes")

</form>
</section>

</body>

</html>