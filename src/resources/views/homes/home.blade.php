@extends('layouts.application')

@section('content')

    <nav class="nav">
        <ul class="categories">
            <li class="categories__item categories__item--active-item">
                <a href="#">総合</a>
            </li>
            <?php foreach ($categories as $category) : ?>
            <li class="categories__item"><a href="#">{{ $category->category_name }}</a></li>
            <?php endforeach ?>
        </ul>
    </nav>
    <section class="ranking">
        <ul class="articles">
            <li class="articles__item">
                <div class="articles__order-number">1</div>
                <a href="#" class="articles__link">
                    <div class="articles__cover">
                        <img src="{{ asset('assets/image/1.png') }}" alt="article-image" />
                    </div>
                    <p class="articles__content">
                        【新型コロナ感染者数マップ】緊急事態宣言発令状況やを東京都市区町村別,緊急事態宣言発令状況やを東京都市区町村別
                    </p>
                </a>
                <div class="articles__stamp">
                    <p class="articles__time">
                        <img src="{{ asset('assets/image/icon.png') }}" class="clock-icon clock-icon--size"
                            alt="time-stamp" />
                        2時間
                    </p>
                    <a href="#">
                        <p class="articles__company-release">いちから株式会社</p>
                    </a>
                    <a href="#">
                        <p class="articles__pv">PV 00,000 / UU 00,000</p>
                    </a>
                </div>
            </li>
            <li class="articles__item">
                <div class="articles__order-number">2</div>
                <a href="#" class="articles__link">
                    <div class="articles__cover">
                        <img src="{{ asset('assets/image/2.png') }}" alt="article-image" />
                    </div>
                    <p class="articles__content">
                        従業員に国内最大級の「危険手当」を支給
                    </p>
                </a>
                <div class="articles__stamp">
                    <p class="articles__time">
                        <img src="{{ asset('assets/image/icon.png') }}" class="clock-icon clock-icon--size"
                            alt="time-stamp" />
                        1時間
                    </p>
                    <a href="#">
                        <p class="articles__company-release">株式会社SHIFT</p>
                    </a>
                    <a href="#">
                        <p class="articles__pv">PV 00,000 / UU 00,000</p>
                    </a>
                </div>
            </li>
            <li class="articles__item">
                <div class="articles__order-number">3</div>
                <a href="#" class="articles__link">
                    <div class="articles__cover">
                        <img src="{{ asset('assets/image/3.png') }}" alt="article-image" />
                    </div>
                    <p class="articles__content">
                        【医療関係優先期間終了】洗える布マスク「スーパーフィット」の一般販売...
                    </p>
                </a>
                <div class="articles__stamp">
                    <p class="articles__time">
                        <img src="{{ asset('assets/image/icon.png') }}" class="clock-icon clock-icon--size"
                            alt="time-stamp" />
                        2時間
                    </p>
                    <a href="#">
                        <p class="articles__company-release">
                            株式会社アメイズプラス
                        </p>
                    </a>
                    <a href="#">
                        <p class="articles__pv">PV 00,000 / UU 00,000</p>
                    </a>
                </div>
            </li>
            <li class="articles__item">
                <div class="articles__order-number">4</div>
                <a href="#" class="articles__link">
                    <div class="articles__cover">
                        <img src="{{ asset('assets/image/4.png') }}" alt="article-image" />
                    </div>
                    <p class="articles__content">
                        【新型コロナ感染者数マップ】緊急事態宣言発令状況やを東京都市区町村別...
                    </p>
                </a>
                <div class="articles__stamp">
                    <p class="articles__time">
                        <img src="{{ asset('assets/image/icon.png') }}" class="clock-icon clock-icon--size"
                            alt="time-stamp" />
                        2021年3月10日
                    </p>
                    <a href="#">
                        <p class="articles__company-release">いちから株式会社</p>
                    </a>
                    <a href="#">
                        <p class="articles__pv">PV 00,000 / UU 00,000</p>
                    </a>
                </div>
            </li>
            <li class="articles__item">
                <div class="articles__order-number">5</div>
                <a href="#" class="articles__link">
                    <div class="articles__cover">
                        <img src="{{ asset('assets/image/5.png') }}" alt="article-image" />
                    </div>
                    <p class="articles__content">
                        ニコニコ超会議2020 東大寺から疫病退散を祈願 法要と国宝
                    </p>
                </a>
                <div class="articles__stamp">
                    <p class="articles__time">
                        <img src="{{ asset('assets/image/icon.png') }}" class="clock-icon clock-icon--size"
                            alt="time-stamp" />
                        2時間
                    </p>
                    <a href="#">
                        <p class="articles__company-release">
                            株式会社アメイズプラス
                        </p>
                    </a>
                    <a href="#">
                        <p class="articles__pv">PV 00,000 / UU 00,000</p>
                    </a>
                </div>
            </li>
            <li class="articles__item">
                <div class="articles__order-number">6</div>
                <a href="#" class="articles__link">
                    <div class="articles__cover">
                        <img src="{{ asset('assets/image/6.png') }}" alt="article-image" />
                    </div>
                    <p class="articles__content">
                        東京証券取引所市場第一部へのお知らせ
                    </p>
                </a>
                <div class="articles__stamp">
                    <p class="articles__time">
                        <img src="{{ asset('assets/image/icon.png') }}" class="clock-icon clock-icon--size"
                            alt="time-stamp" />
                        2時間
                    </p>
                    <a href="#">
                        <p class="articles__company-release">
                            株式会社アメイズプラス
                        </p>
                    </a>
                    <a href="#">
                        <p class="articles__pv">PV 00,000 / UU 00,000</p>
                    </a>
                </div>
            </li>
        </ul>
    </section>
    <main class="main">
        <div class="contents">
            <div class="top-heading">
                <h3 class="contents__title">新着プレスリリース</h3>
                <a class="btn btn--info btn--radius" href="{{ route('articles.new') }}">投稿</a>
            </div>
            <div class="wrap">
                @if (Session::has('message'))
                    <div class="flash flash--success">
                        <p class="message">{{ Session::get('message') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="flash flash--danger">
                        @foreach ($errors->all() as $error)
                            <p class="message">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <ul class="articles">
                    @each('homes._article', $articles, 'article')
                </ul>
                <div class="control">
                    <a class="btn btn--light-blue input--radius" href="./views/check.php">もっと見る</a>
                </div>
            </div>
        </div>
        <aside class="side">
            <div class="keyword">
                <h4 class="title">今注目のキーワード</h4>
                <ul class="hot-keywords">
                    <li class="hot-keywords__item"><a href="#">桜</a></li>
                    <li class="hot-keywords__item"><a href="#">令和</a></li>
                    <li class="hot-keywords__item"><a href="#">テレワーク</a></li>
                    <li class="hot-keywords__item"><a href="#">#AprilDream</a></li>
                    <li class="hot-keywords__item"><a href="#">電子マネー</a></li>
                    <li class="hot-keywords__item"><a href="#">令和</a></li>
                    <li class="hot-keywords__item more-detail">
                        <a href="#">もっと見る</a>
                    </li>
                </ul>
            </div>
        </aside>
    </main>
@endsection
