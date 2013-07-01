<?php
namespace Lelesys\Captcha\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Lelesys.Captcha".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Captcha
 *
 * @Flow\Entity
 */
class Captcha {

	/**
	 * The name
	 * @var string
	 */
	protected $name;


	/**
	 * Get the Captcha's name
	 *
	 * @return string The Captcha's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Captcha's name
	 *
	 * @param string $name The Captcha's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

}
?>