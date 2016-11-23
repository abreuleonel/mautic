<?php
/**
 * @copyright   2016 Mautic, Inc. All rights reserved
 * @author      Mautic, Inc
 *
 * @link        https://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\EOUCroncommandsBundle\Controller;

use Mautic\CoreBundle\Controller\AjaxController as CommonAjaxController;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AjaxController.
 */
class AjaxController extends CommonAjaxController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    protected function executeCommandAction(Request $request)
    {
        $response = '';
        $success  = false;

        $args = ['console', $request->request->get('command')];

        try {
            $input  = new ArgvInput($args);
            $output = new BufferedOutput();
            $kernel = new \AppKernel('prod', false);
            $app    = new Application($kernel);
            $app->setAutoExit(false);

            $result = $app->run($input, $output);

            $response = $output->fetch();
            $success  = true;
        } catch (\Exception $exception) {
            $response = $exception->getMessage();
            $success  = false;
        }

        return $this->sendJsonResponse(['message' => $response, 'success' => $success]);
    }
}
