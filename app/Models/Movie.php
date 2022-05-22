<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot(['rented_at'])
            ->wherePivot('rented_at', '<', Carbon::now())
            ->WherePivot('rented_at', '>=', Carbon::now()->subDays(config('app.rentDaysPeriod')))
            ;
    }

    public function attachUser(User $user) {
        if(! $this->isActiveRental($user)) {

            $this->users()->attach([$user->id], ['rented_at' => Carbon::now()]);
            sleep(1);
            return ['success' => true];
        }
        return ['success' => false, 'msg' => 'This movie is already rented'];
    }

    public function isActiveRental(User $user): bool
    {
        return $this->users()->where(['user_id' => $user->id])->count() !== 0;
    }

    public function scopeActive($query) {
        $pivot = $this->users()->getTable();

        $query->whereHas('users', function ($q) use ($pivot) {
            $q->where("{$pivot}.rented_at", '<', Carbon::now())
                ->where("{$pivot}.rented_at", '>=', Carbon::now()->subDays(config('app.rentDaysPeriod')))
            ;
        });
    }
}
