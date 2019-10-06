<?php

namespace App;

use App\ReferralProgram;
use App\ReferralLink;
use Laravel\Passport\HasApiTokens;
use Laravel\Cashier\Billable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','last_name','street_name','house_no','post_code','residence','password','billable','referrer_id','referral_token','referral_unique_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $appends = ['referral_link'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getReferrals()
    {
        return ReferralProgram::all()->map(function ($program) {
            return ReferralLink::getReferral($this, $program);
        });
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    //USED NOW
    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('/', ['ref' => $this->referral_unique_id]);
    }
}
