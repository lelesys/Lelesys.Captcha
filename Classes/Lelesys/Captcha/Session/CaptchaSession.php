<?php

namespace Lelesys\Captcha\Session;

/** *
 * This script belongs to the FLOW package "Lelesys.Captcha".                   *
 *                                                                              */
use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Scope("session")
 */
class CaptchaSession {

	/**
	 * @var string
	 */
	protected $captchaKey = NULL;

	/**
	 * @return string
	 */
	public function getCaptchaKey() {
		return $this->captchaKey;
	}

	/**
	 * @param string $captchaKey
	 * @return void
	 * @Flow\Session(autoStart = TRUE)
	 */
	public function setCaptchaKey($captchaKey) {
		$this->captchaKey = $captchaKey;
	}

}
?>
