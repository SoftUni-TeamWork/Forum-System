@extends('layouts.default')
@section('content')
Оттук може да влезете в профила си:
{{Form::open(array('url' => '/user/login')) }}
{{Form::label('username','Потребителско име')}}
{{Form::text('username',Input::old('username'))}}
<br />
{{Form::label('password','Парола')}}
{{Form::password('password')}}
<br />
{{Form::submit('Впиши ме!')}}
{{Form::close()}}
@stop