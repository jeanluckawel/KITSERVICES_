<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PayrollPdfMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $employee;
    public $pdfContent;


    public function __construct($employee, $pdfContent)
    {
        //

        $this->employee = $employee;
        $this->pdfContent = $pdfContent;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payroll - Payslip',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Votre bulletin de paie')
            ->view('emails.payroll-notice')
            ->attachData(
                $this->pdfContent,
                'bulletin_' . $this->employee->employee_id . '.pdf',
                ['mime' => 'application/pdf']
            );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
