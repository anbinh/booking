<?php

class SupplierController extends BaseController {


	public static $SERVICE_SELECTED_ID = "service_selected_id";
	public static $DATE_SELECTED = "date_selected";
	public static $TIME_SELECTED = "time_selected";
	public static $DURATION_SELECTED = "duration_selected";
	public static $FILTER_STAR = "filter_star";
	public static $FROM_PRICE = "from_price";
	public static $TO_PRICE = "to_price";
	public static $MAX_PRICE = 500;

    public function __construct()
    {

    }

	public function getIndex()
	{
		return View::make('home.index');
	}

	/*
	 * get supplier API
	 *
	 *  service_id: Service including
	 * 		+ Handy Homie : id = 1
	 * 		+ Gardening Homie: id = 2
	 * 		+ Cleaning Homie: id = 3
	 *  date: format 'month/day/year' 	example '01/24/2015'
	 *  time: format 'hour/minues' 		example '09/25'
	 *
	 */
	public function requestSupplier($service_id){
		$input = Input::all();
//		$service_id = $input['service_id'];
//		$date = $input['date'];
//		$time = $input['time'];
		$total = 0;
		$suppliers = [];
		if($service_id != -1){
			$sups = Service::find($service_id)->getSupplier;
			foreach($sups as $s){
				$suppliers[] = [
					'company_name' => $s->company_name,
					'office_address' =>$s->office_address,
					'license_number' => $s->license_number,
					'star_rate' => $s->star_rate,
					'instance' => $s->instance
				];
				$total = $total + 1;
			}
		}
		return Response::json(array('suppliers' => $suppliers, 'total' => $total));
	}

	/**
	 *
     */
	public function getSupplier(){
		$services = Service::all();
		$service_selected = Session::get(self::$SERVICE_SELECTED_ID, -1);

		if($service_selected == -1){
			$suppliers = [];
		}else{
			$suppliers = Service::find($service_selected)->getSupplier->take(10);
		}

		$date_selected = Session::get(self::$DATE_SELECTED, date("m/d/Y"));
		$time_selected = Session::get(self::$TIME_SELECTED, "12:00");
		$duration_selected = Session::get(self::$DURATION_SELECTED, "1");
		return View::make('pages.suppliers',
			array(
				'services' => $services,
				'suppliers' => $suppliers,
				'service_selected' => $service_selected,
				'date_selected' => $date_selected,
				'time_selected' => $time_selected,
				'duration_selected' => $duration_selected
		));
	}

	public function postSupplier(){
		$input = Input::all();
		Session::put(self::$SERVICE_SELECTED_ID, isset($input['service'])?$input['service']:"");
		Session::put(self::$DATE_SELECTED, isset($input['date'])?$input['date']:"");
		Session::put(self::$TIME_SELECTED, isset($input['time'])?$input['time']:"");
		Session::put(self::$DURATION_SELECTED, isset($input['duration'])?$input['duration']:"");
		return Redirect::route('suppliers');
	}

	public function postFiltetSupplier(){
		$input = Input::all();
		Session::put(self::$FILTER_STAR, $input['filter-star']);
		Session::put(self::$FROM_PRICE, $input['from-price']);
		Session::put(self::$TO_PRICE, $input['to_price']);
		return Redirect::route('suppliers');
	}

	public function reviewSupplier($id_code){
		$sup = Supplier::find($id_code);
		$reviews = DB::table('review')
			->join('task', 'review.task_id', '=', 'task.id')
			->join('supplier', 'task.supplier_id', '=', 'supplier.id')
			->join('users', 'users.id', '=', 'task.user_id')
			->where('supplier.id', '=', $id_code)
			->get();
//		var_dump($reviews[0]);
//		die();
		return View::make('pages.suppliers-review',
			array(
				'supplier' => $sup,
				'reviews' => $reviews,
			));
	}

