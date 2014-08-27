@extends('layouts.default')
@section('content')
{{Form::open(array('url' => '/user/register')) }}
{{Form::label('username', 'Потребителско име')}}
{{Form::text('username', Input::old('username'))}}
<span class="error">
    {{$errors->first('username')}}
</span>
<br />
{{Form::label('password','Парола')}}
{{Form::password('password')}}
<span class="error">
    {{$errors->first('password')}}
</span>
<br />
{{Form::label('password-confirm','Потвърди паролата')}}
{{Form::password('password-confirm')}}
<span class="error">
    {{$errors->first('password-confirm')}}
</span>
<br />
{{Form::label('email', 'Email')}}
{{Form::email('email')}}
<span class="error">
    {{$errors->first('email')}}
</span>
<br />
{{Form::submit('Създай ме!')}}
{{Form::close()}}
@stop