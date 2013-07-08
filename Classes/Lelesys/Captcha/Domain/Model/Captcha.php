<?php
namespace Lelesys\Captcha\Domain\Model;

/*                                                                         *
 * This script belongs to the package "Lelesys.Captcha".                   *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

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