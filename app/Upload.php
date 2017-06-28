<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasApprovals;

class Upload extends Model
{
	use HasApprovals, SoftDeletes;

	protected $fillable = [
		'filename',
		'size',
		'approved'
	];

    public function file() {
    	return $this->belongsTo(File::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}