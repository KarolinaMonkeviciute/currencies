<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

class ItemRepository
{
    protected $item;

    public function __construct(Item $item){
        $this->item = $item;
    }

    public function showAll(): Collection{
        return Item::all();
    }

    public function save(array $data): void{
        Item::create($data);
    }

    public function edit(array $data, Item $item): void{
        $item->update($data);
    }

    public function destroy(Item $item): void{
        $item->delete();
    }
}