<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>{{ $title }} - Index</TITLE>
        <META content="text/html; charset=utf-8" http-equiv=Content-Type>
        <STYLE type=text/css></STYLE>
        <META name=author content="Edmund Chong">
        <META name=description content="The landing page for the NoteTaker app">
        <META name=keywords content="Note Scratchpad Notepad ">
        <STYLE>
            .button {
                width: 150px;
            }
        </STYLE>
    </HEAD>
    <BODY>
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
        <H1 style="text-align:center">{{ $heading }}</H1>
        <DIV style="margin-top:100px; text-align:center;">
            <DIV>
                <input class="button" type="button" value="View All" onclick="window.location.href = '{{ route('list_notes') }}'">
            </DIV>
            <DIV STYLE="margin-top:5px;">
                <input class="button" type="button" value="Create New" onclick="window.location.href = '{{ route('create_new') }}'">
            </DIV>
        </DIV>
    </BODY>
</HTML>