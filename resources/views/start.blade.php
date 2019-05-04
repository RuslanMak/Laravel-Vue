@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h2 class="border-bottom text-center"> Standart Vue+Laravel</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a type="button" class="btn btn-light" href="#1">Example component</a>
                    <a type="button" class="btn btn-light" href="#2">Vue -> Blade</a>
                    <a type="button" class="btn btn-light" href="#3">Ajax</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a type="button" class="btn btn-light" href="#4">ChartJS - Line</a>
                    <a type="button" class="btn btn-light" href="#5">ChartJS - Pie</a>
                    <a type="button" class="btn btn-light" href="#6">ChartJS - Random</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a type="button" class="btn btn-light" href="#7">ChartJS - REALTIME (Socket)</a>
                    <a type="button" class="btn btn-light" href="#8">Chat - REALTIME</a>
                    <a type="button" class="btn btn-light" href="#9">Chat - Private</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="owl-carousel owl-theme mt-5">
                <div class="row m-2" data-hash="1">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#1 Example component</h2>
                                <example-component></example-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2" data-hash="2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#2 Передача данных в Vue из Blade</h2>
                                <prop-component :urldata="{{ json_encode($url_data) }}"></prop-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2" data-hash="3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#3 Ajax</h2>
                                <ajax-component></ajax-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2" data-hash="4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#4 ChartJS (Line) $ VueJS *ajax</h2>
                                <chartline-component></chartline-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2" data-hash="5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#5 ChartJS (Pie) $ VueJS *ajax</h2>
                                <chartpie-component></chartpie-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2" data-hash="6">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#6 ChartJS (Line Random) $ VueJS *ajax</h2>
                                <chartrandom-component></chartrandom-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2" data-hash="7">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#7 REALTIME ChartJS (Line) $ VueJS *ajax+trigger+reload</h2>
                                <socket-component></socket-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2" data-hash="8">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#8 REALTIME Chat $ VueJS *ajax+trigger+reload</h2>
                                <socket-chat-component></socket-chat-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2" data-hash="9">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px">
                                <h2 class="text-center">#9 REALTIME Chat Private $ VueJS *ajax+trigger+reload</h2>
                                @if(Auth::check())
                                    <h4 class="text-center">пользователь: {{ Auth::user()->email }}</h4>
                                    <socket-private-component
                                        :users="{{ \App\User::select('email', 'id')->where('id', '!=', Auth::id())->get() }}"
                                        :user="{{ Auth::user() }}"
                                    ></socket-private-component>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
