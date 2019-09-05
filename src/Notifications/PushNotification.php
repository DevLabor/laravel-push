<?php

namespace DevLabor\Push\Notifications;

use Illuminate\Notifications\Notification;
use Benwilkins\FCM\FcmMessage;

class PushNotification extends Notification {
	protected $title = '';
	protected $body = '';
	protected $priority = 'normal';
	protected $sound = 'sound';
	protected $icon = 'icon';
	protected $data = [];
	
	/**
	 * PushNotification constructor.
	 */
	public function __construct($title, $body, $icon = '', $priority = 'normal', $data = [], $sound = '') {
		$this->title = $title;
		$this->body = $body;
		$this->priority = $priority;
		$this->sound = $sound;
		$this->icon = $icon;
		$this->data = $data;
	}

	/**
	 * @param $notifiable
	 *
	 * @return array
	 */
	public function via($notifiable) {
		return ['fcm'];
	}
	
	/**
	 * @param $notifiable
	 *
	 * @return FcmMessage
	 */
	public function toFcm($notifiable) {
		$message = new FcmMessage();
		$message->content([
			'title'        => $this->title,
			'body'         => $this->body,
			'sound'        => $this->sound, 
			'icon'         => $this->icon
		])->data(array_merge([
			'title' => $this->title,
			'body' => $this->body,
		], $this->data))->priority($this->priority);

		return $message;
	}
}