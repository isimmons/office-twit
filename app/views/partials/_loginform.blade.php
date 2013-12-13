{{ Form::open() }}
{{ FormField::username() }}
{{ FormField::password() }}
<a href="#" class="forgot-password">Forgot Password</a>
{{ Form::submit('Login', ['class' => 'btn btn-lg btn-success pull-right']) }}
{{ Form::close() }}