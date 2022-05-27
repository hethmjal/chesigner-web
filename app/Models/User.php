<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password','profile_photo_path','type','background_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function about()
    {
        return $this->hasOne(AboutDesigner::class);
    }

    public function educationes()
    {
        return $this->hasMany(Education::class);
    }
    public function experinces()
    {
        return $this->hasMany(Experience::class);
    }
    
    public function programes()
    {
        return $this->hasMany(Programer::class);
    }


    public function workinghours()
    {
        return $this->hasMany(WorkingHours::class,'user_id');
    }


    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    
    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }
    public function orders_work()
    {
        return $this->hasMany(Order_Work::class,'designer_id');
    }
    public function conversations()
    {
        return $this->belongsToMany(Conversation::class,'participants')->latest('last_message_id');
    }
    
    public function sentMessages()
    {
        return $this->hasMany(Message::class,'user_id','id');
    }
    
    public function receivedMessages()
    {
        return $this->belongsToMany(Message::class,'recipients')->withPivot([
            'read_at','deleted_at'
        ]);
    }

  /*  public function Packages()
    {
        return $this->hasMany(Packages::class,'designer_packages','user_id','packages_id');
    }*/
    

    public function Packages()
    {
        return Packages::get();
    }
    
    public function subscriptions()
    {
        return $this->hasMany(Subscriptions::class,'designer_id');
    }
    public function challenges()
    {
        return $this->hasMany(Challenge::class,'user_id');
    }
    

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class,'user_id');
    }

 
    public function reviews()
    {
        return $this->hasMany(Evaluation::class,'designer_id');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class,'user_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class,'user_id');
    }

    
    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id');
    }

    public function reportsTo()
    {
        return $this->hasMany(Report::class,'to');
    }

    public function reportsFrom()
    {
        return $this->hasMany(Report::class,'from');
    }

    public function favoriteDesigner()
    {
        return $this->hasMany(FavoriteDesigner::class,'designer_id');
    }
}