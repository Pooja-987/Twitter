<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FriendsList extends Component
{
    public $data;

    protected $listeners = ['refreshList' => 'refreshList'];

    public function refreshList(){
        $refresh;
    }

    public function render()
    {
        $this->data=auth()->user()->follows()->latest()->get();
        return view('livewire.friends-list');
    }
}
