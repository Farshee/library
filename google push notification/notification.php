<?php

namespace App\Libraries;

class Notification
{

    function push_notification_android($device_id, $message, $apps_token)
    {

        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';

        /*api_key available in:
    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/
        if ($apps_token == 3) {
            $api_key = 'AAAAJFRKxZQ:APA91bG3YISMAKSJ9Ls1ABVZQTq7YLtLfVnUw6s7W5vXhSktEGe-AT-VR5OYuxG_5-fC-SEAQOPZrHSUtgP7NEUmePp2RIBPWkC-HHH103E191YpqPVjbh2QmBbDQHjkrz37kYPwhEVv';
        } else {
            $api_key = 'AAAAdle1Dy4:APA91bHMRHvEqnC0yVPXZdXv515uyGKBGmoPjPQVzk9JbyN6o6lPq-0aYAgMW3J8ikVLy2PFAYoDs3PmlgOV3tN4vElntC8BkIw71FkPSFBkm-OdYygAqjNFMDpNaxtzmWsxto2AVbFS';
        }

        $fields = array(
            'registration_ids' => array(
                $device_id
            ),
            'data' => $message
        );

        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $api_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        //return $result;
    }
}
