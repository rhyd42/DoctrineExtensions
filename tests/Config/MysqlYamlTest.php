<?php

namespace DoctrineExtensions\Tests\Config;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Parser;

/**
 * Test that checks the README describes all of the query types
 *
 * @author Steve Lacey <steve@stevelacey.net>
 */
final class MysqlYamlTest extends TestCase
{
    protected array $functions;

    protected function setUp(): void
    {
        $yaml = new Parser();

        $config = $yaml->parse(file_get_contents(__DIR__ . '/../../config/mysql.yml'));
        $this->functions = array_merge(
            $config['doctrine']['orm']['dql']['datetime_functions'],
            $config['doctrine']['orm']['dql']['numeric_functions'],
            $config['doctrine']['orm']['dql']['string_functions']
        );
    }

    public function testFunctions(): void
    {
        $documented = $this->functions;

        $available = array_map(
            static function ($path) {
                return 'DoctrineExtensions\\Query\\Mysql\\' . str_replace('.php', '', basename($path));
            },
            glob(__DIR__ . '/../../src/Query/Mysql/*')
        );

        $undocumented = array_diff($available, $documented);

        if ($undocumented) {
            $this->fail(
                "The following MySQL query functions are undocumented in mysql.yml\n\n" .
                implode("\n", $undocumented)
            );
        } else {
            $this->assertEmpty($undocumented);
        }
    }

    public function testReadme(): void
    {
        preg_match('#\| MySQL \| `(.*)` \|#', file_get_contents(__DIR__ . '/../../README.md'), $matches);

        $docs = explode(', ', strtolower($matches[1]));
        $keys = array_keys($this->functions);

        sort($docs);
        sort($keys);

        $this->assertEquals($docs, $keys);
    }
}
