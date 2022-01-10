<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Post;

class Profile extends Model
{
    use HasFactory;
    /*public function viewStudent()
    {
        $student = Post::all();
        $results = DB::select('select * from users where id = :id', ['id' => 1]);
    } */

}