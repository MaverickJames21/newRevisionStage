<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Subscription;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         //Info users
         $users = User::factory()->count(50)->create();

        //Insert posts
        $posts = Post::factory()->count(60)->make()
        ->each(function($post) use ($users) {
        $post->user_id = $users->random()->id;
        $post->save();
        });

        //Insert comments
        $comments = Comment::factory()->count(60)->make()
            ->each(function($comment) use ($users, $posts) {
            $comment->user_id = $users->random()->id;
            $comment->post_id = $posts->random()->id;
            $comment->save();
        });

        //Insert likes
        $likes = Like::factory()->count(50)->make()
            ->each(function($like) use ($users, $posts) {
            $like->user_id = $users->random()->id;
            $like->post_id = $posts->random()->id;
            $like->save();
        });

        //Insert abbonements
        $Subscriptions = Subscription::factory()->count(20)->make()
            ->each(function($Subscription) use ($users) {
            $Subscription->user_id = $users->random()->id;
            $Subscription->save();
        });
    }
}
