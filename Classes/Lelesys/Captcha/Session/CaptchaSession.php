<?php

namespace Lelesys\Captcha\Session;

/*                                                                         *
 * This script belongs to the package "Lelesys.Captcha".                   *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

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
