<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 24.09.2018
 * Time: 15:26
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'position',
    ];

    public function getQueueableRelations()
    {
        // TODO: Change the autogenerated stub
    }

    public function alevel_members()
    {
        return $this->hasMany('App\Alevel_member');
    }

    public function contact_persons()
    {
        return $this->hasMany('App\Contact_person');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
