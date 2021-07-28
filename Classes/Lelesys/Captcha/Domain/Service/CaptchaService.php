<?php

namespace Lelesys\Captcha\Domain\Service;

/*                                                                         *
 * This script belongs to the package "Lelesys.Captcha".                   *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use Neos\Flow\Annotations as FLOW;

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
		$captcha->setDistortion($this->settings['distortion']);
		$captcha->setInterpolation($this->settings['interpolation']);
		$captcha->setMaxBehindLines($this->settings['maxBehindLines']);
		$captcha->setMaxFrontLines($this->settings['maxFrontLines']);
		$image = $captcha->setBackgroundColor($this->settings['primaryColor']['red'], $this->settings['primaryColor']['green'], $this->settings['primaryColor']['blue'])->build($this->settings['height'], $this->settings['width'])->get();
		$value = $captcha->getPhrase();
			// set Captcha session.
		if ($this->captchaSession->getCaptchaKey() != NULL) {
			$this->captchaSession->setCaptchaKey($value);
		}

		if (empty($this->captchaSession->getCaptchaKey())) {
			$this->captchaSession->setCaptchaKey($value);
		}
		return $image;
	}

	/**
	 * Get captcha text from the session
	 *
	 * @return string
	 * @throws \Lelesys\Captcha\Domain\Service\Exception\NoCaptchaTextExistsException
	 */
	public function getTextInSession() {
		$value = $this->captchaSession->getCaptchaKey();
		if (empty($value)) {
			throw new \Lelesys\Captcha\Domain\Service\Exception\NoCaptchaTextExistsException('No Captcha Text Found!', 170320111506);
		}
		return $value;
	}

}

?>
