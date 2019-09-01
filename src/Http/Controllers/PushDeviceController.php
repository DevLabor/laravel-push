<?php

namespace DevLabor\Push\Http\Controllers;

use App\Http\Controllers\Controller;
use DevLabor\Push\PushDevice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PushDeviceController extends Controller {
	/**
	 * PushDeviceController constructor.
	 */
	public function __construct(){
		$this->middleware('auth');
	}

	/**
	 * Store the device to auth user.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request){
		$validation = Validator::make($request->all(), [
			'device_token' => 'required',
			'push_service' => 'required'
		]);

		if($validation->fails()){
			return response()->json([
				'error' => true,
				'message' => $validation->errors()
			], Response::HTTP_BAD_REQUEST);
		}

		$validated = $validation->validated();
		
		PushDevice::create([
			'device_token' => $validated['device_token'],
			'push_service' => $validated['push_service'],
			'user_id' => Auth::id()
		]);

		return response()->json([],Response::HTTP_OK);
	}

	/**
	 * Delete device from user.
	 * 
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy(Request $request) {
		$validation = Validator::make($request->all(), [
			'device_token' => 'required'
		]);

		if($validation->fails()){
			return response()->json([
				'error' => true,
				'message' => $validation->errors()
			], Response::HTTP_BAD_REQUEST);
		}

		$validated = $validation->validated();
		
		$device = PushDevice::where([
			'device_token' => $validated['device_token'],
			'user_id' => Auth::id()
		])->firstOrFail();
		
		$device->delete();
		
		return response()->json([],Response::HTTP_OK);
	}
}