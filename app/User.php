<?php

namespace App;

use App\Traits\Friendable;
use App\Events\UserCreatedEvent;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Profile $profile
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $avatar
 * @property string $slug
 * @property bool $gender
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static Builder|\App\User whereAvatar($value)
 * @method static Builder|\App\User whereCreatedAt($value)
 * @method static Builder|\App\User whereEmail($value)
 * @method static Builder|\App\User whereGender($value)
 * @method static Builder|\App\User whereId($value)
 * @method static Builder|\App\User whereName($value)
 * @method static Builder|\App\User wherePassword($value)
 * @method static Builder|\App\User whereRememberToken($value)
 * @method static Builder|\App\User whereSlug($value)
 * @method static Builder|\App\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use Notifiable;
	use Friendable;


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','slug','avatar','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    protected $events = [
        'saved' => UserCreatedEvent::class,
    ];

}
