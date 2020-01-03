<?php 

namespace App\Utilities;

use Illuminate\Support\Facades\Facade;

class FormatPrice {

  public static function VND($number = 0, $extend = true)
  {
      $regex = '/\B(?=(\d{3})+(?!\d))/';
      if ($extend === true) {
        return preg_replace($regex, '.', $number) . "đ";
      }
      return preg_replace($regex, '.', $number);
  }

}

?>