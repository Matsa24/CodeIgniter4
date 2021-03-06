<?php namespace CodeIgniter\Config;

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	CodeIgniter Dev Team
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 3.0.0
 * @filesource
 */


/**
 * -------------------------------------------------------------------
 * AUTO-LOADER
 * -------------------------------------------------------------------
 * This file defines the namespaces and class maps so the Autoloader
 * can find the files as needed.
 */
class AutoloadConfig
{
	public $psr4 = [];

	public $classmap = [];

	//--------------------------------------------------------------------

	public function __construct()
	{
		/**
		 * -------------------------------------------------------------------
		 * Namespaces
		 * -------------------------------------------------------------------
		 * This maps the locations of any namespaces in your application
		 * to their location on the file system. These are used by the
		 * Autoloader to locate files the first time they have been instantiated.
		 *
		 * The '/application' and '/system' directories are already mapped for
		 * you. You may change the name of the 'App' namespace if you wish,
		 * but this should be done prior to creating any namespaced classes,
		 * else you will need to modify all of those classes for this to work.
		 *
		 * DO NOT change the name of the CodeIgniter namespace or your application
		 * WILL break. *
		 * Prototype:
		 *
		 *   $Config['psr4'] = [
		 *       'CodeIgniter' => SYSPATH
		 *   `];
		 */
		$this->psr4 = [
			'CodeIgniter' => realpath(BASEPATH),
		];

		/**
		 * -------------------------------------------------------------------
		 * Class Map
		 * -------------------------------------------------------------------
		 * The class map provides a map of class names and their exact
		 * location on the drive. Classes loaded in this manner will have
		 * slightly faster performance because they will not have to be
		 * searched for within one or more directories as they would if they
		 * were being autoloaded through a namespace.
		 *
		 * Prototype:
		 *
		 *   $Config['classmap'] = [
		 *       'MyClass'   => '/path/to/class/file.php'
		 *   ];
		 */
		$this->classmap = [
			'CodeIgniter\CLI\CLI'                           => BASEPATH.'CLI/CLI.php',
			'CodeIgniter\Loader'                            => BASEPATH.'Loader.php',
			'CodeIgniter\Controller'                        => BASEPATH.'Controller.php',
			'CodeIgniter\Config\AutoloadConfig'             => BASEPATH.'Config/Autoload.php',
			'CodeIgniter\Config\BaseConfig'                 => BASEPATH.'Config/BaseConfig.php',
			'CodeIgniter\Config\Database'                   => BASEPATH.'Config/Database.php',
			'CodeIgniter\Config\Database\Connection'        => BASEPATH.'Config/Database/Connection.php',
			'CodeIgniter\Config\Database\Connection\MySQLi' => BASEPATH.'Config/Database/Connection/MySQLi.php',
			'CodeIgniter\Config\DotEnv'                     => BASEPATH.'Config/DotEnv.php',
			'CodeIgniter\Debug\Exceptions'                  => BASEPATH.'Debug/Exceptions.php',
			'CodeIgniter\Debug\Timer'                       => BASEPATH.'Debug/Timer.php',
			'CodeIgniter\Debug\Iterator'                    => BASEPATH.'Debug/Iterator.php',
			'CodeIgniter\Hooks\Hooks'                       => BASEPATH.'Hooks/Hooks.php',
			'CodeIgniter\HTTP\CLIRequest'                   => BASEPATH.'HTTP/CLIRequest.php',
			'CodeIgniter\HTTP\ContentSecurityPolicy'        => BASEPATH.'HTTP/ContentSecurityPolicy.php',
			'CodeIgniter\HTTP\CURLRequest'                  => BASEPATH.'HTTP/CURLRequest.php',
			'CodeIgniter\HTTP\IncomingRequest'              => BASEPATH.'HTTP/IncomingRequest.php',
			'CodeIgniter\HTTP\Message'                      => BASEPATH.'HTTP/Message.php',
			'CodeIgniter\HTTP\Negotiate'                    => BASEPATH.'HTTP/Negotiate.php',
			'CodeIgniter\HTTP\Request'                      => BASEPATH.'HTTP/Request.php',
			'CodeIgniter\HTTP\RequestInterface'             => BASEPATH.'HTTP/RequestInterface.php',
			'CodeIgniter\HTTP\Response'                     => BASEPATH.'HTTP/Response.php',
			'CodeIgniter\HTTP\ResponseInterface'            => BASEPATH.'HTTP/ResponseInterface.php',
			'CodeIgniter\HTTP\URI'                          => BASEPATH.'HTTP/URI.php',
			'CodeIgniter\Log\Logger'                        => BASEPATH.'Log/Logger.php',
			'Psr\Log\LoggerAwareInterface'                  => BASEPATH.'Log/LoggerAwareInterface.php',
			'CodeIgniter\Log\LoggerAwareTrait'              => BASEPATH.'Log/LoggerAwareTrait.php',
			'Psr\Log\LoggerInterface'                       => BASEPATH.'Log/LoggerInterface.php',
			'Psr\Log\LogLevel'                              => BASEPATH.'Log/LogLevel.php',
			'CodeIgniter\Log\Handlers\BaseHandler'          => BASEPATH.'Log/Handlers/BaseHandler.php',
			'CodeIgniter\Log\Handlers\ChromeLoggerHandler'  => BASEPATH.'Log/Handlers/ChromeLoggerHandler.php',
			'CodeIgniter\Log\Handlers\FileHandler'          => BASEPATH.'Log/Handlers/FileHandler.php',
			'CodeIgniter\Log\Handlers\HandlerInterface'     => BASEPATH.'Log/Handlers/HandlerInterface.php',
			'CodeIgniter\Router\RouteCollection'            => BASEPATH.'Router/RouteCollection.php',
			'CodeIgniter\Router\RouteCollectionInterface'   => BASEPATH.'Router/RouteCollectionInterface.php',
			'CodeIgniter\Router\Router'                     => BASEPATH.'Router/Router.php',
			'CodeIgniter\Router\RouterInterface'            => BASEPATH.'Router/RouterInterface.php',
			'CodeIgniter\Security\Security'                 => BASEPATH.'Security/Security.php',
			'CodeIgniter\Session\Session'                   => BASEPATH.'Session/Session.php',
			'CodeIgniter\Session\SessionInterface'          => BASEPATH.'Session/SessionInterface.php',
			'CodeIgniter\Session\Handlers\BaseHandler'      => BASEPATH.'Session/Handlers/BaseHandler.php',
			'CodeIgniter\Session\Handlers\FileHandler'      => BASEPATH.'Session/Handlers/FileHandler.php',
			'CodeIgniter\Session\Handlers\MemcachedHandler' => BASEPATH.'Session/Handlers/MemcachedHandler.php',
			'CodeIgniter\Session\Handlers\RedisHandler'     => BASEPATH.'Session/Handlers/RedisHandler.php',
			'CodeIgniter\View\RenderableInterface'          => BASEPATH.'View/RenderableInterface.php',
			'CodeIgniter\View\View'                         => BASEPATH.'View/View.php',
			'Zend\Escaper\Escaper'                          => BASEPATH.'View/Escaper.php',
			'TestLogger'                                    => BASEPATH.'../tests/_support/Log/TestLogger.php',
		];
	}

	//--------------------------------------------------------------------

}
