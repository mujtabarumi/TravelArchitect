<?php

namespace App\Listeners;

use App\Events\NewSearchPackage;

use App\Mail\SearchNotificationMail;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailForNewSearchPackage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewSearchPackage  $event
     * @return void
     */
    public function handle(NewSearchPackage $event)
    {
        $search = $event->search;

        //$admins = User::where('type_id',1)->get();

        $to = [];
        $cc = [];

       // $to[] = $admins->email;
        $to[] = 'mujtaba.rumi1@gmail.com';
        $cc[] = 'Md.sakibrahman@gmail.com';


        $mail = Mail::to($to);

        if (!blank($cc)) {
            $mail = $mail->cc($cc);
        }

        $mail = $mail->send(new SearchNotificationMail($search));
    }
}
