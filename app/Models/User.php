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

    function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission(string $permission): bool
    {
        $permissionsArray = [];

        // Loop through each role assigned to the user
        foreach ($this->roles as $role) {
            // For each role, loop through the permissions associated with that role
            foreach ($role->permissions as $singlePermission) {
                // Store the permission names in an array
                $permissionsArray[] = $singlePermission->name;
            }
        }

        // Convert the array to a collection, remove duplicates, and check if it contains the desired permission
        return collect($permissionsArray)->unique()->contains($permission);
//        dd($permissionsArray);
    }



}
