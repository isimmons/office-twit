<?php namespace OfficeTwit\Presenters;

use User;

class UserPresenter extends Presenter {

    protected $resource;

    protected $settings;

    public function __construct(User $resource)
    {
        $this->resource = $resource;
        
        $this->settings = json_decode($this->resource->settings);
    } 

    public function twitterCheckbox()
    {
        if(isset($this->settings->allowTwitter))
        {
            $checkbox = ($this->settings->allowTwitter)
                ? '<input type="checkbox" name="allowTwitter" value="1" CHECKED />'
                : '<input type="checkbox" name="allowTwitter" value="0" />';
        }
        else {
            $checkbox = '<input type="checkbox" name="allowTwitter" value="0" />';
        }

        return $checkbox;
    }

    public function twitterHandle()
    {
        if(isset($this->settings->twitterHandle))
        {
            $input = "<input type='text' name='twitterHandle' value='{$this->settings->twitterHandle}' class='form-control' />";
        }
        else
        {
            $input = '<input type="text" name="twitterHandle" class="form-control" />';
        }
        
        return $input;
    }   
}