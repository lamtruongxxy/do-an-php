<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinhVuc extends Model
{
		use SoftDeletes;
		protected $table = "linh_vuc";
		protected $fillable = [
			"ten_linh_vuc", "hinh_anh"
		];

		public function dsCauHoi()
		{
			return $this->hasMany('App\CauHoi');
		}

		public function getTenLinhVucAttribute($value)
		{
				return ucfirst($value);
		}
}
