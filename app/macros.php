<?php 

Form::macro('settings', function($settings)
{
$formSettings = <<<EOF
<div class="form-group">
    <label for="allow_twitter">Allow Twitter</label>
    <input type="checkbox" name="allowTwitter" value="{$settings->allowTwitter}" CHECKED />
</div>
<div class="form-group">
    <label for="twitterHandle">Twitter Handle</label>
    <input type="text" name="twitterHandle" value="{$settings->twitterHandle}" class="form-control" />
</div>
EOF;
    return $formSettings;
});