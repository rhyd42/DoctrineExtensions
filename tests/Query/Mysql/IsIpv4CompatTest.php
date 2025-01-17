<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class IsIpv4CompatTest extends MysqlTestCase
{
    public function testIsIpv4Compat():void
    {
        $this->assertDqlProducesSql(
            "SELECT IS_IPV4_COMPAT(INET6_ATON('::192.0.2.1')) FROM DoctrineExtensions\Tests\Entities\Blank b",
            "SELECT IS_IPV4_COMPAT(INET6_ATON('::192.0.2.1')) AS sclr_0 FROM Blank b0_"
        );
    }
}
