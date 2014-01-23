<?php namespace OfficeTwit\Presenters;

use Illuminate\Support\Collection;
use OfficeTwit\Presenters\Presenter;

class CollectionPresenter extends Collection {

    

    public function __construct(Presenter $presenter, Collection $collection)
    {
        foreach($collection as $key => $resource)
        {
            $collection->put($key, new $presenter($resource));
        }

        $this->items = $collection->toArray();
        
    }

    

}