<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Task;
use App\User;

class OtherUserCompletedHighPriorityTask extends Notification
{
    use Queueable;
    /**
     * The task instance
     *
     * @var \App\Task
     */
    protected $task;

    /**
     * The user who completed task
     *
     * @var \App\User
     */
    protected $completedBy;

    /**
     * Creates a new notification instance
     *
     * @return void
     */
    public function __construct(Task $task, User $completedBy)
    {
        $this->task = $task;
        $this->completedBy = $completedBy;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Your high priority task ' . $this->task->title . ' was completed by ' . $this->completedBy->name);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            // Insert what you want to return.
        ];
    }
}
