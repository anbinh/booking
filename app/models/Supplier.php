<?php

class Supplier extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'supplier';
	
	public function getByPage($page = 1, $limit = 10){
		$results = new StdClass;
		$results->page = $page;
		$results->limit = $limit;
		$results->totalItems = 0;
		$results->items = array();
		$users = User::skip($limit * ($page - 1))
		->take($limit)
		->get();
		$totalCont = User::all()->count();
		$results->totalItems = $totalCont;
		$results->items = $users->all();
		return $results;
	}

    public function User(){
        return $this->belongsTo('User');
    }

	public function getReview(){
		return $this->belongsToMany('Supplier', 'supplier_service', 'service_id', 'supplier_id');
	}

    public function services(){
        return $this->belongsToMany('Service', 'supplier_service', 'supplier_id', 'service_id');
    }
}