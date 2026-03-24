<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bộ Sưu Tập Đồ Decor Cao Cấp - 5 Heros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Load file CSS --}}
    @vite(['resources/css/layout/sanpham.css'])
    
    <style>
        /* Tùy chỉnh phân trang Laravel cho hợp style Decor */
        .decor-pagination-wrapper nav { display: flex; justify-content: center; gap: 8px; margin-top: 40px; }
        .decor-pagination-wrapper svg { width: 20px; }
        .decor-pagination-wrapper .relative.z-0.inline-flex.rounded-md.shadow-sm { box-shadow: none; display: flex; gap: 8px; }
        .decor-pagination-wrapper span.relative.inline-flex.items-center,
        .decor-pagination-wrapper a.relative.inline-flex.items-center {
            padding: 8px 16px; border-radius: 8px; border: 1px solid #E8E1DA; background: #fff; color: #3D352E; font-weight: 500; transition: 0.2s; text-decoration: none;
        }
        .decor-pagination-wrapper a.relative.inline-flex.items-center:hover { border-color: #C98A53; color: #C98A53; }
        .decor-pagination-wrapper span[aria-current="page"] span { background: #C98A53; color: #fff; border-color: #C98A53; }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #FDFBFA;">

    @include('layouts.navbar.header')

    <div class="decor-main-container">
        
        <div class="decor-page-header">
            <h1 class="page-title">Sản Phẩm Trang Trí</h1>
            <p class="page-subtitle">Khám phá bộ sưu tập nội thất và đồ trang trí tinh tế nhất cho không gian của bạn.</p>
        </div>

        <button class="decor-mobile-filter-toggle"><i class="fas fa-filter"></i> Bộ Lọc</button>

        <div class="decor-content-wrapper">
            <aside class="decor-filter-sidebar" id="decorFilterSidebar">
                <div class="filter-header">
                    <h3 class="filter-title"><i class="fas fa-sliders-h"></i> Bộ Lọc</h3>
                    <button class="clear-button">Xóa Lọc</button>
                </div>
                
                <div class="filter-section">
                    <h4>Danh Mục</h4>
                    <ul class="filter-list">
                        <li><label><input type="checkbox" class="decor-checkbox"> Tranh & Gương</label></li>
                        <li><label><input type="checkbox" class="decor-checkbox"> Bình Hoa & Gốm</label></li>
                        <li><label><input type="checkbox" class="decor-checkbox"> Đèn Trang Trí</label></li>
                        <li><label><input type="checkbox" class="decor-checkbox"> Tượng Nghệ Thuật</label></li>
                    </ul>
                </div>

                <div class="filter-section">
                    <h4>Mức Giá</h4>
                    <ul class="filter-list">
                        <li><label><input type="checkbox" class="decor-checkbox"> Dưới 500.000đ</label></li>
                        <li><label><input type="checkbox" class="decor-checkbox"> 500.000đ - 1.000.000đ</label></li>
                        <li><label><input type="checkbox" class="decor-checkbox"> Trên 1.000.000đ</label></li>
                    </ul>
                </div>
            </aside>

            <main class="decor-products-section">
                
                <div class="products-controls">
                    <span class="products-count">
                        Hiển thị <strong>{{ $products->firstItem() }} - {{ $products->lastItem() }}</strong> trên tổng <strong>{{ $products->total() }}</strong> sản phẩm
                    </span>
                    <div class="sort-box">
                        <label for="sortSelect">Sắp xếp:</label>
                        <select class="sort-select" id="sortSelect">
                            <option value="default">Mới nhất</option>
                            <option value="price-low">Giá: Thấp đến Cao</option>
                            <option value="price-high">Giá: Cao đến Thấp</option>
                            <option value="name-asc">Tên: A-Z</option>
                        </select>
                    </div>
                </div>

                <div class="products-grid">
                    @if($products->count() > 0)
                        @foreach($products as $product)
                            <div class="product-card">
                                
                                @if($product->created_at > now()->subDays(7))
                                    <span class="product-badge badge-new">MỚI</span>
                                @endif
                                @if($product->so_luong == 0)
                                    <span class="product-badge badge-out">HẾT HÀNG</span>
                                @endif

                                <a href="{{ route('chitietsanpham', ['id' => $product->id]) }}" class="product-image-wrapper">
                                    <img src="{{ asset('storage/' . $product->hinh_anh) }}" 
                                         alt="{{ $product->tensp }}" 
                                         class="product-image"
                                         onerror="this.src='https://placehold.co/300x300?text=Decor+Image'">
                                    
                                    <div class="hover-actions">
                                        <button class="action-btn" title="Yêu thích"><i class="far fa-heart"></i></button>
                                        <button class="action-btn" title="Thêm vào giỏ"><i class="fas fa-cart-plus"></i></button>
                                    </div>
                                </a>

                                <div class="product-info">
                                    <div class="product-brand">
                                        {{ $product->brand ? $product->brand->ten_thuonghieu : '5 Heros Decor' }}
                                    </div>

                                    <h3 class="product-name">
                                        <a href="{{ route('chitietsanpham', ['id' => $product->id]) }}">{{ $product->tensp }}</a>
                                    </h3>

                                    <div class="product-specs">
                                        <span title="Kho hàng"><i class="fas fa-box"></i> {{ $product->so_luong }}</span>
                                        <span title="Danh mục"><i class="fas fa-tag"></i> {{ $product->category ? $product->category->ten_danhmuc : 'Trang trí' }}</span>
                                    </div>

                                    <div class="product-bottom">
                                        <span class="product-price">{{ number_format($product->gia, 0, ',', '.') }} ₫</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-couch"></i>
                            <h3>Chưa có sản phẩm nào</h3>
                            <p>Vui lòng thử lại với bộ lọc khác hoặc quay lại sau.</p>
                        </div>
                    @endif
                </div>

                {{-- PHÂN TRANG --}}
                <div class="decor-pagination-wrapper">
                    {{ $products->links() }} 
                </div>

            </main>
        </div>
    </div>

    @include('layouts.navbar.footer')
</body>
</html>