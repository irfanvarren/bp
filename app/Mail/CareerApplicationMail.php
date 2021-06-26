<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Requet;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;
class CareerApplicationMail extends Mailable
{
  use Queueable, SerializesModels;
  public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->email = $request;//
      }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      Session::flash('message', 'Data sudah berhasil diinput !');
      $to = "info@bestpartnereducation.com";
      if($this->email->email_to != ""){
        $to = $this->email->email_to;
      }
      $subject = "Data Form Karir";
      if($this->email->id_promo != ""){
        $subject = $this->email->subject;
      }
      $mail = $this->subject($subject)
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to($to)
      ->cc('info@bestpartnereducation.com')
      ->view('email.careerapplication');
      if($this->email->hasFile('ktp')){
        $mail->attach($this->email->ktp->getRealPath(),[
          'as' =>  'ktp.'.$this->email->ktp->getClientOriginalExtension(),
          'mime' => $this->email->ktp->getMimeType()
        ]);
      }
      if($this->email->hasFile('file_ktp')){
        $mail->attach($this->email->file_ktp->getRealPath(),[
          'as' => 'ktp.'.$this->email->file_ktp->getClientOriginalExtension(),
          'mime' => $this->email->file_ktp->getMimeType()
        ]);
      }
      if($this->email->hasFile('file_kk')){
        $mail->attach($this->email->file_kk->getRealPath(),[
          'as' => 'kk.'.$this->email->file_kk->getClientOriginalExtension(),
          'mime' => $this->email->file_kk->getMimeType()
        ]);
      }
      if($this->email->hasFile('file_pas_foto')){
        $mail->attach($this->email->file_pas_foto->getRealPath(),[
          'as' => 'pas_foto.'.$this->email->file_pas_foto->getClientOriginalExtension(),
          'mime' => $this->email->file_pas_foto->getMimeType()
        ]);
      }
      if($this->email->hasFile('ijazah')){
        $mail->attach($this->email->ijazah->getRealPath(),[
          'as' => 'ijazah.'.$this->email->ijazah->getClientOriginalExtension(),
          'mime' => $this->email->ijazah->getMimeType()
        ]);
      }
      if($this->email->hasFile('file_ijazah')){
        $mail->attach($this->email->file_ijazah->getRealPath(),[
          'as' => 'ijazah.'.$this->email->file_ijazah->getClientOriginalExtension(),
          'mime' => $this->email->file_ijazah->getMimeType()
        ]);
      }
      if($this->email->hasFile('file_surat_keterangan_tidak_mampu')){
        $mail->attach($this->email->file_surat_keterangan_tidak_mampu->getRealPath(),[
          'as' => 'file_surat_keterangan_tidak_mampu.'.$this->email->file_surat_keterangan_tidak_mampu->getClientOriginalExtension(),
          'mime' => $this->email->file_surat_keterangan_tidak_mampu->getMimeType()
        ]);
      }
      if($this->email->hasFile('file_transkrip_nilai')){
        $x = 1;
       
        foreach($this->email->file_transkrip_nilai as $file_transkrip){
           $transkrip = 'transkrip'.$x;
          $mail->attach($file_transkrip->getRealPath(),[
            'as'=> $transkrip.'.'.$file_transkrip->getClientOriginalExtension(),
            'mime' => $file_transkrip->getMimeType()
          ]);
          $x++;

        }
      } 
      if($this->email->hasFile('file_gambar_portofolio')){
        $x = 1;
        foreach($this->email->file_gambar_portofolio as $gambar_portofolio){
            $portofolio = 'gambar-portofolio-'.$x;
          $mail->attach($gambar_portofolio->getRealPath(),[
            'as'=> $portofolio.'.'.$gambar_portofolio->getClientOriginalExtension(),
            'mime' => $gambar_portofolio->getMimeType()
          ]);
          $x++;

        }
      } 
      return $mail;
    }
  }
