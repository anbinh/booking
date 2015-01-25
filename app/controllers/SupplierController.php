<?php

class SupplierController extends BaseController {


	public static $SERVICE_SELECTED_ID = "service_selected_id";
	public static $DATE_SELECTED = "date_selected";
	public static $TIME_SELECTED = "time_selected";
	public static $DURATION_SELECTED = "duration_selected";

    public function __construct()
    {

    }

	public function getIndex()
	{
		return View::make('home.index');
	}

	/**
	 *
     */
	public function getSupplier(){
		$services = Service::all();
		$service_selected = Session::get(self::$SERVICE_SELECTED_ID, -1);
		if($service_selected == -1){
			$suppliers = Supplier::all()->take(10);
		}else{
			$suppliers = Service::find($service_selected)->getSupplier->take(10);
		}
		$date_selected = Session::get(self::$DATE_SELECTED, date("m/d/Y"));
		$time_selected = Session::get(self::$TIME_SELECTED, "00:00");
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
		Session::put(self::$SERVICE_SELECTED_ID, $input['service']);
		Session::put(self::$DATE_SELECTED, $input['date']);
		Session::put(self::$TIME_SELECTED, $input['time']);
		Session::put(self::$DURATION_SELECTED, $input['duration']);
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
		return View::make('pages.suppliers-review',
			array(
				'supplier' => $sup,
				'reviews' => $reviews,
			));
	}

	public function confirmSupplier($id_code){
		$service_selected = Session::get(self::$SERVICE_SELECTED_ID, -1);
		if($service_selected == -1){
			//TODO: add flash message
			return Redirect::route('suppliers');
		}

		$service = Service::find($service_selected);
		$sup = Supplier::find($id_code);
		$date_selected = Session::get(self::$DATE_SELECTED, date("m/d/Y"));
		$time_selected = Session::get(self::$TIME_SELECTED, "00:00");
		$duration_selected = Session::get(self::$DURATION_SELECTED, "1");

		if(Auth::check() || true){
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

	public function checkoutSupplier($id_code){
		$sup = Supplier::find($id_code);
		if($sup->instance){
		 	$view = 'pages.suppliers-checkout-instant';
		}else{
			$view = 'pages.suppliers-finish-notinstant';
		}
		return View::make($view);

	}

}