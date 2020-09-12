<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Tymon\JWTAuth\Contracts\JWTSubject;

//class Irf extends Authenticatable implements JWTSubject
use Illuminate\Database\Eloquent\Model;
class Irf extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                             //Basic Details
                            'name', 
                            'gender',
                            'age',
                            'address',
                            'city',
                            'province',
                            'postal_code',
                            'country',
                            //Contact Details
                            'home_no',
                            'cell_no',
                            'work_no',
                            'emergency_cntName',
                            'emergency_contNo',
                            'email_id',
                            'first_language',
                            'refer_through',
                            'child_program',
                            //Community Matters Program
                            'after_school_program',
                            'health',
                            'employment',
                            'staff',
                            'neighbourhood_net',
                            'others',
                            'agent_notes',
                            //Member Details - Questions
                            'ques_1',
                            'ques_2',
                            'ques_3',
                            'ques_4',
                            'ques_5',
                            'ques_6',
                            'ques_7',
                            'family_doctor',
                            'walkin_clinic',
                            'emergency_room',
                            'hospital',
                            'ques_8',
                            'ques_9',
                            'ques_10',
                            ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
                        'remember_token',
                    ];
    
    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }
    // public function getJWTCustomClaims()
    // {
    //     return [];
    // }
    
}