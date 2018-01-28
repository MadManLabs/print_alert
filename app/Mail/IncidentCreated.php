<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncidentCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $incident = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->incident = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))
            ->markdown('mails.incident.create')
            ->with([
                'deviceName' => $this->incident->deviceName,
                'incidents' => $this->incident->incidents,
                'optionalText' => $this->incident->deviceIncidentMessage,
            ]);
    }
}
