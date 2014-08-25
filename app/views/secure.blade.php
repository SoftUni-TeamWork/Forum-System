@extends('layouts.logged')
@section('content')
Здравей, потребител {{Auth::user()->username}}!<br />
Тук ще видите всички коментари
<br />
<?php
//print_r($n1['title']);
for ($index = 1; $index <= $count; $index++) {
    $name='n'.$index;
    print_r($$name);
    
}
?>
@stop