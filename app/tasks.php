<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
 public $table='task';
 public $primaryKey ='id';

    protected $fillable = ['id','name','status', 'content', 'showtime', 'src'];

}
