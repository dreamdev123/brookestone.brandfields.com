<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kalnoy\Nestedset\NodeTrait;
use Kalnoy\Nestedset\QueryBuilder;

class User extends Authenticatable
{
    use Notifiable;
    use NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'customer_id', 'phone', 'email', 'sponsor_id', 'password', 'parent_id', '_lft', '_rgt'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function referrer() {
        return $this->belongsTo('App\User', 'sponsor_id');
    }

    public function referrers() {
        return $this->hasMany('App\User', 'sponsor_id');
    }
    
    function resetHierarchy()
    {
        $this->parentColumn = 'parent_id';
        $this->leftColumn = 'LHS';
        $this->rightColumn = 'RHS';

        return $this;
    }

    function applySponsorHierarchy()
    {
        $this->parentColumn = 'sponsor_id';
        $this->leftColumn = 'SLHS';
        $this->rightColumn = 'SRHS';

        return $this;
    }

    public function descendantsQuery($type = null, $andSelf = false)
    {
        switch ($type) {
            case 'placement':
                $this->resetHierarchy();
                break;
            case 'sponsor':
                $this->applySponsorHierarchy();
                break;
        }

        return $this->newQuery()->whereDescendantOf($this, 'and', false, $andSelf);
    }

    public function getLftName()
    {
        return '_lft';
    }

    public function getRgtName()
    {
        return '_rgt';
    }

    public function getParentIdName()
    {
        return 'parent_id';
    }

    // Specify parent id attribute mutator
    public function setParentAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }
}
