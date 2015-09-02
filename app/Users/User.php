<?php namespace DevMentor\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'username', 'token', 'avatar'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['token', 'remember_token'];

    /**
     * Returns the username for the user
     *
     * @return string
     */
    public function username()
    {
        return $this->attributes['username'];
    }

    /**
     * Returns the profile url for the user
     *
     * @return string
     */
    public function profile()
    {
        return 'https://github.com/' . $this->username();
    }

    /**
     * Returns the avatar url for the user
     *
     * @return string
     */
    public function avatar()
    {
        return $this->attributes['avatar'];
    }
}
