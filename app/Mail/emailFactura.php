<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class emailFactura extends Mailable
{
    use Queueable, SerializesModels;

    private $nome;
    private $email;
    private $pratos;
    private $amount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome,$email,$pratos,$amount)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->pratos = $pratos;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        error_log($this->nome);
        error_log($this->email);
        error_log($this->pratos);
        error_log($this->amount);
       //$this->subject($this->pratos);
       $this->subject("Factura da conta no restaurante O Farol Pool Bar");
       //$this->cc("");
       $this->to($this->email,$this->nome);


       return $this->view('email.email-payment',["nome"=>$this->nome,"data"=>$this->pratos,"amount"=>$this->amount]);
    }
}
