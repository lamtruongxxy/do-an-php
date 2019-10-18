<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinhVuc extends Model
{
	use SoftDeletes;
	protected $table = "linh_vuc";
	protected $fillable = ["ten_linh_vuc"];
	public function getDeletedAtAttribute($date)
	{
		return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
	}

	public function dsCauHoi()
	{
		return $this->hasMany('App\CauHoi');
	}
}
