<?php

namespace App;

use App\CostumSql;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = ['label','description','time_unit','due_date','d_day','created_by'];
    //
    //
    public function getEnumTimeUnit(){
    	$sql = new CostumSql('reminders');
    	return $sql->getEnumValues('time_unit'); //dia akan mengambil enum values (isi enum) dari kolom time_unit
    }
}
