<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Release;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Releases extends Component
{

    public $releases = [];

    public $status = 'Pending Approval';

    #[Url]
    public $search = '';
    public $releaseId;

    protected $listeners = [
        'releaseSaved' => 'refreshData',
    ];

    public function render()
    {

        $this->refreshData();

        return view('livewire.releases');
    }


    #[On('release-created')]
    public function refreshData(){

        if($this->search === 'all') {

            $this->releases = Release::all();

        } else {

            $this->releases = Release::where('title', 'like', '%'.$this->search.'%')
                ->orWhere('site', 'like', '%'.$this->search.'%')
                ->orWhere('developer', 'like', '%'.$this->search.'%')
                ->get();

        }
    }



    public function setStatus($releaseId)
    {
        $this->releaseId = $releaseId;

        $this->updateStatus();
    }

    public function updateStatus()
    {

       $data =  Release::where('id', $this->releaseId)->first();
       $data->update(['status' => 'Approved']);
    }
}
