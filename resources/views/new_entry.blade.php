@extends('layouts.master')

@section('title')
    {{ $page_title }} - Add New
@stop

@section('content')
<section>
<form action="/note/save" method="POST" style="padding: 15px;" name="form">

    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

<div ng-app="myApp" ng-controller="myController" style="text-align: center;">

	<div>
		<input style="width:75%;" id="title" name="title" placeholder="Note Title..." value="">
	</div>

	<div style="margin-top: 10px;">
		<textarea placeholder="Enter Your Notes Here..." style="width:75%;" rows="20" id="message" name="message"required=""></textarea>
	</div>

	<div style="margin-top:10px;" my-directive></div>

</div>

@include("layouts.script_includes")

</form>
</section>
@stop
