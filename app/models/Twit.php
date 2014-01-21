<?php

class Twit extends Eloquent {
    protected $fillable = ['twit'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
