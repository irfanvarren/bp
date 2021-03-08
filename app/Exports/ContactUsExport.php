<?php

namespace App\Exports;

use App\ContactUs;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
class EventsGuestBookExport implements FromQuery,WithHeadings,WithColumnFormatting
{
      use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    /*
    public function collection()
    {
        return EventsGuestBook::all();
    }*/
    public $slug;
    public $type;
    public function __construct($event_slug = null,$subject = null)
    {
      $this->event_slug = $event_slug;
      $this->type = $subject;
    }

    public function byEvent(string $event){
      $this->event = $event;
      return $this;
    }
    public function headings(): array
   {
       return [
           'Nama',
           'Email',
           'No Telepon',
           'Pesan'       ];
   }
   public function columnFormats(): array
    {
        return [
            'C' => "#"
        ];
    }
    public function query(){
      
      return ContactUs::query()->select('nama','email','no_telepon','pesan')->where('event_slug', $this->slug);

    }
}
