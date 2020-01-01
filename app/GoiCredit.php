<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoiCredit extends Model
{
    use SoftDeletes;
    protected $table = 'goi_credit';
    protected $fillable = ['ten_goi', 'credit', 'so_tien'];

    public function getSoTienAttribute($value)
    {
    		return $this->formatPrice($value);
    }

    protected function formatPrice($number = 0, $extend = true)
    {
			$regex = '/\B(?=(\d{3})+(?!\d))/';
			return preg_replace($regex, '.', $number) . "đ";
    }
}