	public function confirmSupplier($id_code){

		$service_selected = Session::get(self::$SERVICE_SELECTED_ID, -1);
		if($service_selected == -1){
			Session::flash('error', 'Not selected SERVICE yets');
			return Redirect::route('suppliers');
		}

		$service = Service::find($service_selected);
		$sup = Supplier::find($id_code);
		$date_selected = Session::get(self::$DATE_SELECTED, date("m/d/Y"));
		$time_selected = Session::get(self::$TIME_SELECTED, "00:00");
		$duration_selected = Session::get(self::$DURATION_SELECTED, "1");

		if(Auth::check()){
			$view = 'pages.suppliers-confirm-login';
		}else{
			$view = 'pages.suppliers-confirm-withoutlogin';
		}
		return View::make($view,
			[
				'service' => $service,
				'supplier' => $sup,
				'service_selected' => $service_selected,
				'date_selected' => $date_selected,
				'time_selected' => $time_selected,
				'duration_selected' => $duration_selected
			]);
	}

	//var_dump(gmdate('h:i', 1422327000));

	public function checkoutSupplier($id_code){
		$sup = Supplier::find($id_code);
		$duration = Session::get(self::$DURATION_SELECTED);
		$time_begin = Session::get(self::$TIME_SELECTED);
		$date_selected = Session::get(self::$DATE_SELECTED);
		$service_selected  = Session::get(self::$SERVICE_SELECTED_ID);

		$all_input = Input::all();
		$promotion_code = $all_input['promotion_code'];
		$other_required = $all_input['other_required'];

		$task = new Task;
		$task->user_id = Auth::user()->id;
		$task->service_id = $service_selected;
		$task->supplier_id = $id_code;
		$task->date = DateTime::createFromFormat('m/d/Y h:i:s', $date_selected.' 00:00:00');
		$task->starting_time = strtotime($time_begin);
		$task->note = $other_required;
		$task->promotion_code = $promotion_code;
		$task->duration = $duration;

		if(!$task->save()){
			return Redirect::route('suppliers-confirm', ['id_code' => $id_code]);
		}

		self::removeFilterSession();
		return Redirect::route('suppliers-finish', ['id_code' => $task->id]);
	}


	public static function removeFilterSession(){
		Session::forget(self::$DURATION_SELECTED);
		Session::forget(self::$TIME_SELECTED);
		Session::forget(self::$DATE_SELECTED);
		Session::forget(self::$SERVICE_SELECTED_ID);
	}

	public function finishedSupplier($id_code){
		$task = Task::find($id_code);
		$sup  = Supplier::find($task->supplier_id);
		if($sup->instance){
			$view = 'pages.suppliers-checkout-instant';
		}else{
			$view = 'pages.suppliers-finish-notinstant';
		}
		return View::make($view,[
			'task' => $task,
			'supplier '=> $sup
		]);
	}

	public function doneSupplier($id_code){
		$task = Task::find($id_code);
		$input = Input::all();
		$task->payment_type = $input['payment'];
		$task->status = Task::$STATUS_CONFIRM;
		return View::make('pages.suppliers-finish', ['reference_code' => $task->id]);
	}

	public function reCalcSupplierRate(){
		$suppliers = Supplier::all();
		foreach($suppliers as $sup){
			$this->reCalcEachSupplierRate($sup);
		}
	}

	public function reCalcEachSupplierRate($sup){
		$total = 0;
		$reviews = DB::table('review')
			->join('task', 'review.task_id', '=', 'task.id')
			->join('supplier', 'task.supplier_id', '=', 'supplier.id')
			->join('users', 'users.id', '=', 'task.user_id')
			->where('supplier.id', '=', $sup->id)
			->get();
		foreach($reviews as $re) $total += $re->rating_start;
		if ($total != 0) $avg = round($total/count($reviews)+0.49);
		else $avg = 0;
		$sup->star_rate = $avg;
		return $sup->save();
	}

	public function apiGetService(){

	}
}