<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 Heros Decor | Home & Living</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* CSS CHO THÔNG BÁO & POPUP */
        .header-item-notify {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
        }

        /* Badge số lượng trên chuông */
        .notify-badge {
            position: absolute;
            top: 0px; right: 0px;
            background: #C9623F;
            color: white;
            border-radius: 50%;
            width: 16px; height: 16px;
            font-size: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            border: 2px solid #FFFAF5;
        }

        /* Dropdown thông báo */
        .notify-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            right: -50px;
            width: 320px;
            background: #FFFAF5;
            border-radius: 12px;
            box-shadow: 0 12px 40px rgba(44,36,22,0.16);
            z-index: 1000;
            overflow: hidden;
            border: 1px solid #E8DDD3;
        }
        .notify-dropdown.active { display: block; }

        .notify-header {
            background: linear-gradient(135deg, #C9623F, #B5502E);
            padding: 12px 16px;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #fff;
            font-size: 0.88rem;
            letter-spacing: 0.5px;
        }

        .notify-body {
            max-height: 300px;
            overflow-y: auto;
            background: #FFFAF5;
        }

        .notify-item {
            display: flex;
            padding: 12px 14px;
            border-bottom: 1px solid #E8DDD3;
            text-decoration: none;
            align-items: center;
            transition: background 0.2s;
        }
        .notify-item:hover { background: #FDF8F3; }

        .notify-item img {
            width: 46px; height: 46px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 12px;
            border: 2px solid #E8DDD3;
        }
        .notify-info { flex: 1; }
        .notify-title {
            font-size: 0.82rem;
            font-weight: 700;
            color: #2C2416;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 3px;
        }
        .notify-desc { font-size: 0.72rem; color: #7B9E87; font-weight: 600; }

        /* Toast Popup góc màn hình */
        .review-toast {
            position: fixed;
            bottom: 30px; left: 30px;
            background: #FFFAF5;
            border-left: 4px solid #C9623F;
            width: 320px;
            box-shadow: 0 8px 32px rgba(44,36,22,0.18);
            border-radius: 12px;
            z-index: 9999;
            animation: slideInLeft 0.5s ease;
            font-family: 'DM Sans', sans-serif;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border-top: 1px solid #E8DDD3;
            border-right: 1px solid #E8DDD3;
            border-bottom: 1px solid #E8DDD3;
        }
        .toast-header {
            padding: 12px 16px;
            border-bottom: 1px solid #E8DDD3;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #FBF0D9;
            border-top-right-radius: 12px;
        }
        .toast-body { padding: 16px; font-size: 0.87rem; color: #6B4C2A; line-height: 1.6; }

        .btn-close-toast {
            background: none; border: none;
            font-size: 1.1rem; cursor: pointer;
            color: #A89580; line-height: 1;
            transition: color .15s;
        }
        .btn-close-toast:hover { color: #C9623F; }

        .btn-view-now {
            background: linear-gradient(135deg, #C9623F, #B5502E);
            color: #fff;
            border: none;
            padding: 7px 18px;
            border-radius: 20px;
            font-size: 0.8rem;
            cursor: pointer;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            letter-spacing: 0.3px;
            transition: all .2s;
            box-shadow: 0 4px 12px rgba(201,98,63,0.3);
        }
        .btn-view-now:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(201,98,63,0.4);
        }

        /* Badge giỏ hàng */
        #cart-count-badge {
            position: absolute;
            top: -5px; right: -5px;
            background-color: #C9623F !important;
            color: #fff !important;
            font-size: 10px;
            font-weight: bold;
            padding: 2px 5px;
            border-radius: 50%;
        }

        @keyframes slideInLeft {
            from { transform: translateX(-110%); opacity: 0; }
            to   { transform: translateX(0);     opacity: 1; }
        }
    </style>
</head>


<header class="header">
    <div class="header-top">
        <div class="header-top-content">
            <span>✉ NgũVịHương@5heros.vn</span>
            <span>🚚 MIỄN PHÍ VẬN CHUYỂN ĐƠN TRÊN 500K</span>
            <span>📞 0399506003</span>
        </div>
    </div>

    <div class="header-main">
        <div class="logo"><a href="/">5 HEROS</a></div>

        <nav>
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="{{ route('sanpham') }}" class="nav-link">
                        SẢN PHẨM
                        <span class="dropdown-arrow">▼</span>
                    </a>
                    <div class="mega-menu">
                        <div class="mega-menu-grid">
                            <div class="mega-menu-column">
                                <h4>Theo Phong Cách</h4>
                                <a href="#" class="mega-menu-item">Bắc Âu – Scandinavian</a>
                                <a href="#" class="mega-menu-item">Boho – Wabi-Sabi</a>
                                <a href="#" class="mega-menu-item">Tối Giản – Minimalist</a>
                                <a href="#" class="mega-menu-item">Vintage – Retro</a>
                            </div>
                            <div class="mega-menu-column">
                                <h4>Theo Không Gian</h4>
                                <a href="#" class="mega-menu-item">Phòng Khách</a>
                                <a href="#" class="mega-menu-item">Phòng Ngủ</a>
                                <a href="#" class="mega-menu-item">Phòng Bếp & Ăn</a>
                                <a href="#" class="mega-menu-item">Góc Làm Việc</a>
                            </div>
                            <div class="mega-menu-column">
                                <h4>Mức Giá</h4>
                                <a href="#" class="mega-menu-item">Dưới 200k</a>
                                <a href="#" class="mega-menu-item">200k – 500k</a>
                                <a href="#" class="mega-menu-item">500k – 1 triệu</a>
                                <a href="#" class="mega-menu-item">Trên 1 triệu</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Gốm & Gỗ</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Vải & Mây Tre</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Dịch Vụ
                        <span class="dropdown-arrow">▼</span>
                    </a>
                    <ul class="dropdown">
                        <li><a href="{{ route('lienhe') }}" class="dropdown-item">Tư Vấn Decor</a></li>
                        <li><a href="{{ route('lienhe') }}" class="dropdown-item">Liên hệ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="header-actions">
            <form action="#" method="GET" class="search-box" id="searchBox">
                <input type="text" name="keyword" class="search-input" placeholder="Tìm kiếm decor...">
                <button type="button" class="action-btn" onclick="toggleSearch()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <a class="action-btn" href="{{ route('giohang') }}" style="position: relative;">
                <i class="fa-solid fa-cart-shopping"></i>
                <span id="cart-count-badge" style="display: none;">0</span>
            </a>

            @auth
            <div class="action-btn header-item-notify" style="cursor: pointer;" onclick="toggleNotify()">
                <i class="fa-regular fa-bell"></i>

                @if(isset($productsToReview) && $productsToReview->count() > 0)
                    <span class="notify-badge">{{ $productsToReview->count() }}</span>

                    <div class="notify-dropdown" id="notifyDropdown">
                        <div class="notify-header">🛖 Sản phẩm chờ đánh giá</div>
                        <div class="notify-body">
                            @foreach($productsToReview as $prod)
                            <a href="{{ route('chitietsanpham', $prod->id) }}#review-section" class="notify-item">
                                <img src="{{ asset('storage/' . $prod->hinh_anh) }}" alt="img">
                                <div class="notify-info">
                                    <div class="notify-title">{{ $prod->tensp }}</div>
                                    <div class="notify-desc"><i class="fa-solid fa-check-circle"></i> Đã giao hàng. Đánh giá ngay!</div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            @else
            <button class="action-btn">
                <i class="fa-regular fa-heart"></i>
            </button>
            @endauth

            <li class="nav-item" id="logout">
                @guest
                <a href="{{ route('login') }}" class="nav-link">Đăng Nhập</a>
                @endguest
                @auth
                <a href="#" class="action-btn">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="dropdown-arrow">▼</span>
                </a>
                <ul class="dropdown">
                    @if(Auth::user()->role === 'admin')
                    <li><a href="{{ route('admin.dasboard') }}" class="dropdown-item">Quản trị admin</a></li>
                    @endif
                    <li><a href="{{ route('profile.index') }}" class="dropdown-item">Hồ sơ của tôi</a></li>
                    <li><a href="#" class="dropdown-item">Lịch sử đơn hàng</a></li>
                    <li><a href="{{ route('dangxuat') }}" class="dropdown-item">Đăng xuất</a></li>
                </ul>
                @endauth
            </li>
            <button class="mobile-toggle" onclick="toggleMenu()">☰</button>
        </div>
    </div>
</header>

@if(auth()->check() && isset($productsToReview) && $productsToReview->count() > 0)
<div id="review-reminder-toast" class="review-toast">
    <div class="toast-header">
        <strong style="color: #C9623F; font-family: 'Playfair Display', serif; font-size: 0.9rem;">
            <i class="fa-solid fa-star"></i> Đánh giá sản phẩm
        </strong>
        <button type="button" class="btn-close-toast" onclick="closeToast()">&times;</button>
    </div>
    <div class="toast-body">
        Bạn có <b style="color: #2C2416;">{{ $productsToReview->count() }}</b> sản phẩm đã nhận nhưng chưa đánh giá.
        <br><span style="font-size: 0.78rem; color: #A89580;">Chia sẻ cảm nhận để giúp cộng đồng mua sắm tốt hơn nhé!</span>
        <div style="margin-top: 15px; text-align: right;">
            <button class="btn-view-now" onclick="toggleNotify()">Xem ngay</button>
        </div>
    </div>
</div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('{{ route("cart.count") }}')
            .then(res => res.json())
            .then(data => {
                const badge = document.getElementById('cart-count-badge');
                if(data.count > 0) {
                    badge.innerText = data.count;
                    badge.style.display = 'inline-block';
                }
            })
            .catch(err => console.log('Lỗi cart count:', err));

        setTimeout(() => { closeToast(); }, 15000);
    });

    function toggleNotify() {
        const dropdown = document.getElementById('notifyDropdown');
        if (dropdown) dropdown.classList.toggle('active');
    }

    function closeToast() {
        const toast = document.getElementById('review-reminder-toast');
        if (toast) toast.style.display = 'none';
    }

    window.addEventListener('click', function(e) {
        const notifyBox = document.querySelector('.header-item-notify');
        if (notifyBox && !notifyBox.contains(e.target)) {
            const dropdown = document.getElementById('notifyDropdown');
            if (dropdown) dropdown.classList.remove('active');
        }
    });

    function toggleSearch() {
        const box = document.getElementById('searchBox');
        box.classList.toggle('active');
    }

    function toggleMenu() {
        const menu = document.getElementById('navMenu');
        menu.classList.toggle('active');
    }
</script>