<?php

namespace App\Listeners;

use App\Events\ContactUs;
use App\Mail\ContactUsAutoRespond;
use App\Mail\ContactUsMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ContactUsEmailNotification
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
     * @param  ContactUs  $event
     * @return void
     */
    public function handle(ContactUs $event)
    {
        $messagedata = $event->data;

        $this->contactUsMailToAdmin($messagedata);
        $this->contactUsMailToCustomer($messagedata);



    }

    public function contactUsMailToAdmin($messagedata) {

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

        $mail = $mail->send(new ContactUsMail($messagedata));

    }

    public function contactUsMailToCustomer($messagedata) {

        $to = [];
        $cc = [];

        // $to[] = $admins->email;
        $to[] = $messagedata['email'];
        $cc[] = 'mujtaba.rumi1@gmail.com';

        $mail = Mail::to($to);

        if (!blank($cc)) {
            $mail = $mail->cc($cc);
        }

        $mail = $mail->send(new ContactUsAutoRespond($messagedata));

    }
}
