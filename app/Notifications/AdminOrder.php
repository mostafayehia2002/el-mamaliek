<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminOrder extends Notification
{
    private $name;
    private  $product;
    private  $type;
    private  $url;
    /**
     * Create a new notification instance.
     */
    public function __construct($name,$product,$type)
    {
        $this->name=$name;
        $this->product=$product;
        $this->type=$type;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        if($this->type=='شحن'){
            $this->url=asset('/').'admin/order_charges';
        }else{
            $this->url=asset('/').'admin/orders';
        }
        return (new MailMessage)->markdown(
            'emails.orders', ['user' => $this->name,'product'=>$this->product,'type'=>$this->type,'url'=>$this->url]
          )->subject(" طلب $this->type");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
        'type'=>$this->type,
        'name'=>$this->name,
        'product'=>$this->product,
        'message'=> 'في انتظار الموافقة'
    ];

    }
}
