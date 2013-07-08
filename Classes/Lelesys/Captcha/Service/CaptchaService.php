<?php

namespace Lelesys\Captcha\Service;

/*                                                                         *
 * This script belongs to the package "Lelesys.Captcha".                   *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as FLOW;

/**
 *
 *  @FLOW\Scope("singleton")
 */
class CaptchaService {

	/**
	 * @FLOW\Inject
	 * @var \Lelesys\Captcha\Session\CaptchaSession
	 */
	protected $captchaSession;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Create Captcha Image
	 *
	 * @return void
	 */
	public function createCaptcha() {
		$captcha = new \Gregwar\Captcha\CaptchaBuilder();
		$captcha->build();

		$value = $captcha->getPhrase();

		header('Content-type: image/jpeg');
		$captcha->output();

		// set Captcha session.
		if ($this->captchaSession->getCaptchaKey() != NULL) {
			$this->captchaSession->setCaptchaKey($value);
		}

		if (count($this->captchaSession->getCaptchaKey()) == NULL) {
			$this->captchaSession->setCaptchaKey($value);
		}
		return true;
	}

	/**
	 * @return string
	 * @throws \Lelesys\Captcha\Domain\Service\Exception\NotRegisteredUserException
	 */
	public function getTextInSession() {
		$value = $this->captchaSession->getCaptchaKey();
		if (empty($value)) {
			throw new \Lelesys\Captcha\Domain\Service\Exception\NoCaptchaTextExistsException('Token does not match!', 170320111506);
		}
		return $value;
	}

}

?>
