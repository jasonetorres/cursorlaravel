class AppointmentScheduled extends Notification
{
    use Queueable;

    public $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('New appointment scheduled!')
            ->line('Client: ' . $this->appointment->client_name)
            ->line('Time: ' . $this->appointment->start_time);
    }
}