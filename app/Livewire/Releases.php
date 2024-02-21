<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Release;
use Livewire\Attributes\On;

class Releases extends Component
{

    public $releases = [];
    
    public $status = 'Pending Approval';

    public $search = '';

    protected $listeners = [
        'releaseSaved' => 'refreshData', 
    ];

    public function render()
    {
        $this->refreshData();

        return view('livewire.releases');
    }

    public function setStatus($id) {

        Release::find($id)->update(['status' => 'Approved']);
    }

    #[On('release-created')] 
    public function refreshData(){
        
            $this->releases = Release::where('title', 'like', '%'.$this->search.'%')
                ->orWhere('site', 'like', '%'.$this->search.'%')
                ->orWhere('developer', 'like', '%'.$this->search.'%')
                ->get();
    }
}
