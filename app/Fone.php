<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 24.09.2018
 * Time: 15:23
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Fone extends Model
{
    protected $fillable = [
        'contact',
        'person_id' => 'integer'
    ];

    public function getQueueableRelations()
    {
        // TODO: Change the autogenerated stub
    }

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
