<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\User;

class Search extends Component
{
    public $users;
    public $search;
    public $name;
    protected $queryString = ['name'];

    public function searchUser(User $u){
        $this->search=$u->search($this->name);
    }

    public function goBack(){
        $this->search=User::where('id','!=',auth()->user()->id)->get();
        $this->name='';
    }

    public function render()
    {
        if(!isset($this->search)){
            $this->users=User::where('id','!=',auth()->user()->id)->get();
        }else{
            $this->users=$this->search;
        }

        return view('livewire.search');
    }
}
