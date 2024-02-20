<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Release;

class Modal extends Component
{
    public $users = [];

    public  $title, 
            $developer, 
            $test_on,
            $site,
            $peer,
            $project_owner,
            $branch_link,
            $notes;

    protected $rules = [
        'title'         => 'required',
        'developer'     => '',
        'test_on'       => 'required',
        'site'          => 'required',
        'peer'          => 'required',
        'project_owner' => 'required',
        'branch_link'   => 'required',
        'notes'         => 'required',
        'status'        => 'in:Pending Approval',
    ];

    public function render()
    {
        return view('livewire.components.modal');
    }

    public function mount() {

        $this->users = User::all();
    }

    public function save() {

        $validator = $this->validate($this->rules);
 
        try {
 
         $release = new Release; 
 
         $release->title = $validator['title'];
         $release->developer = Auth::user()->name;
  
         if ($validator['test_on'] === 'development') {
  
              $release->development = Carbon::now();
  
         } else if($validator['test_on'] === 'staging') {
  
              $release->staging = Carbon::now();
  
         } else {
  
              $release->production = Carbon::now();
  
         }
         $release->site           = $validator['site'];
         $release->peer           = $validator['peer'];
         $release->project_owner  = $validator['project_owner'];
         $release->branch_link    = $validator['branch_link'];
         $release->notes          = $validator['notes'];
  
         $release->save();
 
         $this->resetInput();
 
        } catch (\Exception $e) {
 
             dd($e->getMessage());
        }
        
     }

     public function resetInput() {
            
        $this->title = 
        $this->developer = 
        $this->test_on = 
        $this->site = 
        $this->peer =  
        $this->project_owner = 
        $this->branch_link = 
        $this->notes = "";
    }
}
