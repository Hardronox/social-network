<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Profile
 *
 * @property-read \App\User $user
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $location
 * @property string $about
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Profile whereAbout($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile whereLocation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile whereUserId($value)
 */
class Profile extends Model
{
    protected $fillable=['location','about','user_id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
