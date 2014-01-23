<?php namespace OfficeTwit\Presenters;

use Illuminate\Support\Collection;

class CollectionPresenter extends Collection {

    protected $presenter;
    protected $collection;

    public function __construct($presenter, Collection $collection)
    {
        $this->presenter = $presenter;
        $this->collection = $collection;
        $this->wrapCollectionItems();
    }

    protected function wrapCollectionItems()
    {
        foreach($this->collection as $key => $resource)
        {
            $this->collection->put($key, new $this->presenter($resource));
        }

        $this->items = $this->collection->toArray();
    }

}