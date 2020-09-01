<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token = $token;
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
    public function toMail( $notifiable ) {

        $tokenData = \DB::table('password_resets')
        ->where('email', $notifiable->email)->first();

        $link = url("/passwordReset/?token=" . $tokenData->token);

        $logo_url = \URL::to('/').'/public/images/ger.png'; //dynamic after live code

        return ( new MailMessage )
        ->view('emails.reset', ['name'=>'Print_Shop', 'logo_url'=> @$logo_url])
        ->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))
        ->subject('Reset Password Notification')
        ->line( "Hey, We've successfully changed the text " )
        ->action('Reset Password', $link )
        ->line( 'Thank you!' );
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
            //
        ];
    }

    /**
 * Build the message.
 *
 * @return $this
 */
    public function build()
    {
        return $this->markdown('view-to-mail');
    }
}