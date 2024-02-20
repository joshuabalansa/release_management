<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Release;


class Releases extends Component
{

    public $releases = [];
    
    public $status = 'Pending Approval';

    public $search = '';

    public function render()
    {
        $this->releases = Release::where('title', 'like', '%'.$this->search.'%')
        ->orWhere('site', 'like', '%'.$this->search.'%')
        ->orWhere('developer', 'like', '%'.$this->search.'%')
        ->get();

        return view('livewire.releases');
    }

    public function setStatus(Int $id) {
        Release::find($id)->update(['status', 'Approved']);
    }


}
