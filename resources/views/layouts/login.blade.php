<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <link href="https://use.fontawesome.com/releases/v6.2.1/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
                        <?php
                        $user_id = Auth::id();
                         $followed_num = DB::table('users')->join('follows','follows.followed_id' , '=', 'users.id')->where('followed_id',$user_id)->count();
                        $following_num = DB::table('users')->join('follows', 'follows.following_id', '=', 'users.id')->where('users.id', $user_id)->count();
                        ?>
<body>
    <header>
        <div id = "head">
        <h1 class="atlas_img">
            <a href="{{url('top')}}">
                <img  src="{{ asset('images/Atlas.png')}}" class="top_img">
            </a>
        </h1>
            <div id="head-right">
                <div id="head-right-name">
                    <p>
                        <?php $user = Auth::user(); ?>
                        {{ $user->username }}<span >さん</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <img src="{{asset('images/'.$user->images)}}">
                    </p>
                <div>
                <ul class="usermenu">
                    <li><a href="{{url('top')}}">ホーム</a></li>
                    <li><a href="{{url('profile')}}">プロフィール編集</a></li>
                    <li><a href="{{url('logout')}}">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="username">{{$user->username}}さんの</p>
                <div class="following">
                    <p class="following_num">フォロー数</p>
                    <p>{{ $following_num }}名</p>
                </div>
                <p class="btn"><a href="{{ url('followlist') }}">フォローリスト</a></p>
                <div class="followed">
                    <p class="followed_num">フォロワー数</p>
                    <p>{{ $followed_num }}名</p>
                </div>
                <p class="btn"><a href="{{ url('followerlist') }}">フォロワーリスト</a></p>
            </div>
            <p class="search_btn"><a href="{{ url('search') }}">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
