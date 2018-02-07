<?php
class IniTest extends PHPUnit_Framework_TestCase
{
    public function testIni()
    {
        $this->assertEquals('app/x-test', ini_get('default_mimetype'));
    }
}
