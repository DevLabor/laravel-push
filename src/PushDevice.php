<?php

namespace DevLabor\Push;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PushDevice extends Model {
	/**
	 * Content name for apn os.
	 */
	const SERVICE_APPLE = 'apn';
	
	/**
	 * Content name for fcm os.
	 */
	const SERVICE_ANDROID = 'fcm';
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'device_token',
		'push_service',
		'user_id'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo(User::class);
	}
}