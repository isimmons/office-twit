<?php namespace OfficeTwit\Presenters;

class Presenter {
    
    public function __get($name)
    {
        if(method_exists($this, $name))
        {
            return $this->{$name}();
        }

        return $this->resource->{$name};
    }

    public function __call($name, $arguments)
    {
        if(method_exists($this, $name))
        {
            return $this->{$name}();
        }
    }

    public function getObject()
    {
        return $this->resource;
    }

    public function getArray()
    {
        return $this->resource->toArray();
    }
}