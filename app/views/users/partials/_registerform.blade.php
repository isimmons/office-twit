{{ Form::open(['url' => 'register']) }}
{{ FormField::username() }}
{{ FormField::email() }}
{{ FormField::password() }}
{{ Form::submit('Register', ['class' => 'btn btn-lg btn-success pull-right']) }}
{{ Form::close() }}