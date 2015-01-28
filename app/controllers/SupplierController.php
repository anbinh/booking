<?php

class SupplierController extends BaseController {


	public static $SERVICE_SELECTED_ID = "service_selected_id";
	public static $DATE_SELECTED = "date_selected";
	public static $TIME_SELECTED = "time_selected";
	public static $DURATION_SELECTED = "duration_selected";
	public static $FILTER_STAR = "filter_star";
	public static $FROM_PRICE = "from_price";
	public static $TO_PRICE = "to_price";
	public static $MAX_PRICE = 20;

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
		$service_selected = Session::get(self::$SERVICE_SELECTED_ID, 0);
        $date_selected = Session::get(self::$DATE_SELECTED, date("m/d/Y"));
        $time_selected = Session::get(self::$TIME_SELECTED, "12:00");
        $duration_selected = Session::get(self::$DURATION_SELECTED, "1");

		$from_price = Session::get(self::$FROM_PRICE, 0);
		$to_price = Session::get(self::$TO_PRICE, self::$MAX_PRICE);
		$array_star = Session::get(self::$FILTER_STAR, [1,2,3,4,5]);
        $suppliers= $this->querySupplier($service_selected, $from_price, $to_price,$array_star);

		return View::make('pages.suppliers',
			array(
				'services' => $services,
				'suppliers' => $suppliers,
				'service_selected' => $service_selected,
				'date_selected' => $date_selected,
				'time_selected' => $time_selected,
				'duration_selected' => $duration_selected,

				'star_filter' => $array_star,
				'from_price' => $from_price,
				'to_price' => $to_price
		));
	}

    public function apiGetSupplier($service_selected = 0){
		$service_selected = $service_selected <= 0?0:$service_selected;

		$duration = Input::get(self::$DURATION_SELECTED);
		$time_begin = Input::get(self::$TIME_SELECTED);
		$date_selected = Input::get(self::$DATE_SELECTED);
//		$service_selected  = Input::get(self::$SERVICE_SELECTED_ID);

		$from_price = Input::get(self::$FROM_PRICE, 0);
		$to_price = Input::get(self::$TO_PRICE, 10);
		$filter_start = Input::get(self::$FILTER_STAR, [1,2,3,4,5]);

		$result = array('error' => false);
		if(!Input::has(self::$DURATION_SELECTED)){
			$result['error'] =true;
			$result['message'] = 'missing '.self::$DURATION_SELECTED;
		}
		if(!Input::has(self::$TIME_SELECTED)){
			$result['error'] =true;
			$result['message'] = 'missing '.self::$TIME_SELECTED;
		}
		if(!Input::has(self::$DATE_SELECTED)){
			$result['error'] =true;
			$result['message'] = 'missing '.self::$DATE_SELECTED;
		}


//		if(!Input::has(self::$SERVICE_SELECTED_ID)){
//			$result['error'] =true;
//			$result['message'] = 'missing '.self::$SERVICE_SELECTED_ID;
//		}
//		if(!Input::has(self::$FROM_PRICE)){
//			$result['error'] =true;
//			$result['message'] = 'missing '.self::$FROM_PRICE;
//		}
//		if(!Input::has(self::$TO_PRICE)){
//			$result['error'] =true;
//			$result['message'] = 'missing '.self::$TO_PRICE;
//		}
//		if(!Input::has(self::$FILTER_STAR)){
//			$result['error'] =true;
//			$result['message'] = 'missing '.self::$FILTER_STAR;
//		}

		if(!$result['error']){
			$suppliers = $this->querySupplier($service_selected, $from_price, $to_price, $filter_start);
			$result =  array(
				'error' => false,
				'suppliers' => $suppliers,
			);
			return Response::json($result,200);
		}
		return Response::json($result,200);
    }


	public function postSupplier(){
		$input = Input::all();

//		var_dump($input);
//		die();

		Session::put(self::$SERVICE_SELECTED_ID, isset($input['service'])?$input['service']:"");
		Session::put(self::$DATE_SELECTED, isset($input['date'])?$input['date']:"");
		Session::put(self::$TIME_SELECTED, isset($input['time'])?$input['time']:"");
		Session::put(self::$DURATION_SELECTED, isset($input['duration'])?$input['duration']:"");
		return Redirect::route('suppliers');
	}

	public function postFiltetSupplier(){
		$input = Input::all();

		$star = isset($input['filter-star'])?array_merge([], array_map('intval',$input['filter-star'])): [0,1,2,3,4,5];
		$from = isset($input['from-price'])?$input['from-price']: 0;
		$to = isset($input['to-price'])?$input['to-price']:0;

		Session::put(self::$FILTER_STAR, $star);
		Session::put(self::$FROM_PRICE, $from);
		Session::put(self::$TO_PRICE, $to);

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
		$date_selected = Session::get(self::$DATE_SELECTED, date("m/d/Y"));
		$time_selected = Session::get(self::$TIME_SELECTED, "00:00");
		$duration_selected = Session::get(self::$DURATION_SELECTED, "1");

		if($service_selected == -1 ||
			count($date_selected) == 0||
			count($time_selected) == 0||
			count($duration_selected) == 0){
			Session::flash('error', 'Not yets');
			return Redirect::route('suppliers');
		}

		$service = Service::find($service_selected);
		$sup = Supplier::find($id_code);

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
		$cost = $sup->rate_per_hour * $duration;

        $task = $this->addTask($service_selected,$id_code,$date_selected,
			$time_begin,$duration,$promotion_code,$other_required, $cost, Auth::user()->id);
            if($task == null){
                return Redirect::route('suppliers-confirm', ['id_code' => $id_code]);
            }
            self::removeFilterSession();
            return Redirect::route('suppliers-finish', ['id_code' => $task->id]);

	}

    public function apiCheckoutSupplier($id_code){
        $sup = Supplier::find($id_code);
        $duration = Input::get(self::$DURATION_SELECTED);
        $time_begin = Input::get(self::$TIME_SELECTED);
        $date_selected = Input::get(self::$DATE_SELECTED);
        $service_selected  = Input::get(self::$SERVICE_SELECTED_ID);
		$author_id = Input::get('author_id');

        $result = array('error' => false);
        if(!Input::has(self::$DURATION_SELECTED)){
            $result['error'] =true;
            $result['message'] = 'missing '.self::$DURATION_SELECTED;
        }
        if(!Input::has(self::$TIME_SELECTED)){
            $result['error'] =true;
            $result['message'] = 'missing '.self::$TIME_SELECTED;
        }
        if(!Input::has(self::$DATE_SELECTED)){
            $result['error'] =true;
            $result['message'] = 'missing '.self::$DATE_SELECTED;
        }
        if(!Input::has(self::$SERVICE_SELECTED_ID)){
            $result['error'] =true;
            $result['message'] = 'missing '.self::$SERVICE_SELECTED_ID;
        }
		if(!Input::has('author_id')){
			$result['error'] =true;
			$result['message'] = 'missing '.'author_id';
		}
        if(Input::has('promotion_code')){
            $promotion_code = Input::get('promotion_code');
        } else {
            $promotion_code = '';
        }
        if(Input::has('other_required')){
            $other_required = Input::get('other_required');
        } else {
            $other_required = '';
        }



		$cost = $sup->rate_per_hour * $duration;
        if(!$result['error']){
            $task = $this->addTask($service_selected,$id_code,$date_selected,$time_begin,
				$duration,$promotion_code,$other_required, $cost, $author_id);
            if($task == null) {
                $result['error'] =true;
                $result['message'] = "save new task failed ";
                $result['id_code'] = $id_code;
            } else {
                $result['error'] = false;
                $result['id_code'] = $task->id;
            }
        }
        return Response::json($result,200);
    }

    protected function addTask($service_selected,$id_code,$date_selected,$time_begin,
							   $duration,$promotion_code,$other_required,$cost, $author_id){

        $task = new Task;
        $task->user_id = $author_id;
        $task->service_id = $service_selected;
        $task->supplier_id = $id_code;
        $task->date = DateTime::createFromFormat('m/d/Y h:i:s', $date_selected.' 00:00:00');
        $task->starting_time = strtotime($time_begin);
        $task->note = $other_required;
        $task->promotion_code = $promotion_code;
        $task->duration = $duration;
		$task->cost = $cost;
        if($task->save()){
            return $task;
        }else {
            return null;
        }
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
		$task->payment_type = isset($input['payment'])?$input['payment']:0;
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

    //Query Supplier from db
    protected  function querySupplier($service_selected, $min_price, $max_price, $list_star){
        $suppliers = [];
        if($service_selected != 0){
			$suppliers = DB::table('supplier')
				->join('supplier_service', 'supplier.id', '=', 'supplier_service.supplier_id')
				->where('supplier_service.service_id', '=', $service_selected)
				->whereIn('supplier.star_rate', $list_star)
				->where('supplier.rate_per_hour', '>=', intval($min_price))
				->where('supplier.rate_per_hour', '<=', intval($max_price))
				->orderBy('supplier.star_rate', 'desc')
				->get();
			return $suppliers;
        }
        return $suppliers;
    }

	// Query Supplier Service
//	protected functin querySupplierService()

}