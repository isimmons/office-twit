<?php namespace OfficeTwit\Presenters;

use Illuminate\Support\Collection;

class CollectionPresenter extends Collection {

    public function __construct($presenter = null, Collection $collection)
    {
        foreach ($collection as $key => $resource) {
            $collection->put($key, new $presenter($resource));
        }

        $this->items = $collection->toArray();    
    }
}
