{{ Form::model($user, [ 'route' => 'user.profile.update', 'method' => 'PUT' ] ) }}
{{ FormField::username() }}
{{ FormField::email() }}
{{ FormField::bio() }}
<hr>
<p>Change Password</p>
{{ FormField::oldPassword() }}
{{ FormField::password() }}
<hr>

<div class="form-group">
    {{ Form::label('allow_twitter', 'Allow Twitter') }}
    {{ Form::checkbox('allow_twitter') }}
</div>
{{ FormField::twitterHandle() }}
<hr>
{{ Form::submit('Save Changes', ['class' => 'btn btn-lg btn-success pull-left']) }}
{{ Form::close() }}