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
    {{ Form::checkbox('allowTwitter', $settings->allowTwitter, ['CHECKED' => 'CHECKED']) }}
</div>
<div class="form-group">
    {{ Form::label('twitterHandle', 'Twitter Handle') }}
    {{ Form::text('twitterHandle', $settings->twitterHandle, ['class' => 'form-control']) }}
</div>

<hr>
{{ Form::submit('Save Changes', ['class' => 'btn btn-lg btn-success pull-left']) }}
{{ Form::close() }}