{{-- resources/views/layout/header.blade.php --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 Heros Decor | Home & Living</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --accent: #C9623F;
            --accent-dark: #a84e30;
            --text-dark: #222222;
            --text-mid: #555555;
            --text-light: #888888;
            --border: #e5e5e5;
            --bg-light: #f8f8f8;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            color: var(--text-mid);
            line-height: 1.7;
        }

        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }

        /* ── HEADER TOP BAR ── */
        .header-top {
            background: #222222;
            padding: 8px 0;
            font-size: 12px;
            color: #aaaaaa;
        }

        .header-top .auto-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-top .top-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Language dropdown */
        .lang-dropdown .lang-btn {
            background: var(--accent);
            color: #fff;
            border: none;
            padding: 5px 14px;
            font-size: 11px;
            cursor: pointer;
            border-radius: 2px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .lang-dropdown { position: relative; }
        .lang-dropdown .lang-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #333;
            min-width: 120px;
            z-index: 999;
            padding: 5px 0;
        }
        .lang-dropdown:hover .lang-menu { display: block; }
        .lang-menu a {
            display: block;
            padding: 6px 14px;
            color: #ccc;
            font-size: 12px;
        }
        .lang-menu a:hover { color: var(--accent); }

        .header-top .top-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .top-right .social-icon a {
            color: #888;
            margin-left: 8px;
            font-size: 13px;
            transition: color .2s;
        }
        .top-right .social-icon a:hover { color: var(--accent); }

        .top-right .top-info {
            display: flex;
            gap: 18px;
            align-items: center;
        }
        .top-right .top-info li {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #aaa;
        }
        .top-right .top-info li i { color: var(--accent); }

        /* ── MAIN HEADER ── */
        .main-header {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 500;
            box-shadow: 0 2px 12px rgba(0,0,0,.06);
        }

        .main-box {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }

        /* Logo */
        .logo-box .logo a {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--text-dark);
            letter-spacing: 1px;
        }
        .logo-box .logo a span { color: var(--accent); }

        /* Nav */
        .main-menu ul {
            display: flex;
            align-items: center;
            gap: 0;
        }

        .main-menu ul li { position: relative; }

        .main-menu ul li a {
            display: block;
            padding: 24px 16px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            text-transform: uppercase;
            letter-spacing: .5px;
            transition: color .2s;
        }
        .main-menu ul li a:hover,
        .main-menu ul li.current > a { color: var(--accent); }

        /* Dropdown */
        .main-menu ul li .dropdown-menu-dec {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--white);
            min-width: 200px;
            border-top: 2px solid var(--accent);
            box-shadow: 0 8px 24px rgba(0,0,0,.1);
            z-index: 999;
            padding: 8px 0;
        }
        .main-menu ul li:hover .dropdown-menu-dec { display: block; }
        .dropdown-menu-dec li a {
            padding: 8px 20px;
            font-size: 13px;
            text-transform: none;
            letter-spacing: 0;
            border-bottom: 1px solid #f5f5f5;
        }
        .dropdown-menu-dec li a:hover {
            color: var(--accent);
            background: #fafafa;
        }

        /* Right side actions */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-actions .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: var(--text-dark);
            position: relative;
            transition: color .2s;
            display: flex;
            align-items: center;
        }
        .header-actions .action-btn:hover { color: var(--accent); }

        #cart-count-badge {
            position: absolute;
            top: -6px; right: -8px;
            background: var(--accent);
            color: #fff;
            border-radius: 50%;
            width: 16px; height: 16px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Search box */
        .search-box {
            display: flex;
            align-items: center;
            overflow: hidden;
            max-width: 0;
            transition: max-width .4s;
        }
        .search-box.active { max-width: 200px; }
        .search-box input {
            border: 1px solid var(--border);
            padding: 6px 12px;
            font-size: 13px;
            outline: none;
            font-family: 'Open Sans', sans-serif;
        }

        /* Notify */
        .header-item-notify {
            position: relative;
            cursor: pointer;
        }
        .notify-badge {
            position: absolute;
            top: -4px; right: -6px;
            background: var(--accent);
            color: #fff;
            border-radius: 50%;
            width: 16px; height: 16px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .notify-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 12px);
            right: -60px;
            width: 300px;
            background: #fff;
            border-top: 2px solid var(--accent);
            box-shadow: 0 8px 32px rgba(0,0,0,.12);
            z-index: 999;
        }
        .notify-dropdown.active { display: block; }
        .notify-header {
            background: var(--accent);
            color: #fff;
            padding: 10px 16px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        .notify-body { max-height: 260px; overflow-y: auto; }
        .notify-item {
            display: flex;
            padding: 10px 14px;
            border-bottom: 1px solid #f0f0f0;
            align-items: center;
            transition: background .15s;
        }
        .notify-item:hover { background: #fafafa; }
        .notify-item img {
            width: 44px; height: 44px;
            object-fit: cover;
            margin-right: 12px;
            border: 1px solid var(--border);
        }
        .notify-title { font-size: 12px; font-weight: 600; color: var(--text-dark); margin-bottom: 2px; }
        .notify-desc { font-size: 11px; color: var(--accent); }

        /* Toast */
        .review-toast {
            position: fixed;
            bottom: 28px; left: 28px;
            background: #fff;
            border-left: 3px solid var(--accent);
            width: 300px;
            box-shadow: 0 8px 28px rgba(0,0,0,.14);
            z-index: 9999;
            animation: slideInLeft .5s ease;
            font-family: 'Open Sans', sans-serif;
        }
        .toast-header {
            padding: 10px 14px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fafafa;
        }
        .toast-body { padding: 14px; font-size: 13px; color: var(--text-mid); line-height: 1.6; }
        .btn-close-toast {
            background: none; border: none;
            font-size: 16px; cursor: pointer;
            color: var(--text-light);
        }
        .btn-close-toast:hover { color: var(--accent); }
        .btn-view-now {
            background: var(--accent);
            color: #fff;
            border: none;
            padding: 7px 16px;
            font-size: 12px;
            cursor: pointer;
            font-weight: 600;
            margin-top: 12px;
            text-transform: uppercase;
            letter-spacing: .5px;
            transition: background .2s;
        }
        .btn-view-now:hover { background: var(--accent-dark); }

        /* Mobile toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: var(--text-dark);
        }

        @media (max-width: 991px) {
            .main-menu { display: none; }
            .mobile-toggle { display: block; }
            .top-info { display: none !important; }
        }

        @keyframes slideInLeft {
            from { transform: translateX(-110%); opacity: 0; }
            to   { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>

{{-- ── HEADER TOP ── --}}
<div class="header-top">
    <div class="auto-container">
        <div class="top-left">
            <div class="lang-dropdown">
                <button class="lang-btn">
                    🌐 &nbsp; Tiếng Việt <i class="fa fa-angle-down"></i>
                </button>
                <ul class="lang-menu">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Français</a></li>
                </ul>
            </div>
        </div>
        <div class="top-right">
            <ul class="top-info">
                <li><i class="fa fa-envelope-o"></i> NgũVịHương@5heros.vn</li>
                <li><i class="fa fa-phone"></i> Hotline: 0399 506 003</li>
                <li><i class="fa fa-clock-o"></i> T2 – T7 : 8:00 – 18:00</li>
            </ul>
            <div class="social-icon">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-tiktok"></i></a>
            </div>
        </div>
    </div>
</div>

{{-- ── MAIN HEADER ── --}}
<header class="main-header">
    <div class="main-box">
        {{-- Logo --}}
        <div class="logo-box">
            <div class="logo">
                <a href="/"><span>5</span> HEROS</a>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="main-menu">
            <ul id="navMenu">
                <li class="current"><a href="/">Trang Chủ</a></li>

                <li>
                    <a href="{{ route('sanpham') }}">Sản Phẩm <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu-dec">
                        <li><a href="#">Bắc Âu – Scandinavian</a></li>
                        <li><a href="#">Boho – Wabi-Sabi</a></li>
                        <li><a href="#">Tối Giản – Minimalist</a></li>
                        <li><a href="#">Vintage – Retro</a></li>
                    </ul>
                </li>

                <li><a href="#">Gốm &amp; Gỗ</a></li>
                <li><a href="#">Vải &amp; Mây Tre</a></li>

                <li>
                    <a href="#">Dịch Vụ <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu-dec">
                        <li><a href="{{ route('lienhe') }}">Tư Vấn Decor</a></li>
                        <li><a href="{{ route('lienhe') }}">Liên Hệ</a></li>
                    </ul>
                </li>

                @auth
                <li>
                    <a href="#">Tài Khoản <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu-dec">
                        @if(Auth::user()->role === 'admin')
                        <li><a href="{{ route('admin.dasboard') }}">Quản Trị Admin</a></li>
                        @endif
                        <li><a href="{{ route('profile.index') }}">Hồ Sơ Của Tôi</a></li>
                        <li><a href="#">Lịch Sử Đơn Hàng</a></li>
                        <li><a href="{{ route('dangxuat') }}">Đăng Xuất</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{ route('login') }}">Đăng Nhập</a></li>
                @endauth
            </ul>
        </nav>

        {{-- Actions --}}
        <div class="header-actions">
            <form action="#" method="GET" class="search-box" id="searchBox">
                <input type="text" name="keyword" placeholder="Tìm kiếm...">
                <button type="button" class="action-btn" onclick="toggleSearch()">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <a class="action-btn" href="{{ route('giohang') }}" style="position:relative;">
                <i class="fa fa-shopping-bag"></i>
                <span id="cart-count-badge" style="display:none;">0</span>
            </a>

            @auth
            <div class="action-btn header-item-notify" onclick="toggleNotify()">
                <i class="fa fa-bell-o"></i>
                @if(isset($productsToReview) && $productsToReview->count() > 0)
                    <span class="notify-badge">{{ $productsToReview->count() }}</span>
                    <div class="notify-dropdown" id="notifyDropdown">
                        <div class="notify-header">🛖 Sản phẩm chờ đánh giá</div>
                        <div class="notify-body">
                            @foreach($productsToReview as $prod)
                            <a href="{{ route('chitietsanpham', $prod->id) }}#review-section" class="notify-item">
                                <img src="{{ asset('storage/' . $prod->hinh_anh) }}" alt="">
                                <div>
                                    <div class="notify-title">{{ $prod->tensp }}</div>
                                    <div class="notify-desc">Đã giao – Đánh giá ngay!</div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            @endauth

            <button class="mobile-toggle" onclick="toggleMenu()">&#9776;</button>
        </div>
    </div>
</header>

{{-- Toast thông báo đánh giá --}}
@if(auth()->check() && isset($productsToReview) && $productsToReview->count() > 0)
<div id="review-reminder-toast" class="review-toast">
    <div class="toast-header">
        <strong style="color:var(--accent);font-size:13px;">
            <i class="fa fa-star"></i> Đánh Giá Sản Phẩm
        </strong>
        <button class="btn-close-toast" onclick="closeToast()">&times;</button>
    </div>
    <div class="toast-body">
        Bạn có <b>{{ $productsToReview->count() }}</b> sản phẩm đã nhận chưa đánh giá.
        <br><small style="color:#999">Chia sẻ cảm nhận để giúp cộng đồng nhé!</small>
        <br><button class="btn-view-now" onclick="toggleNotify()">Xem Ngay</button>
    </div>
</div>
@endif

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('{{ route("cart.count") }}')
        .then(r => r.json())
        .then(data => {
            const b = document.getElementById('cart-count-badge');
            if (data.count > 0) { b.innerText = data.count; b.style.display = 'flex'; }
        }).catch(() => {});
    setTimeout(closeToast, 15000);
});

function toggleNotify() {
    document.getElementById('notifyDropdown')?.classList.toggle('active');
}
function closeToast() {
    const t = document.getElementById('review-reminder-toast');
    if (t) t.style.display = 'none';
}
function toggleSearch() {
    document.getElementById('searchBox').classList.toggle('active');
}
function toggleMenu() {
    document.getElementById('navMenu').classList.toggle('active');
}
window.addEventListener('click', function(e) {
    const n = document.querySelector('.header-item-notify');
    if (n && !n.contains(e.target)) {
        document.getElementById('notifyDropdown')?.classList.remove('active');
    }
});
</script>