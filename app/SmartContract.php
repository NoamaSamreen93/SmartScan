<?php
/**
 * Created by PhpStorm.
 * User: noama
 * Date: 7/10/2020
 * Time: 12:11 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SmartContract extends Model
{
    use Notifiable;
    protected $fillable = [
        'sourcecode',
    ];

}