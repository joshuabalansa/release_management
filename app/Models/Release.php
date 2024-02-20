<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Release extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'developer', 
        'development',
        'staging',
        'production',
        'site',
        'peer',
        'project_owner',
        'branch_link',
        'notes',
        'status',
    ];

    /**
     * get title function
     *
     * @return string
     */
    public function getTitle() {

        return $this->title;
    }

     /**
     * get developer function
     *
     * @return string
     */
    public function getDeveloper() {

        return $this->developer;
    }

    /**
     * get development function
     *
     * @return string
     */
    public function getTestedOn($site) {

        if ($site === 'development') {

            $tested_on = $this->development;

        } else if ($site === 'staging') {
            
            $tested_on = $this->staging;
        } else {

            $tested_on = $this->production;
        }

        return $tested_on ? Carbon::parse($tested_on)->format('M d, Y') : 'Not Tested';
    }

    
    /**
     * get staging function
     *
     * @return string
     */
    public function staging() {

        return $this->staging ? $this->staging : 'Not Tested';
    }


    /**
     * get production function
     *
     * @return string
     */
    public function production() {

        return $this->production ? $this->production : 'Not Tested';
    }
}
