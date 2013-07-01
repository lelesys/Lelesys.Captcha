<?php
namespace Lelesys\Captcha\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Lelesys.Captcha".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

use TYPO3\Flow\Mvc\Controller\ActionController;
use \Lelesys\Captcha\Domain\Model\Captcha;

/**
 * Captcha controller for the Lelesys.Captcha package
 *
 * @Flow\Scope("singleton")
 */
class CaptchaController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \Lelesys\Captcha\Service\CaptchaService
	 */
	protected $captchaService;

	/**
	 * Captcha render
	 *
	 * @return void
	 */
	public function captchaAction() {
		return $this->captchaService->createCaptcha();
	}
}

?>