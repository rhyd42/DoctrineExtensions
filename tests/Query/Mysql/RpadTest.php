<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class RpadTest extends MysqlTestCase
{
    public function testRpad():void
    {
        $this->assertDqlProducesSql(
            "SELECT RPAD(2, 3, 4) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT RPAD(2, 3, 4) AS sclr_0 FROM Blank b0_'
        );
    }
}
