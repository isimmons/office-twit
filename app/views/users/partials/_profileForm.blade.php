<div class="container">
    <div class="col-md-4">
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
    </div><!--end .col-md-4-->

    <div class="col-md-4">
        <div class="form-group">
            <label for="gravitar">Gravitar Email</label>
            {{ Form::text('gravitar', $user->getSettings->gravitar, ['class' => 'form-control']) }}
        </div>
    </div><!--end .col-md-4-->
</div><!--end .container-->

<div class="container">
    <div class="col-md-4">
    {{ Form::submit('Save Changes', ['class' => 'btn btn-lg btn-success pull-left']) }}
    {{ Form::close() }}
    </div><!--end .col-md-4-->
</div><!--end .container-->

