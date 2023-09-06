<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickuppoint extends Model
{
    use HasFactory;
    protected $fillable=['pickup_name','pickup_address','pickup_phone_one','pickup_phone_two'];
}
