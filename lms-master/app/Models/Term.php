<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
    use HasFactory;


    protected $guarded = [];

    // make difference get lists for super-admin and other roles.
    // this part helps us to get clear list of supervisior and teacher with 
    // correct access to each term

    /** @phpstan-ignore-next-line */
    public function scopeGetParticipants(Builder $builder)
    {

        if (!auth()->user()->hasAnyRole(['Super-Admin', 'mentor', 'supervisor'])) {
            /** @phpstan-ignore-next-line */
            return $builder->whereHas(
                'Participants',
                function ($q) {
                    $q->where('user_id',  auth()->user()->id);
                }
            );
        }
    }

    /** @phpstan-ignore-next-line */
    public function scopeMyCourse(Builder $builder, $studentRoleId = 4, $user_id = 0)
    {
        $user_id = $user_id > 0 ? $user_id : auth()->user()->id;
        /** @phpstan-ignore-next-line */
        return $builder->whereHas(
            'Participants',
            function ($q) use ($studentRoleId, $user_id) {
                $q->where('user_id', $user_id);
                $q->where('role_id', $studentRoleId);
            }
        );
    }


    public function Department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function Course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function Participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot(["id", "role_id"]);
    }

    public function Sessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class)->withPivot(["id", "order"])->orderBy('order');
    }

    public function getAllActivitiesAttribute()
    {
        $activities = [];
        $sessions = [$this->Sessions];
        if (!isset($sessions[0])) return;
        foreach ($sessions[0] as $session) {
            $activities = array_merge($activities, $session->Related->all());
        }

        return new Collection($activities);
    }
   
    public function users()
    {
        return $this->belongsToMany(User::class, 'term_user')->withPivot('role_id','finish_date','term_title', 'course_title');
    }


    public function connectedUsers()
    {
        return $this->belongsToMany(User::class, 'term_user');
    }

    public function sessionTerms()
    {
        return $this->hasMany(SessionTerm::class);
    }

    public function usersEnroll()
    {
        return $this->belongsToMany(User::class, 'term_user', 'term_id', 'user_id')
            ->withPivot('role_id')
            ->using(term_user::class);
    }

    public function WorkoutByUser(User $user): HasMany
    {
        return $this->hasMany(Workout::class)->where('user_id', $user->id);
    }
    /*public function termUser()
    {
        return $this->belongsToMany(Course::class, 'term_user', 'term_id', 'course_id')
            ->withPivot('id'); // Include additional pivot columns if needed
    }*/
   
}
