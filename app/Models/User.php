<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Subscription;
use Illuminate\Support\Carbon;

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
        'company_name',
        'user_type'
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
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->user_type === 'admin';  // Assuming 'admin' is the value for admin users
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function contactDetail()
    {
        return $this->hasOne(ContactDetail::class);
    }

    public function socialMediaDetail()
    {
        return $this->hasOne(SocialMediaDetail::class);
    }

    public function companyDetail()
    {
        return $this->hasOne(CompanyDetail::class);
    }

    public function portServiceDetail()
    {
        return $this->hasMany(PortServiceDetail::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function serviceProviderDetail()
    {
        return $this->hasOne(ServiceProviderDetail::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(ServiceReview::class, 'service_provider_id');
    }

    // getActiveSubscriptionForPlan only used in UserListController for Admin
    // get data using Plan Id
    public function getActiveSubscriptionForPlan($planId)
    {
        $today = Carbon::today();

        return $this->subscriptions
            ->where('plan_id', $planId)
            ->where('end_date', '>=', $today)
            ->sortByDesc('end_date')
            ->first();
    }

    // getActiveSubscription only used in ListingController for listing page front
    public function getActiveSubscription()
    {
        return $this->subscriptions()
            ->whereDate('end_date', '>=', Carbon::today())
            ->latest('created_at')
            ->first();
    }

    /**
     * Get the latest subscription for a specific plan (even if expired)
     */
    public function getLatestSubscriptionForPlan($planId)
    {
        return $this->subscriptions()
            ->where('plan_id', $planId)
            ->latest('end_date')
            ->first();
    }

    public function serviceReviews()
    {
        return $this->hasMany(ServiceReview::class, 'service_provider_id');
    }
}
