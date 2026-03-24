<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 Heros Admin Dashboard</title>
    @vite(['resources/css/admin/admindasboard.css', 'resources/js/admin/dasboard.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="dashboard-container">
        <div class="sidebar" id="sidebar">
            <div class="logo-container">
                <a href="{{ route('admin.dasboard') }}" class="logo">
                    <i class="fas fa-cube"></i>
                    <span>5 Heros</span>
                </a>
            </div>

            <nav>
                <a href="{{ route('admin.dasboard') }}" class="nav-item {{ request()->routeIs('admin.dasboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Trang Chủ</span>
                </a>
                
                <div class="nav-item">
                    <i class="fas fa-shopping-bag"></i>
                    <span onclick="toggleBanner()">Giỏ hàng</span>
                    <div id="banner-content" style="display: none;"></div>
                </div>

                <div class="nav-item" onclick="toggleSubMenu(this)">
                    <i class="fas fa-database"></i>
                    <span>Quản lý dữ liệu</span>
                    <i class="fas fa-chevron-down nav-arrow"></i>
                </div>
                <div class="sub-nav-container" style="display: none;">
                    <a href="{{ route('admin.category.index') }}" class="nav-item sub-nav-item">
                        <i class="fas fa-folder-open"></i> Danh mục
                    </a>
                    <a href="{{ route('admin.product.index') }}" class="nav-item sub-nav-item">
                        <i class="fas fa-box"></i> Sản phẩm
                    </a>
                    <a href="{{ route('admin.brand.index') }}" class="nav-item sub-nav-item">
                        <i class="fas fa-copyright"></i> Thương hiệu
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="nav-item sub-nav-item">
                        <i class="fas fa-users"></i> Người dùng
                    </a>
                    <a href="{{ route('admin.admin.banner') }}" class="nav-item sub-nav-item">
                        <i class="fas fa-image"></i> Banner
                    </a>
                    <a href="{{ route('admin.voucher.index') }}" class="nav-item sub-nav-item">
                        <i class="fas fa-ticket-alt"></i> Voucher
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="nav-item sub-nav-item">
                        <i class="fas fa-file-invoice-dollar"></i> Hóa đơn
                    </a>
                </div>

                <div class="nav-item">
                    <i class="fas fa-chart-pie"></i>
                    <span>Thống Kê</span>
                </div>
                <a href="{{ route('admin.inventory.index') }}" class="nav-item">
                    <i class="fas fa-warehouse"></i>
                    <span>Kho hàng</span>
                </a>
                <a href="{{ route('admin.reviews.index') }}" class="nav-item {{ request()->routeIs('admin.reviews.index') ? 'active' : '' }}">
                    <i class="fas fa-star"></i>
                    <span>Đánh Giá</span>
                </a>
                <div class="nav-item">
                    <i class="fas fa-cog"></i>
                    <span>Cài Đặt</span>
                </div>
            </nav>
        </div>

        <div class="main-content">
            <div class="top-bar">
                <div style="display: flex; align-items: center; gap: 1rem; flex: 1;">
                    <input type="text" class="search-bar" placeholder="Tìm kiếm nhanh...">
                </div>

                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div class="dropdown-container">
                        <div class="icon-btn">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">12</span>
                        </div>
                        <div class="dropdown-menu">
                            <div class="dropdown-header">Thông Báo (12)</div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-info-circle"></i>
                                <div>Có đơn hàng mới #847</div>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown-container">
                        <div class="user-profile" id="profileToggle">
                            <div class="avatar" style="overflow: hidden;">
                                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=4F46E5&color=fff' }}"
                                    alt="Avatar"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <div style="font-weight: 600; color: #0F172A;">{{ Auth::user()->name}}</div>
                                <div style="font-size: 0.8rem; color: #64748B;">{{ Auth::user()->role}} </div>
                            </div>
                            <i class="fas fa-chevron-down" style="color: #64748B;"></i>
                        </div>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="fas fa-user"></i> Hồ Sơ Của Tôi</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-cog"></i> Cài Đặt</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" style="color: #EF4444;"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function toggleSubMenu(navItem) {
                    const subMenu = navItem.nextElementSibling;
                    const arrow = navItem.querySelector('.nav-arrow');

                    if (subMenu && subMenu.classList.contains('sub-nav-container')) {
                        if (subMenu.style.display === "none" || subMenu.style.display === "") {
                            subMenu.style.display = "block";
                            navItem.classList.add('active'); 
                            if (arrow) arrow.style.transform = "rotate(180deg)"; 
                        } else {
                            subMenu.style.display = "none";
                            navItem.classList.remove('active'); 
                            if (arrow) arrow.style.transform = "rotate(0deg)"; 
                        }
                    }
                }

                function toggleBanner() {
                    var bannerContent = document.getElementById('banner-content');
                    bannerContent.style.display = (bannerContent.style.display === 'none') ? 'block' : 'none';
                }
            </script>
</body>