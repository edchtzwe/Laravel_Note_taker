<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <title>Note Entry</title>
</head>

<body>

<section>
<form action="/note/save" method="POST" style="padding: 15px;" name="form">

    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

<div>
    <label for="message">Note</label>
    <textarea placeholder="" rows="4" cols="50" id="message" name="message" required=""></textarea>
</div>

<div>
    <input type="submit" value="submit"/>
</div>

</form>
</section>

</body>

</html>