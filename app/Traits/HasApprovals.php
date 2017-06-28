<?php 

namespace App\Traits;

trait HasApprovals 
{
	public function scopeApproved(Builder $builder) {
		return $builder->where('approved', true);
	}

	public function scopeUnapproved(Builder $builder) {
		return $builder->where('approved', false);
	}

}