<?php
App::uses('Charge', 'Model');

/**
 * Charge Test Case
 *
 */
class ChargeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.charge',
		'app.branch',
		'app.company',
		'app.address',
		'app.requirement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Charge = ClassRegistry::init('Charge');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Charge);

		parent::tearDown();
	}

}
