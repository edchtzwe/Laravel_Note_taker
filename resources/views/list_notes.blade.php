<!DOCTYPE HTML>
<HTML>
   <HEAD>
      <TITLE>Note Taker Index</TITLE>
      <META content="text/html; charset=utf-8" http-equiv=Content-Type>
      <STYLE type=text/css></STYLE>
      <META name=author content="Edmund Chong">
      <META name=description content="The landing page for the NoteTaker app">
      <META name=keywords content="Note Scratchpad Notepad ">
      <STYLE>
        table, th, td {
            border:1px solid black;
        }
      </STYLE>
   </HEAD>
   <BODY>
        <SPAN style="FONT-SIZE: 36px">
           <H1 style="text-align:center;">All Notes</H1>
        </SPAN>
        <TABLE style="margin-left:auto; margin-right:auto; border-collapse:collapse;">
            <TR>
                <TH>Note Title</TH>
            </TR>
            @foreach ($notes as $note)
            <TR>
                <TD><a href="{{ route('get_note', ['id' => $note->id]) }}">{{ $note->title }}</a></TD>
            </TR>
            @endforeach
        </TABLE>
   </BODY>
</HTML>
