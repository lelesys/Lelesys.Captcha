<?php

namespace Lelesys\Captcha\ViewHelpers;

/*                                                                         *
 * This script belongs to the package "Lelesys.Captcha".                   *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use Neos\Flow\Annotations as FLOW;

class CaptchaViewHelper extends \TYPO3\Fluid\ViewHelpers\Form\AbstractFormFieldViewHelper {

	/**
	 * @var \Neos\Flow\Core\Bootstrap
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
		$uriBuilder = $this->controllerContext->getUriBuilder();
		$uri = $uriBuilder->uriFor('captcha', array(), 'Captcha', 'Lelesys.Captcha');
		$template = new \TYPO3\Fluid\View\StandaloneView();
		$template->setTemplatePathAndFilename($this->settings['templatePath']);
		$template->assign('path', $uri);
		return $template->render();
	}

}

?>
