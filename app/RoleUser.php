<?php
/**
 * Created by PhpStorm.
 * User: adven
 * Date: 2/1/2017
 * Time: 12:41 PM
 */
namespace App;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{

    protected $table = 'role_users';
    
    protected $fillable = [
            'role_id', 'user_id',
        ];
}