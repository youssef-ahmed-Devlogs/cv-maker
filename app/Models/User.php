<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'gender',
        'role',
        'phone',
        'about_me',
        'country_id',
        'city_id',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function photo()
    {
        return $this->photo ? asset('storage/' . $this->photo) : asset('images/user_' . $this->gender . '.jpg');
    }

    public function isAdmin()
    {
        return strtolower(trim($this->role)) == 'admin';
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function cvs()
    {
        return $this->hasMany(Cv::class)->latest();
    }

    public function subscriptionExpiration($returnSubscription = null)
    {
        $subscription = $this->subscriptions->where('payment_status', 'PAID')->first();

        $current_date = new \DateTime();
        $exp_date = new \DateTime($subscription->expiration_date ?? '');
        $diff = $current_date->diff($exp_date);
        $result = $diff->d + ($diff->m * 30) + ($diff->y * 365); // Convert all to days

        if ($result && $returnSubscription)
            return $subscription;
        elseif ($returnSubscription)
            return null;

        return $result;
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class)->latest();
    }

    public function has_subscription()
    {
        return $this->pro_subscription() ?? $this->free_subscription() ?? false;
    }

    public function free_subscription()
    {
        $subscription = $this->subscriptions->where('plan', 'FREE')->first();

        if ($subscription)
            return $subscription;

        return 0;
    }

    public function pro_subscription()
    {
        return $this->subscriptionExpiration(true);
    }
}
