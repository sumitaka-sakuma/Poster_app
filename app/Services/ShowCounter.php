<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Models\Follower;

class ShowCounter{

    private $user;
    private $post;
    private $follower;

    public function __construct(){

        $user = new User();
        $post = new Post();
        $follower = new Follower();

        return $user.$post.$follower;
    }
}