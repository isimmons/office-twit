<?php namespace OfficeTwit\Presenters;

use User;
use Config;
use OfficeTwit\Exceptions\BadSettingNameException;

class UserPresenter extends Presenter {

    protected $resource;

    public function __construct(User $resource)
    {
        $this->resource = $resource;
    }

    /**
    * Returns user settings for use as a separate object
    *
    * @return stdClass $this->resource->settings
    */
    public function getSettings()
    {
        return json_decode($this->resource->settings);
    } 

    
    /**
    * Checks if a user setting is disabled in the default app config
    *
    * @param string $setting
    * @return mixed
    */
    public function settingDisabled($setting)
    {
        return Config::get("officeTwit.{$setting}");                 
    }

    public function gravitar($size = 60)
    {
        $settings = $this->getSettings();

        $gravitar = isset($settings->gravitar) ? $settings->gravitar : null;

        return $gravitar;
    }   
}