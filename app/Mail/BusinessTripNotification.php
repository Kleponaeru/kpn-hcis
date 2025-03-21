<?php

namespace App\Mail;

use App\Models\BusinessTrip;
use App\Models\Hotel;
use App\Models\Tiket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BusinessTripNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $businessTrip;
    public $hotelDetails;
    public $ticketDetails;
    public $taksiDetails;
    public $caDetails;
    public $managerName;
    public $approvalLink;
    public $revisionLink;
    public $rejectionLink;
    public $employeeName;
    public $base64Image;
    public $textNotification;
    public $isEnt;
    public $isCa;
    public $entDetails;
    public $group_company;
    public $messDetails;

    /**
     * Create a new message instance.
     */
    public function __construct(
        BusinessTrip $businessTrip,
        $hotelDetails = null,
        $ticketDetails = null,
        $taksiDetails = null,
        $caDetails = null,
        $managerName = null,
        $approvalLink = null,
        $revisionLink = null,
        $rejectionLink = null,
        $employeeName = null,
        $base64Image = null,
        $textNotification = null,
        $isEnt = null,
        $isCa = null,
        $entDetails = null,
        $group_company = null,
        $messDetails = null,
    ) {
        $this->businessTrip = $businessTrip;
        $this->hotelDetails = $hotelDetails;
        $this->ticketDetails = $ticketDetails;
        $this->taksiDetails = $taksiDetails;
        $this->caDetails = $caDetails;
        $this->managerName = $managerName;
        $this->approvalLink = $approvalLink;
        $this->revisionLink = $revisionLink;
        $this->rejectionLink = $rejectionLink;
        $this->employeeName = $employeeName;
        $this->base64Image = $base64Image;
        $this->textNotification = $textNotification;
        $this->isEnt = $isEnt;
        $this->isCa = $isCa;
        $this->entDetails = $entDetails;
        $this->group_company = $group_company;
        $this->messDetails = $messDetails;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('hcis.reimbursements.businessTrip.email.btNotification')
            ->with([
                'businessTrip' => $this->businessTrip,
                'hotelDetails' => $this->hotelDetails, // Use the passed hotel details
                'ticketDetails' => $this->ticketDetails, // Use the passed ticket details
                'taksiDetails' => $this->taksiDetails,
                'caDetails' => $this->caDetails,
                'managerName' => $this->managerName,
                'approvalLink' => $this->approvalLink,
                'revisionLink' => $this->revisionLink,
                'rejectionLink' => $this->rejectionLink,
                'employeeName' => $this->employeeName,
                'base64Image' => $this->base64Image,
                'textNotification' => $this->textNotification,
                'isEnt' => $this->isEnt,
                'isCa' => $this->isCa,
                'entDetails' => $this->entDetails,
                'group_company' => $this->group_company,
                'messDetails' => $this->messDetails,
            ]);
    }

    /**
     * Get the email envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Business Travel Notification',
        );
    }

    /**
     * Get the email content.
     */
    public function content(): Content
    {
        return new Content(
            view: 'hcis.reimbursements.businessTrip.email.btNotification',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
