{{ Form::model($user, [ 'route' => 'user.profile.update', 'method' => 'PUT' ] ) }}
{{ FormField::username() }}
{{ FormField::email() }}
{{ FormField::bio() }}
<hr>
<p>Change Password</p>
{{ FormField::oldPassword() }}
{{ FormField::password() }}
<hr>

@if(isset($settings))
    {{ Form::settings($settings) }}
@endif

<hr>
{{ Form::submit('Save Changes', ['class' => 'btn btn-lg btn-success pull-left']) }}
{{ Form::close() }}