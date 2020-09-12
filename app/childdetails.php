<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class childdetails extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [ 'Child_FirstName' ,
                            'Child_LastName',
                            'Child_DOB',
                            'Child_Gender' 
                        ];
    
}