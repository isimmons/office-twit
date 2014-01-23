{{ Form::model($user->getObject(), [ 'route' => 'user.profile.update', 'method' => 'PUT' ] ) }}
{{ FormField::username() }}
{{ FormField::email() }}
{{ FormField::bio() }}
<hr>
<p>Change Password</p>
{{ FormField::oldPassword(['type' => 'password']) }}
{{ FormField::newPassword(['type' => 'password']) }}
<hr>

@if(! $user->settingDisabled('allowTwitter'))
    <p>Twitter settings have been disabled by the system administrator.</p>
@else
<div class="form-group">
    <label for="allowTwitter">Allow Twitter</label>
    {{ Form::checkbox('allowTwitter', $user->getSettings->allowTwitter, $user->getSettings->allowTwitter, ['id' => 'allowTwitter']) }}
</div>
<div class="form-group">
    <label for="twitterHandle">Twitter Handle</label>
    {{ Form::text('twitterHandle', $user->getSettings->twitterHandle, ['class' => 'form-control']) }}
</div>
@endif

<hr>
{{ Form::submit('Save Changes', ['class' => 'btn btn-lg btn-success pull-left']) }}
{{ Form::close() }}
