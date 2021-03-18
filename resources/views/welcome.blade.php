@extends('layouts.master')

    {{--
    {{ }} are blade echo statements.
    They're equivalent to < ?php echo $heading ?>
    but with XSS prevention. Just imagine $heading
    came from user input data.
    You can also call any PHP function in {{  }}
    ie. {{ time() }}
    or you can even use blade's @json directive to turn an assoc array into JSON data
    like
    <script>
        var jsonData = @json($array);
        /*
        or
        var jsonData = @json($array, JSON_PRETTY_PRINT);
        */
    </script>
    but of course, if you ABSOLUTELY have to print unescaped strings (XSS alert man, beware)
    do {!! $stringToBePrintedUnescaped !!}
    --}}
@section('title')
    {{ $page_title }} - Index
@stop

@section('content')
    <DIV style="margin-top:100px; text-align:center;">
        <DIV>
            <input class="button" type="button" value="View All" onclick="window.location.href = '{{ route('list_notes') }}'">
        </DIV>
        <DIV STYLE="margin-top:5px;">
            <input class="button" type="button" value="Create New" onclick="window.location.href = '{{ route('create_new') }}'">
        </DIV>
    </DIV>
@stop
