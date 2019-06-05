<?php

namespace App\Events;

use App\Question;
use App\QuizSession;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewQuestion implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $answers;

    public $quizCodeId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(QuizSession $quizSession)
    {
        //
        $this->answers = Question::find($quizSession->question_id)->answers;
        $this->quizCodeId = $quizSession->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['quiz-session-'.$this->quizCodeId];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'new.question';
    }
}
