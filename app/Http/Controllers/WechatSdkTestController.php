<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;

class WechatSdkTestController extends Controller
{
    //
    public function test(){
        return 'jk_test'.time();
    }


    public function yanzheng(){
        $options = [
            'debug'  => true,
            'app_id' => 'wx858b762dc6af6249',
            'secret' => '1ab68b48c760948ee041173508c3fcfc',
            'token'  => 'jk',

            'log' => [
                'level' => 'debug',
                //'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
                'file'  => '/tmp/easywechat/easywechat_jk_'.date('YmdH').'.log', // XXX: 绝对路径！！！！
            ],
        ];

        $app = new Application($options);

        //执行服务端业务
        //返回值
        $app->server->setMessageHandler(function ($message){
            switch ($message->Content) {
                case '你好':
                    # code...
                    return '你也好jk';
                    break;

                default:
                    # code...
                    return '你是谁呀？';
                    break;
            }
        });
        $response = $app->server->serve();
        return $response;
    }


    public function showMenu(){
        $options = [
            'debug'  => true,
            'app_id' => 'wx858b762dc6af6249',
            'secret' => '1ab68b48c760948ee041173508c3fcfc',
            'token'  => 'jk',

            'log' => [
                'level' => 'debug',
                //'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
                'file'  => '/tmp/easywechat/easywechat_jk_'.date('YmdH').'.log', // XXX: 绝对路径！！！！
            ],
        ];

        $app = new Application($options);

        $menu = $app->menu;

        $menus = $menu->all();

        return $menus;
        // dd($menus);


        // http://shinehua.duapp.com/



    }


    public function addMenu(){
        //{"menu":{"button":[{"type":"view","name":"\u9996\u9875","url":"http:\/\/www.lmqde.com\/cslt\/","sub_button":[]},{"type":"click","name":"\u83dc\u53551","key":"V1001_TODAY_MUSIC","sub_button":[]},{"name":"\u83dc\u53552","sub_button":[{"type":"click","name":"\u70b9\u51fb\u63a8\u4e8b\u4ef6","key":"click_event1","sub_button":[]},{"type":"view","name":"\u8df3\u8f6cURL","url":"http:\/\/www.example.com\/","sub_button":[]},{"type":"scancode_push","name":"\u626b\u7801\u63a8\u4e8b\u4ef6","key":"scancode_push_event1","sub_button":[]},{"type":"scancode_waitmsg","name":"\u626b\u7801\u5e26\u63d0\u793a","key":"scancode_waitmsg_event1","sub_button":[]}]}]}}
        $button = [
            //第一列
            [
                "type" => "view",
                "name" => "商城",
                "url"  => "http://shinehua.duapp.com/"
            ],
            //第二列
            [
//                "type" => "view",
                "name" => "菜单",
//                "url"  => "http://www.lmqde.com/"
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们吧",
                        "key"  => "A_B_C_D_E_F_G_H_J"
                    ],
                    [
                        "type" => "scancode_waitmsg",
                        "name" => "扫码带提示",
                        "key"  => "rselfmenu_0_0",
//                        "sub_button" => []
                    ],
                    [
                        "type" => "scancode_push",
                        "name" => "扫码推事件",
                        "key"  => "rselfmenu_0_1",
//                        "sub_button" => []
                    ],
                ],
            ],
            //第三列
            [
                "type" => "view",
                "name" => "主页",
                "url"  => "http://www.lmqde.com/"
            ]

        ];

         $options = [
                'debug'  => true,
                'app_id' => 'wx858b762dc6af6249',
                'secret' => '1ab68b48c760948ee041173508c3fcfc',
                'token'  => 'jk',

                'log' => [
                    'level' => 'debug',
                    //'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
                    'file'  => '/tmp/easywechat/easywechat_jk_'.date('YmdH').'.log', // XXX: 绝对路径！！！！
                ],
            ];

        $app = new Application($options);

        $menu = $app->menu;

        // $menu->destroy();

        $res = $menu->add($button);
        dd($res);
        // return $res;

        // return $menus;

//        dd($button);
    }
}
