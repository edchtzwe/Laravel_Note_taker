<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <title>{{ $title }} - Note Entry</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <style>
        div.justified {
            display : flex;
            justify-content : center;
        }
    </style>
</head>


<body>
<section>
<div class="justified">
    <textarea rows="25" cols="75" id="preview" name="preview" disabled="">{{ $note }}</textarea>
</div>
</section>

</body>

</html>