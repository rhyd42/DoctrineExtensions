<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class RegexpTest extends MysqlTestCase
{
    public function testRegexp():void
    {
        $this->assertDqlProducesSql(
            "SELECT REGEXP('2', '3') from DoctrineExtensions\Tests\Entities\Blank b",
            "SELECT ('2' REGEXP '3') AS sclr_0 FROM Blank b0_"
        );
    }
}
