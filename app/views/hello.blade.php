@extends('layouts/default')
@section('content')
Добре дошли!<br />
@for ($i=1;$i<=$count;$i++)
<?php
$ides='n'.$i;
echo '<pre>'.print_r($$ides,true).'</pre>';

?>
@endfor
@stop