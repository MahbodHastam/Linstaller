<?php


namespace MahbodHastam\Linstaller\Tests\Feature;


use MahbodHastam\Linstaller\Helpers\CheckPermissions;
use MahbodHastam\Linstaller\Helpers\CheckRequirements;
use MahbodHastam\Linstaller\Tests\TestCase;

class LinstallerTest extends TestCase {
	public function test_check_permissions() {
		$check = (new CheckPermissions)->check(['bootstrap/cache/' => 755, 'storage/logs' => 755]);

		$this->assertEquals(null, $check['errors']);
	}

	public function test_check_requirements() {
		$check = (new CheckRequirements)->check([
			'php' => [
				'pdo',
			],
		]);

		$this->assertEquals(null, @$check['errors']);
	}
}