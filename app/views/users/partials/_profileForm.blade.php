{{ Form::model($user->getObject(), [ 'route' => 'user.profile.update', 'method' => 'PUT' ] ) }}
{{ FormField::username() }}
{{ FormField::email() }}
{{ FormField::bio() }}
<hr>
<p>Change Password</p>
{{ FormField::oldPassword(['type' => 'password']) }}
{{ FormField::password() }}
<hr>
<div class="form-group">
    <label for="allowTwitter">Allow Twitter</label>
    {{ $user->twitterCheckbox }}
</div>
<div class="form-group">
    <label for="twitterHandle">Twitter Handle</label>
    {{ $user->twitterHandle }}
</div>
<hr>
{{ Form::submit('Save Changes', ['class' => 'btn btn-lg btn-success pull-left']) }}
{{ Form::close() }}
