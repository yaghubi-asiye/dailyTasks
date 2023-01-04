<?php

namespace TaskApp;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Task extends Model
{
    protected $fillable=['title', 'description', 'user_id'];

    public static function schema()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->string('description', 500);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
