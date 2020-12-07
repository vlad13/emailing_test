<?php

namespace App\Http\Controllers;

use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }


    public function home()
    {
        return view('home');
    }


    public function test()
    {
        /*
        // работает:
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => '5b2b914c0be17096dff4894a763a1de6-us2',
            'server' => 'us2'
        ]);

        $response = $mailchimp->ping->get();
        print_r($response);

        // пришел ответ: stdClass Object ( [health_status] => Everything's Chimpy! )
        */

        /*
        // add member to list - работает
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => '5b2b914c0be17096dff4894a763a1de6-us2',
            'server' => 'us2'
        ]);

        $list_id = "a543a6b507";

        $response = $mailchimp->lists->addListMember($list_id,
            [
            "email_address" => "vlad.shetinin@outlook.com",
            "status" => "subscribed",
            "merge_fields" => [
                "FNAME" => "vlad",
                "LNAME" => "outlook"
            ],
        ]);
        print_r($response);

        */
        // ответ:
        // stdClass Object ( [id] => 35e5f7245f2cae37bccc2fab61cbbe65 [email_address] => vlad.shetinin@outlook.com [unique_email_id] => e17dd1c8f3 [web_id] => 1324524058 [email_type] => html [status] => subscribed [merge_fields] => stdClass Object ( [FNAME] => vlad [LNAME] => outlook [ADDRESS] => [PHONE] => [BIRTHDAY] => ) [stats] => stdClass Object ( [avg_open_rate] => 0 [avg_click_rate] => 0 ) [ip_signup] => [timestamp_signup] => [ip_opt] => 185.108.23.10 [timestamp_opt] => 2020-12-07T18:30:49+00:00 [member_rating] => 2 [last_changed] => 2020-12-07T18:30:49+00:00 [language] => [vip] => [email_client] => [location] => stdClass Object ( [latitude] => 0 [longitude] => 0 [gmtoff] => 0 [dstoff] => 0 [country_code] => [timezone] => ) [source] => API - Generic [tags_count] => 0 [tags] => Array ( ) [list_id] => a543a6b507 [_links] => Array ( [0] => stdClass Object ( [rel] => self [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65 [method] => GET [targetSchema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/Response.json ) [1] => stdClass Object ( [rel] => parent [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members [method] => GET [targetSchema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/CollectionResponse.json [schema] => https://us2.api.mailchimp.com/schema/3.0/Paths/Lists/Members/Collection.json ) [2] => stdClass Object ( [rel] => update [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65 [method] => PATCH [targetSchema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/Response.json [schema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/PATCH.json ) [3] => stdClass Object ( [rel] => upsert [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65 [method] => PUT [targetSchema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/Response.json [schema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/PUT.json ) [4] => stdClass Object ( [rel] => delete [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65 [method] => DELETE ) [5] => stdClass Object ( [rel] => activity [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65/activity [method] => GET [targetSchema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/Activity/Response.json ) [6] => stdClass Object ( [rel] => goals [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65/goals [method] => GET [targetSchema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/Goals/Response.json ) [7] => stdClass Object ( [rel] => notes [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65/notes [method] => GET [targetSchema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/Notes/CollectionResponse.json ) [8] => stdClass Object ( [rel] => events [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65/events [method] => POST [targetSchema] => https://us2.api.mailchimp.com/schema/3.0/Definitions/Lists/Members/Events/POST.json ) [9] => stdClass Object ( [rel] => delete_permanent [href] => https://us2.api.mailchimp.com/3.0/lists/a543a6b507/members/35e5f7245f2cae37bccc2fab61cbbe65/actions/delete-permanent [method] => POST ) ) )



        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => '5b2b914c0be17096dff4894a763a1de6-us2',
            'server' => 'us2'
        ]);

        $list_id = "a543a6b507";

//        $response = $mailchimp->lists->addListMember($list_id,
//            [
//                [
//                    "email_address" => "vlad2.shetinin@outlook.com",
//                    "status" => "subscribed",
//                    "merge_fields" => [
//                        "FNAME" => "vlad2",
//                        "LNAME" => "outlook"
//                    ],
//                ],
//                [
//                    "email_address" => "vlad3.shetinin@outlook.com",
//                    "status" => "subscribed",
//                    "merge_fields" => [
//                        "FNAME" => "vlad3",
//                        "LNAME" => "outlook"
//                    ],
//                ]
//            ]);


        /*
        $response = $mailchimp->lists->addListMember($list_id,
            [
                "email_address" => "vlad2.shetinin@outlook.com",
                "status" => "subscribed",
                "merge_fields" => [
                    "FNAME" => "vlad2",
                    "LNAME" => "outlook"
                ],
            ]
        );
        echo '<pre>'; print_r($response); echo '</pre>';

        $response = $mailchimp->lists->addListMember($list_id,
            [
                "email_address" => "vlad3.shetinin@outlook.com",
                "status" => "subscribed",
                "merge_fields" => [
                    "FNAME" => "vlad3",
                    "LNAME" => "outlook"
                ],
            ]
        );
        echo '<pre>'; print_r($response); echo '</pre>';
*/

        // отписать членов:

        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => '5b2b914c0be17096dff4894a763a1de6-us2',
            'server' => 'us2'
        ]);

        $list_id = "a543a6b507";

//        $response = $mailchimp->lists->batchListMembers($list_id, [
//            [
//                "email_address" => "vlad2.shetinin@outlook.com",
//                "status" => "unsubscribed",
//            ],
//            [
//                "email_address" => "vlad3.shetinin@outlook.com",
//                "status" => "unsubscribed",
//            ],
//        ]);

        //$members = $mailchimp->searchMembers()


        // так можно добавить группу клиентов - работает
//        $response = $mailchimp->lists->batchListMembers($list_id, [
//            "members" => [
//                [
//                    "email_address" => "vlad4.shetinin@outlook.com",
//                    "status" => "unsubscribed",
//                ],
//                [
//                    "email_address" => "vlad5.shetinin@outlook.com",
//                    "status" => "unsubscribed",
//                ],
//            ]
//        ]);


        /*
        //  так можно обновить данные уже записанных ранее подписчиков:
        $response = $mailchimp->lists->batchListMembers($list_id, [
            "members" => [
                [
                    "email_address" => "vlad4.shetinin@outlook.com",
                    "status" => "subscribed",
                ],
                [
                    "email_address" => "vlad5.shetinin@outlook.com",
                    "status" => "subscribed",
                ],
            ],
            "update_existing" => true
        ]);


        echo '<pre>'; print_r($response); echo '</pre>';
*/


    }


}
