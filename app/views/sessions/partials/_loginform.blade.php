{{ Form::open(['url' => 'login']) }}
{{ FormField::username() }}
{{ FormField::password() }}
<a href="#" class="forgot-password">Forgot Password</a>
{{ link_to('register', 'Register a new account', ['class' => 'register-new']) }}
{{ Form::submit('Login', ['class' => 'btn btn-lg btn-success pull-right']) }}
{{ Form::close() }}