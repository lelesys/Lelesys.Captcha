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
 * Validator for checking incorrect word
 *
 * @api
 */
class CaptchaValidator extends \TYPO3\Flow\Validation\Validator\AbstractValidator {

	/**
	 * @FLOW\Inject
	 * @var \Lelesys\Captcha\Domain\Service\CaptchaService
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
		} catch (\Lelesys\Captcha\Domain\Service\Exception\NoCaptchaTextExistsException $exception) {
			$this->addError('No Captcha Text Found.', 170320111506);
			return FALSE;
		}
		return TRUE;
	}

}

?>
