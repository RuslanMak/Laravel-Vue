<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessage;
use App\Events\PrivateMessage;

class StartController extends Controller
{
    public function index()
    {
        $url_data = [
            array(
                'title' => 'Ruslan-DEVELOP',
                'url' => 'https://dka-develop.ru'
            ),
            array(
                'title' => 'YouTube',
                'url' => 'https://youtube.com'
            )
        ];

//        dd($url_data);
//        dd(json_encode($url_data));

        return view('start', [
            'url_data' => $url_data
        ]);
    }

    public function getJson()
    {
        return [
            array(
                'title' => 'Google',
                'url' => 'https://google.com'
            ),
            array(
                'title' => 'Yandex',
                'url' => 'http://ya.ru'
            )
        ];
    }

    public function chartData()
    {
        return [
           'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => array([
                'label' => 'Продажи',
                'backgroundColor' => ['#F26202', '#3490dc', '#38c172', '#B5CC18'],
                'data' => [15000, 5000, 40000, 10000]
            ])
        ];
    }

    public function chartRandom()
    {
        return [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => array(
                [
                'label' => 'Золото',
                'backgroundColor' => '#16AB39',
                'data' => [rand(0,40000), rand(0,40000), rand(0,40000), rand(0,40000)]
                ],
                [
                    'label' => 'Серебро',
                    'backgroundColor' => '#B5CC18',
                    'data' => [rand(0,40000), rand(0,40000), rand(0,40000), rand(0,40000)]
                ]
            )
        ];
    }

    public function newEvent(Request $request) {
        $result = [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => array([
                'label' => 'Продажи',
                'backgroundColor' => '#F26202',
                'data' => [15000, 5000, 40000, 10000]
            ])
        ];

        if ($request->has('label')) {
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = (integer)$request->input('sale');

            if ($request->has('realtime')) {
//                if ($request->input('realtime') == 'true') {
                if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) {
                    event(new \App\Events\NewEvent($result));
                }
            }
        }

        return $result;
    }

    public function sendMessage(Request $request) {
        event(new NewMessage($request->input('message')));
//        NewMessage::dispatch($request->all());
    }

    public function PrivateMessage(Request $request) {
        PrivateMessage::dispatch($request->all());
//        event(new PrivateMessage($request->all()));

        return $request->all();
    }
}
