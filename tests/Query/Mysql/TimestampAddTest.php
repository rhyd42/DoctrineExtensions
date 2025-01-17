<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class TimestampAddTest extends MysqlTestCase
{
    public function testTimestampAdd(): void
    {
        $this->assertDqlProducesSql(
            "SELECT TIMESTAMPADD(MINUTE, 1, '2003-01-02') from DoctrineExtensions\Tests\Entities\Blank b",
            "SELECT TIMESTAMPADD(MINUTE, 1, '2003-01-02') AS sclr_0 FROM Blank b0_"
        );
    }
}
