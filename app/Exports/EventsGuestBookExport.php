<?php

namespace App\Exports;

use App\EventsGuestBook;
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
    public function byEvent(string $event){
      $this->event = $event;
      return $this;
    }
    public function headings(): array
   {
       return [
           'Name',
           'Email',
           'No Telepon',
           'Kelas',
           'Created at'
       ];
   }
   public function columnFormats(): array
    {
        return [
            'C' => "#"
        ];
    }
    public function query(){
      return EventsGuestBook::query()->select('NAMA','EMAIL','NO_TELEPON','KELAS','created_at')->where('REF_EVENT', $this->event);
    }
}
