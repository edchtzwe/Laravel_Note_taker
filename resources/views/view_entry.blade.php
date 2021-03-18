@extends('layouts.master')

@section('title')
    {{ $page_title }} - View Entry
@stop

@section('styles')
    <style>
        div.justified {
            display : flex;
            justify-content : center;
        }
    </style>
@stop

@section('content')
<section>

<h1 style="text-align:center;">
    {{ $title }}
</h1>

<div class="justified">
    <textarea style="width:75%;" rows="35" id="preview" name="preview" disabled="">{{ $note }}</textarea>
</div>

<div style="text-align: center; margin-top:10px;">
<input type="button" value="Edit" onclick="window.location.href = '{{ route('edit_note', ['id' => $id]) }}'">
<input type="button" value="Delete" onclick="window.location.href = '{{ route('delete_note', ['id' => $id]) }}'">
</div>

</section>

@stop
