<?php
declare(strict_types=1);

namespace Frontender\FunctionalTesting\Test\Functional\Utils;

use PHPUnit\Framework\TestCase;

class RemoteClientTestCase extends TestCase
{
    const MAX_TOTAL_TIME = 10.0;

    protected function getDataFromRemoteClient(string $url): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $content = curl_exec($ch);
        $this->assertNotEmpty($content);

        $info = curl_getinfo($ch);
        $this->assertEquals('application/json', $info['content_type'], var_export($info, true));

        $this->assertEquals(200, $info['http_code']);

        $this->assertLessThan(self::MAX_TOTAL_TIME, $info['total_time'], sprintf('Total time is higher than %s seconds', self::MAX_TOTAL_TIME));

        $data = json_decode($content,true);
        $this->assertIsArray($data);

        curl_close($ch);

        return $data;
    }
}