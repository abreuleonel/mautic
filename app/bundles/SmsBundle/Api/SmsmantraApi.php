<?php
/**
 * @package     Mautic
 * @copyright   2016 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
namespace Mautic\SmsBundle\Api;


use Mautic\CoreBundle\Factory\MauticFactory;
use Mautic\CoreBundle\Helper\PhoneNumberHelper;
use Mautic\PageBundle\Model\TrackableModel;

class SmsmantraApi extends AbstractSmsApi
{
    public function __construct(TrackableModel $pageTrackableModel, MauticFactory $factory, \Services_Twilio $client, PhoneNumberHelper $phoneNumberHelper, $sendingPhoneNumber)
    {
        $this->client = $client;
        parent::__construct($pageTrackableModel);
    }

    public function sendSms($number, $content)
    {
    	$username = 'eoumrm';
    	$password = '2564Iv6j';
		$number = '+55' . $number;
    	$url = "https://api.infobip.com/sms/1/text/query?username={$username}&password={$password}&to={$number}&text={$content}";
    	
		$curl = curl_init($url);
		$result = curl_exec($curl);
		
        return true;

    }
}
