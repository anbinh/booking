<?php

class Service extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'service';

	public function getSupplier()
	{
		return $this->belongsToMany('Supplier', 'supplier_service', 'service_id', 'supplier_id');
	}
}