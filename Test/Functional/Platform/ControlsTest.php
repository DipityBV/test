<?php
declare(strict_types=1);

namespace Frontender\FunctionalTesting\Test\Functional\Platform;

use Frontender\FunctionalTesting\Test\Functional\Utils\RemoteClientTestCase;

class ControlsTest extends RemoteClientTestCase
{
    private $requiredControls = [
        'core/list' => false,
        'core/abstract' => false,
        'core/text' => false,
        'core/boolean' => false,
        'core/markdown' => false
    ];

    /**
     * @dataProvider \Frontender\FunctionalTesting\Test\Functional\Utils\PlatformDataProvider::getData()
     * @param string $url
     * @param string $platformType development|staging|production
     */
    public function testIfOutputIsNotEmpty(string $url, string $platformType = 'development')
    {
        $url .= '/api/controls';
        $controls = $this->getDataFromRemoteClient($url);
        $this->assertNotEmpty($controls);

        foreach ($controls as $control) {
            $this->assertNotEmpty($control['_id']);
            $this->assertNotEmpty($control['identifier']);

            $identifier = $control['identifier'];
            if (array_key_exists($identifier, $this->requiredControls)) {
                $this->requiredControls[$identifier] = true;
            }
        }

        foreach ($this->requiredControls as $controlName => $controlPresent) {
            $this->assertTrue($controlPresent);
        }
    }
}
