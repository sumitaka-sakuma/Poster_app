<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Post;
use App\Models\Follower;


class UsersController extends Controller
{
    
    //一覧表示
    public function index(User $user)
    {

        $all_users = $user->getAllUsers(auth()->user()->id);

        return view('users.index', [
            'all_users' => $all_users
        ]);
    }

    //新規投稿入力画面
    public function create()
    {
        //
    }

    //新規投稿保存処理
    public function store(Request $request)
    {
        //
    }

    //投稿詳細画面
    public function show(User $user)
    {
        $login_user = auth()->user();

        return view('users.show', [
            'user' => $user,
            'login_user' => $login_user
        ]);
    }

    //投稿編集画面
    public function edit($id)
    {
        //
    }

    //投稿更新処理
    public function update(Request $request, $id)
    {
        //
    }

    //投稿削除処理
    public function destroy($id)
    {
        //
    }

   // フォロー
   public function follow($id)
   {

       $user = User::find($id);

       $follower = auth()->user();

       // フォローしているか
       $is_following = $follower->isFollowing($user->id);

       if(!$is_following) {
           // フォローしていなければフォローする
           $follower->follow($user->id);
           return back();
       }
   }

   // フォロー解除
   public function unfollow($id)
   {
        
        $user = User::find($id);

       $follower = auth()->user();
       // フォローしているか
       $is_following = $follower->isFollowing($user->id);
       if($is_following) {
           // フォローしていればフォローを解除する
           $follower->unfollow($user->id);
           return back();
       }
   }
}
