<?php

namespace Rohinigeeks\Generator;

use Illuminate\Support\ServiceProvider;
use Rohinigeeks\Generator\Commands\APIGeneratorCommand;
use Rohinigeeks\Generator\Commands\ScaffoldGeneratorCommand;


class GeneratorServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$configPath = __DIR__ . '/../../../config/generator.php';
		$this->publishes([$configPath => config_path('generator.php')], 'config');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'erecto.api',
			$this->app->share(function($app) {
				return new APIGeneratorCommand(
					$app->make('Way\Generators\Generator'),
					$app->make('Way\Generators\Filesystem\Filesystem'),
					$app->make('Way\Generators\Compilers\TemplateCompiler'),
					$app->make('migration.repository'),
					$app->make('config')
				);
			})
		);

		/*
		$this->app->singleton('erecto.api', function ($app)
		{
			return new APIGeneratorCommand();
		});
		*/

		$this->app->bind(
			'erecto.api',
			$this->app->share(function($app) {
				return new APIGeneratorCommand(
					$app->make('Way\Generators\Generator'),
					$app->make('Way\Generators\Filesystem\Filesystem'),
					$app->make('Way\Generators\Compilers\TemplateCompiler'),
					$app->make('migration.repository'),
					$app->make('config')
				);
			})
		);

		/*
		$this->app->singleton('erecto.scaffold', function ($app)
		{
			return new ScaffoldGeneratorCommand();
		});
		*/

		$this->app->singleton(
			'Illuminate\Contracts\Debug\ExceptionHandler',
			'Rohinigeeks\Generator\Exceptions\APIExceptionsHandler'
		);

		$this->commands(['erecto.api', 'erecto.scaffold']);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
