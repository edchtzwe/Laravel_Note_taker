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
<div style="text-align: center;">
<input type="button" value="Edit" onclick="window.location.href = '{{ route('edit_note', ['id' => $id]) }}'">
<input type="button" value="Delete" onclick="window.location.href = '{{ route('delete_note', ['id' => $id]) }}'">
</div>
</section>

</body>

</html>