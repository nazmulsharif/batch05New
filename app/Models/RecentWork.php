<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecentWorkCategory;
use App\Models\User;
class RecentWork extends Model
{
    use HasFactory;
    public function category(){
        return $this->hasOne(RecentWorkCategory::class,'id','category_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
