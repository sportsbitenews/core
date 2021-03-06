<?php
/**
 * Routes.
 *
 * @copyright Zikula contributors (Zikula)
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License
 * @author Zikula contributors <support@zikula.org>.
 * @link http://www.zikula.org
 * @link http://zikula.org
 * @version Generated by ModuleStudio 1.0.0 (https://modulestudio.de).
 */

namespace Zikula\RoutesModule\Helper;

use Zikula\Bundle\CoreBundle\HttpKernel\ZikulaHttpKernelInterface;
use Zikula\Core\AbstractBundle;
use Zikula\RoutesModule\Entity\RouteEntity;

class PathBuilderHelper
{
    /**
     * @var ZikulaHttpKernelInterface
     */
    private $kernel;

    /**
     * PathBuilderHelper constructor.
     *
     * @param ZikulaHttpKernelInterface $kernel Zikula kernel
     */
    public function __construct(ZikulaHttpKernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * Returns the route's path prepended with the bundle prefix.
     *
     * @param RouteEntity $route
     *
     * @return string
     */
    public function getPathWithBundlePrefix(RouteEntity $route)
    {
        $options = $route->getOptions();
        if (isset($options['zkNoBundlePrefix']) && $options['zkNoBundlePrefix']) {
            // return path only
            return $route->getPath();
        }

        /**
         * @var AbstractBundle $bundle
         */
        $bundle = null;
        try {
            $bundle = $this->kernel->getBundle($route->getBundle());
        } catch (\Exception $e) {
            return $route->getPath();
        }

        // return path prepended with bundle prefix
        return '/' . $bundle->getMetaData()->getUrl() . $route->getPath();
    }
}
