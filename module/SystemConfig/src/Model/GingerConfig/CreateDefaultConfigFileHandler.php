<?php
/*
 * This file is part of the Ginger Workflow Framework.
 * (c) prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 07.12.14 - 21:33
 */

namespace SystemConfig\Model\GingerConfig;

use Prooph\ServiceBus\EventBus;
use SystemConfig\Command\CreateDefaultGingerConfigFile;
use SystemConfig\Model\ConfigWriter;
use SystemConfig\Model\GingerConfig;

/**
 * Class CreateDefaultConfigFileHandler
 *
 * @package SystemConfig\Model\GingerConfig
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
final class CreateDefaultConfigFileHandler extends SystemConfigChangesHandler
{
    /**
     * @param CreateDefaultGingerConfigFile $command
     * @throws \RuntimeException
     */
    public function handle(CreateDefaultGingerConfigFile $command)
    {
        $gingerConfig = GingerConfig::initializeWithDefaultsIn($command->configLocation(), $this->configWriter);

        $this->publishChangesOf($gingerConfig);
    }
}
 