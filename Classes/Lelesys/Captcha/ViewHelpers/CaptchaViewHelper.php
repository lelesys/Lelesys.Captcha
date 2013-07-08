<?php

namespace Lelesys\Captcha\ViewHelpers;

/*                                                                         *
 * This script belongs to the package "Lelesys.Captcha".                   *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as FLOW;

class CaptchaViewHelper extends \TYPO3\Fluid\ViewHelpers\Form\AbstractFormFieldViewHelper {

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @var \TYPO3\Flow\Core\Bootstrap
	 * @Flow\Inject
	 */
	protected $bootstrap;

	/**
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * @FLOW\Inject
	 * @var \TYPO3\Flow\I18n\Translator
	 */
	protected $translator;

	/**
	 * Initialize the arguments.
	 *
	 * @return void
	 * @api
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerUniversalTagAttributes();
	}

	/**
	 * Wrapper for PHP base64_encode ans base64_decode functions
	 *
	 * @param string $function
	 * @return string the altered string.
	 */
	public function render() {
		$baseUri = $this->bootstrap->getActiveRequestHandler()->getHttpRequest()->getBaseUri();
		$path = $baseUri . 'Lelesys.Captcha/Captcha/captcha';
		$image = '<p>' . $this->translator->translateById('lelesys.captcha.caseSensitive', array(), NULL, NULL, 'Main', 'Lelesys.Captcha') . '</p><p>';
		$image .= '<img id="captcha-image" src="' . $path . '" class="captcha-image"/>';
		$image .= '<br />';
		$image .= '<a class="captcha-reaload" href="javascript:void(0)" onclick=" var e = document.getElementById(\'captcha-image\'); e.src=e.src.split(\'?\')[0]+\'?\'+Math.random();">';

		$image .= $this->translator->translateById('lelesys.captcha.linktext', array(), NULL, NULL, 'Main', 'Lelesys.Captcha');
		$image .= '</a>';
		$image .= '</p>';
		return $image;
	}

}

?>
