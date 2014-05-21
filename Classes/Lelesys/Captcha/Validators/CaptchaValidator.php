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
	 * @FLOW\Inject
	 * @var \TYPO3\Flow\I18n\Translator
	 */
	protected $translator;

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
			$pattern = ($this->settings['caseSensitive'] === TRUE) ? '/' . $value . '/' : '/' . $value . '/i';
			if (!preg_match($pattern, $this->captchaService->getTextInSession())) {
				$this->addError($this->translator->translateById($this->settings['errorMessageTextWrong'], array(), NULL, NULL, 'Main', $this->settings['customErrorMessagePackageKey']), 170320111501);
				return FALSE;
			}
		} catch (\Lelesys\Captcha\Domain\Service\Exception\NoCaptchaTextExistsException $exception) {
			$this->addError($this->translator->translateById($this->settings['errorMessageTextNotFound'], array(), NULL, NULL, 'Main', $this->settings['customErrorMessagePackageKey']), 170320111506);
			return FALSE;
		}
		return TRUE;
	}

}

?>
