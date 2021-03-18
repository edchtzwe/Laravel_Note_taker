@extends('layouts.master')

@section('title')
    {{ $page_title }} - List All
@stop

@section('styles')
    <STYLE>
        table, th, td {
            border:1px solid black;
        }
    </STYLE>
@stop

@section('content')
    <div style="margin-left:auto; margin-right:auto; width:50%;">
        <TABLE style="margin-left:auto; margin-right:auto; border-collapse:collapse;">
            <caption style="text-align:left; font-size:25px;">All Notes</caption>
            <TR>
                <TH>Note Title</TH>
            </TR>
            @foreach ($notes as $note)
            <TR>
                <TD><a href="{{ route('get_note', ['id' => $note->id]) }}">{{ $note->title }}</a></TD>
            </TR>
            @endforeach
        </TABLE>
    </div>
@stop
