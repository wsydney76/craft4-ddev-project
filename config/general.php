<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\config\GeneralConfig;
use craft\helpers\App;

$isDev = App::env('CRAFT_ENVIRONMENT') === 'dev';
$isProd = App::env('CRAFT_ENVIRONMENT') === 'production';

return
	GeneralConfig::create()
		->devMode($isDev)
		->allowAdminChanges($isDev)
		->defaultWeekStartDay(1)
		->omitScriptNameInUrls(true)
		->cpTrigger('admin')
		->securityKey(App::env('CRAFT_SECURITYKEY'))
		->preventUserEnumeration(true)
		->sendPoweredByHeader(false)
		->defaultTemplateExtensions(['twig'])
		->enableTemplateCaching($isProd)
		->maxRevisions(10)
		->convertFilenamesToAscii(true)
		->maxUploadFileSize('32M')
		->limitAutoSlugsToAscii(true)
		->generateTransformsBeforePageLoad(true)
		->optimizeImageFilesize(false)
		->revAssetUrls(true)
		->useIframeResizer(true)
		->disallowRobots(!$isProd)
		->aliases([
			// Prevent the @web alias from being set automatically (cache poisoning vulnerability)
			'@web' => App::env('DEFAULT_SITE_URL'),
			// Lets `./craft clear-caches all` clear CP resources cache
			'@webroot' => dirname(__DIR__) . '/web',
		]);

