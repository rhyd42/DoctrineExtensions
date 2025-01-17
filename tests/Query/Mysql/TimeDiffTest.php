<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class TimeDiffTest extends MysqlTestCase
{
    public function testTimeDiff():void
    {
        $this->assertDqlProducesSql(
            "SELECT TIMEDIFF(2, 3) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT TIMEDIFF(2, 3) AS sclr_0 FROM Blank b0_'
        );
    }
}
