<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $table = "water_service_populations";

    protected $fillable = [
        'actual_population_served',
        'date_time' ,
        'executing_unit' ,
        'percentage_of_population_served' ,
        'population_in_served_area' ,
        'remarks' ,
    ];
}
