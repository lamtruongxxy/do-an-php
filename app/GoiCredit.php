<?php

namespace App;

use App\Utilities\FormatPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoiCredit extends Model
{
    use SoftDeletes;
    protected $table = 'goi_credit';
    protected $fillable = ['ten_goi', 'credit', 'so_tien'];

    public function getSoTienFormatAttribute()
    {
        return FormatPrice::VND($this->so_tien);
    }

    public function getCreditFormatAttribute()
    {
        return FormatPrice::VND($this->credit, false);
    }

    public function getTenGoiAttribute($value)
    {
        return ucfirst($value);
    }
}
