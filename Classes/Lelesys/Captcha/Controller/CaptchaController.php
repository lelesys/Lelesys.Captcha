<?php

namespace Lelesys\Captcha\Controller;

/*                                                                         *
 * This script belongs to the package "Lelesys.Captcha".                   *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;

/**
 * Captcha controller for the Lelesys.Captcha package
 *
 * @Flow\Scope("singleton")
 */
class CaptchaController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \Lelesys\Captcha\Domain\Service\CaptchaService
	 */
	protected $captchaService;

	/**
	 * Captcha render
	 *
	 * @return void
	 */
	public function captchaAction() {
		$this->response->setHeader('Content-Type', 'image/jpeg');
		$image = $this->captchaService->createCaptcha();
		$this->response->setHeader('Content-Length', strlen($image));
		echo $image;
		throw new \TYPO3\Flow\Mvc\Exception\StopActionException();
	}

}

?>