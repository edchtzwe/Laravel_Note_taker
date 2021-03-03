<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <title>{{ $title }} - Note Entry</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>


<body>
<section>
<form action="/note/save_edit" method="POST" style="padding: 15px;" name="form">

    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <input type="hidden" id="note_id" name="note_id" value="{{ $id }}">

<div style="text-align: center;" ng-app="">

<div>
    <textarea ng-show="false" rows="4" cols="50" id="firefox-ta-nofill-bug-fix" name="firefox-ta-nofill-bug-fix">{{ $note }}</textarea>
    <textarea rows="4" cols="50" id="message" name="message" required="">{{ $note }}</textarea>
</div>

<div>
    <textarea rows="4" cols="50" id="preview" name="preview" disabled="">{{ $note }}</textarea>
</div>

<input type="submit" value="Submit"/>

</div>
</form>
</section>

</body>

</html>