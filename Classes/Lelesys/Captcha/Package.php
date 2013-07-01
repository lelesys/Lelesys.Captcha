<?php
namespace Lelesys\Captcha;

use \TYPO3\Flow\Package\Package as BasePackage;
use TYPO3\Flow\Annotations as Flow;

/**
 * Package base class of the Launchr.Core package.
 *
 * @Flow\Scope("singleton")
 */
class Package extends BasePackage {
	/**
	 * Invokes custom PHP code directly after
	 * the package manager has been initialized.
	 *
	 * @param \TYPO3\Flow\Core\Bootstrap $bootstrap The current bootstrap
	 * @return void
	 */
	public function boot(\TYPO3\Flow\Core\Bootstrap $bootstrap) {
		require_once($this->packagePath . 'Resources/Private/PHP/Captcha/CaptchaBuilderInterface.php');
		require_once($this->packagePath . 'Resources/Private/PHP/Captcha/PhraseBuilderInterface.php');
		require_once($this->packagePath . 'Resources/Private/PHP/Captcha/CaptchaBuilder.php');
		require_once($this->packagePath . 'Resources/Private/PHP/Captcha/PhraseBuilder.php');

		}
}
?>