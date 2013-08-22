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
	 * @var \TYPO3\Flow\Core\Bootstrap
	 * @Flow\Inject
	 */
	protected $bootstrap;

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
	 * Renders the captch image
	 *
	 * @return void
	 */
	public function render() {
		$baseUri = $this->bootstrap->getActiveRequestHandler()->getHttpRequest()->getBaseUri();
		$path = $baseUri . 'Lelesys.Captcha/Captcha/captcha';
		$template = new \TYPO3\Fluid\View\StandaloneView();
		$template->setTemplatePathAndFilename($this->settings['templatePath']);
		$template->assign('path', $path);
		return $template->render();
	}

}

?>
