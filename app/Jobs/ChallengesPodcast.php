<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Challenge;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use App\Notifications\OrderNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ChallengesPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $challenge = Challenge::where('status','Active')->first();
        if ($challenge->expir_date == now() || $challenge->expir_date <= now() ) {
            $challenge->status ="Finished";
            $challenge->save();
            $u= User::find($challenge->user_id);
            $message = [
                'title'=>'challenge finished',
                'body'=> 'challenge '.$challenge->title." is finished now",
                'action'=>'/panels/UserPanel/Challenges/'.$challenge->id.'/show',
                'status'=>'new order',
                'created_at'=>now()->diffForHumans(),
                'order_id'=>$challenge->id,
            ];
               $u->notify(new OrderNotification($challenge,$message)); 
            foreach ($challenge->works as $work) {
                $user = User::find($work->designer_id);
                $message = [
                    'title'=>'challenge finished',
                    'body'=> 'challenge '.$challenge->title." is finished now",
                    'action'=>'/panels/DesignerPanel/Challenges/'.$challenge->id.'/show',
                    'status'=>'new order',
                    'created_at'=>now()->diffForHumans(),
                    'order_id'=>$work->id,
                ];
                   $user->notify(new OrderNotification($work,$message)); 
            }
        }
    }
}