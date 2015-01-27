<?php
/*
 * This file is part of the Ginger Workflow Framework.
 * (c) prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 06.12.14 - 22:33
 */

namespace Dashboard\Controller;

use Application\Service\AbstractQueryController;
use Dashboard\View\DashboardWidget;

/**
 * Class AbstractWidgetController
 *
 * @package Dashboard\Controller
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
abstract class AbstractWidgetController extends AbstractQueryController
{
    /**
     * @return DashboardWidget
     */
    abstract public function widgetAction();
}
 