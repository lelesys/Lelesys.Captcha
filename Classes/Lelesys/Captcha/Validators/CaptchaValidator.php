<?php

namespace Lelesys\Captcha\Validators;

/*                                                                         *
 * This script belongs to the package "Lelesys.Captcha".                   *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as FLOW;

/**
 * Validator for checking bad words
 *
 * @api
 */
class CaptchaValidator extends \TYPO3\Flow\Validation\Validator\AbstractValidator {

	/**
	 * @FLOW\Inject
	 * @var \Lelesys\Captcha\Service\CaptchaService
	 */
	protected $captchaService;

	/**
	 * Returns TRUE, if the given property ($value) matches the session captcha Value.
	 *
	 * If at least one error occurred, the result is FALSE.
	 *
	 * @param mixed $value The value that should be validated
	 * @return boolean TRUE if the value is valid, FALSE if an error occured
	 */
	public function isValid($value) {
		$this->errors = array();
		try {
			if ($value !== $this->captchaService->getTextInSession()) {
				$this->addError('Text is wrong.', 170320111501);
				return FALSE;
			}
		} catch (Exception $e) {
			t3lib_div::devLog('captcha error: ' . $e->getMessage(), 'captcha_viewhelper', 2);
			return FALSE;
		} catch (\Lelesys\Captcha\Domain\Service\Exception\NoCaptchaTextExistsException $notregisteredxception) {
			//$this->addFlashMessage('It seems like you are not register user of Launchr', '', \TYPO3\Flow\Error\Message::SEVERITY_ERROR, array(), 1355461231);
			$this->addError('No Captcha Text Found.', 170320111506);
			return FALSE;
		}
		return TRUE;
	}

}

?>
