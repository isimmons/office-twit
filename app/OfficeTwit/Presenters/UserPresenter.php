<?php namespace OfficeTwit\Presenters;

use User;

class UserPresenter extends Presenter {

    protected $resource;

    public function __construct(User $resource)
    {
        $this->resource = $resource;
    } 

    public function twitterSettings()
    {
        //sample json settings: {"allowTwitter":"1","twitterHandle":"isimmons33"}

//         $twitterSettings = <<<EOF
// <div class="form-group">
//     <label for="allow_twitter">Allow Twitter</label>
//     <input type="checkbox" name="allowTwitter" value="1" CHECKED />
// </div>
// <div class="form-group">
//     <label for="twitterHandle">Twitter Handle</label>
//     <input type='text' name='twitterHandle' value='{$settings->twitterHandle}' class='form-control' />
// </div>
// EOF;
//     return $twitterSettings;
        
        return $this->resource->settings;
    }   
}