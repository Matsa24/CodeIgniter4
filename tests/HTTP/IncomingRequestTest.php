<?php

use Config\App;
use CodeIgniter\HTTP\URI;

class IncomingRequestTest extends CIUnitTestCase
{
	/**
	 * @var \CodeIgniter\HTTP\IncomingRequest
	 */
	protected $request;

	public function setUp()
	{
	    $this->request = new \CodeIgniter\HTTP\IncomingRequest(new App(), new URI());

		$_POST = $_GET = $_SERVER = $_REQUEST = $_ENV = $_COOKIE = $_SESSION = [];
	}

	//--------------------------------------------------------------------

	public function testCanGrabGetVars()
	{
	    $_GET['TEST'] = 5;

		$this->assertEquals(5, $this->request->getGet('TEST'));
		$this->assertEquals(null, $this->request->getGEt('TESTY'));
	}

	//--------------------------------------------------------------------

	public function testCanGrabPostVars()
	{
		$_POST['TEST'] = 5;

		$this->assertEquals(5, $this->request->getPost('TEST'));
		$this->assertEquals(null, $this->request->getPost('TESTY'));
	}

	//--------------------------------------------------------------------

	public function testCanGrabPostBeforeGet()
	{
		$_POST['TEST'] = 5;
		$_GET['TEST'] = 3;

		$this->assertEquals(5, $this->request->getPostGet('TEST'));
		$this->assertEquals(3, $this->request->getGetPost('TEST'));
	}

	//--------------------------------------------------------------------

	public function testCanGrabServerVars()
	{
		$_SERVER['TEST'] = 5;

		$this->assertEquals(5, $this->request->getServer('TEST'));
		$this->assertEquals(null, $this->request->getServer('TESTY'));
	}

	//--------------------------------------------------------------------

	public function testCanGrabEnvVars()
	{
		$_ENV['TEST'] = 5;

		$this->assertEquals(5, $this->request->getEnv('TEST'));
		$this->assertEquals(null, $this->request->getEnv('TESTY'));
	}

	//--------------------------------------------------------------------

	public function testCanGrabCookieVars()
	{
		$_COOKIE['TEST'] = 5;

		$this->assertEquals(5, $this->request->getCookie('TEST'));
		$this->assertEquals(null, $this->request->getCookie('TESTY'));
	}

	//--------------------------------------------------------------------

	public function testFetchGlobalReturnsSingleValue()
	{
		$_POST = [
			'foo' => 'bar',
			'bar' => 'baz',
			'xxx' => 'yyy',
			'yyy' => 'zzz'
		];

		$this->assertEquals('baz', $this->request->getPost('bar'));
	}

	//--------------------------------------------------------------------

	public function testFetchGlobalFiltersValue()
	{
		$_POST = [
			'foo' => 'bar<script>',
			'bar' => 'baz',
			'xxx' => 'yyy',
			'yyy' => 'zzz'
		];

		$this->assertEquals('bar%3Cscript%3E', $this->request->getPost('foo', FILTER_SANITIZE_ENCODED));
	}

	//--------------------------------------------------------------------

	public function testFetchGlobalReturnsAllWhenEmpty()
	{
		$post = [
			'foo' => 'bar',
			'bar' => 'baz',
			'xxx' => 'yyy',
			'yyy' => 'zzz'
		];
		$_POST = $post;

		$this->assertEquals($post, $this->request->getPost());
	}

	//--------------------------------------------------------------------

	public function testFetchGlobalFiltersAllValues()
	{
		$_POST = [
			'foo' => 'bar<script>',
			'bar' => 'baz<script>',
			'xxx' => 'yyy<script>',
			'yyy' => 'zzz<script>'
		];
		$expected = [
			'foo' => 'bar%3Cscript%3E',
			'bar' => 'baz%3Cscript%3E',
			'xxx' => 'yyy%3Cscript%3E',
			'yyy' => 'zzz%3Cscript%3E'
		];

		$this->assertEquals($expected, $this->request->getPost(null, FILTER_SANITIZE_ENCODED));
	}

	//--------------------------------------------------------------------

	public function testFetchGlobalReturnsSelectedKeys()
	{
		$_POST = [
			'foo' => 'bar',
			'bar' => 'baz',
			'xxx' => 'yyy',
			'yyy' => 'zzz'
		];
		$expected = [
			'foo' => 'bar',
			'bar' => 'baz',
		];

		$this->assertEquals($expected, $this->request->getPost(['foo', 'bar']));
	}

	//--------------------------------------------------------------------

	public function testFetchGlobalFiltersSelectedValues()
	{
		$_POST = [
			'foo' => 'bar<script>',
			'bar' => 'baz<script>',
			'xxx' => 'yyy<script>',
			'yyy' => 'zzz<script>'
		];
		$expected = [
			'foo' => 'bar%3Cscript%3E',
			'bar' => 'baz%3Cscript%3E',
		];

		$this->assertEquals($expected, $this->request->getPost(['foo', 'bar'], FILTER_SANITIZE_ENCODED));
	}

	//--------------------------------------------------------------------
}
