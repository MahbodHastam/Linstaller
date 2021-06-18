<?php


namespace MahbodHastam\Linstaller\Tests;


use MahbodHastam\Linstaller\Providers\LinstallerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase {
	/**
	 * Get package providers
	 *
	 * @param \Illuminate\Foundation\Application $app
	 * @return array|string[]
	 */
	protected function getPackageProviders($app) {
		return [
			LinstallerServiceProvider::class,
		];
	}

	/**
	 * Define environment setup
	 *
	 * @param \Illuminate\Foundation\Application $app
	 */
	/*protected function getEnvironmentSetUp($app) {
		$app['config']->set('database.default', 'linstallerdb');
		$app['config']->set('database.connections.linstallerdb', [
			'driver' => 'sqlite',
			'database' => ':memoty:',
		]);
  }*/
}
