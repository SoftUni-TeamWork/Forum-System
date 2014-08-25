@extends('layouts.logged')
@section('content')
Здравей, потребител {{Auth::user()->username}}!<br />
Тук ще видите всички коментари
@stop