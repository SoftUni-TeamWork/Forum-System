@extends('layouts.default')
@section('content')
{{Form::open(array('url' => 'user-register')) }}
{{Form::label('username', 'Потребителско име')}}
{{Form::text('username', Input::old('username'))}}
@if($errors->has('username')
<span class="error">
    {{$errors->first('username')}}
</span>
@endif
<br/>
{{Form::label('password','Парола')}}
{{Form::password('password')}}
@if($errors->has('password')
<span class="error">
    {{$errors->first('password')}}
</span>
@endif
<br/>
{{Form::label('password-confirm','Потвърди паролата')}}
{{Form::password('password-confirm')}}
@if($errors->has('password-confirm')
<span class="error">
    {{$errors->first('password-confirm')}}
</span>
@endif
<br/>
{{Form::label('email', 'Email')}}
{{Form::email('email')}}
@if($errors->has('email')
<span class="error">
    {{$errors->first('email')}}
</span>
@endif
<br/>
{{Form::submit('Създай ме!')}}
{{Form::close()}}
@stop