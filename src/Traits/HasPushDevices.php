<?php

namespace DevLabor\Push\Traits;

use DevLabor\Push\PushDevice;

trait HasPushDevices {
	/**
	 * Deregister devices on deleting.
	 */
	public static function bootHasPushDevices()
	{
		static::deleting(function ($model)
		{
			$model->pushDevices()->get()->each->delete();
		});
	}
	
	/**
	 * Returns registered devices of user.
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pushDevices() {
		return $this->hasMany(PushDevice::class)->latest();
	}

	/**
	 * Route notifications for the push messages.
	 *
	 * @param  \Illuminate\Notifications\Notification  $notification
	 * @return string
	 */
	public function routeNotificationForFcm($notification)
	{
		return optional($this->pushDevices->first())->device_token;
	}
}