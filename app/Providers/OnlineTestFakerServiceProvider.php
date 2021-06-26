<?php

namespace App\Providers;

use Faker\Provider\Base;

class OnlineTestFakerServiceProvider extends Base
{
    public function option($nbWords = 1)
    {
      $sentence = $this->generator->sentence($nbWords);
      return substr($sentence, 0, strlen($sentence) - 1);
    }

    public function question($nbWords = 4)
    {
      $sentence = $this->generator->sentence($nbWords);
      return substr($sentence, 0, strlen($sentence) - 1).' ?';
    }
}