@extends('layouts/secure1')
@section('content')
Здравей, потребител {{Auth::user()->username}}!<br />
Кликнете на начало, за да видите всички коментари
@stop