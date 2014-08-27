@extends('layouts.default')
@section('content')
Оттук може да влезете в профила си:

{{ Form::open(array('url' => URL::route('user-login'))) }}
{{Form::label('username','Потребителско име')}}
{{Form::text('username',Input::old('username'))}}
@if($errors->has('username'))
<span class="error">
    {{$errors->first('username')}}
</span>
@endif
<br/>
{{Form::label('password','Парола')}}
{{Form::password('password')}}
@if($errors->has('password'))
<span class="error">
    {{$errors->first('password')}}
</span>
@endif
<br/>
{{Form::submit('Впиши ме!')}}
<br/>
@if(Session::get('login-fail'))
<span class="error">
    {{Session::get('login-fail')}}
</span>
@endif
{{Form::close()}}
@stop