<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class RoundTest extends MysqlTestCase
{
    public function testRoundOneArgument(): void
    {
        $this->assertDqlProducesSql(
            "SELECT ROUND(2) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT ROUND(2) AS sclr_0 FROM Blank b0_'
        );
    }

    public function testRoundTwoArguments(): void
    {
        $this->assertDqlProducesSql(
            "SELECT ROUND(2, 3) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT ROUND(2, 3) AS sclr_0 FROM Blank b0_'
        );
    }
}
