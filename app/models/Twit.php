<?php

class Twit extends Eloquent {
    protected $fillable = ['twit', 'user_id'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
