@extends('layouts.master')

@section('title')
    {{ $page_title }} - List All
@stop

@section('styles')
    <STYLE>
        table, th, td {
            border:1px solid black;
        }

        .table-data {
            min-width:70%;
        }

        .center {
            margin-left   : auto;
            margin-right : auto;
            width           : 50%;
        }
    </STYLE>
@stop

@section('content')
    <div class="center">
        <form action="/get_all_notes" method="POST" style="padding: 15px 15px 15px 0px;" name="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
                <input id="title" name="title" placeholder="Search Title..." value="{{ $title_filter }}"/>
                <input style="margin-left:2px;" type="submit" value="Search"/>
        </form>

        <TABLE class="center" style="width:100%; border-collapse:collapse;">
            <caption style="text-align:left; font-size:25px;">All Notes</caption>
            <TR>
                <TH class="table-data">Note Title</TH>
            </TR>
            @foreach ($notes as $note)
            <TR>
                <TD class="table-data"><a href="{{ route('get_note', ['id' => $note->id]) }}">{{ $note->title }}</a></TD>
            </TR>
            @endforeach
        </TABLE>
    </div>
@stop
