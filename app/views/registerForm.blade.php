@extends('layouts/default')
@section('content')
{{ Form::open(array('url' => '/user/register/new')) }}
{{Form::label('username','Потребителско име')}}
{{Form::text('username',Input::old('username'))}}
<div style="color: red">
{{$errors->first('username')}}
</div>
<br />
{{Form::label('password','Парола')}}
{{Form::password('password')}}
<div style="color: red">
{{$errors->first('password')}}
</div>
<br />
{{Form::submit('Създай ме!')}}
{{ Form::close() }}
{{$errors->first('msg')}}
@stop