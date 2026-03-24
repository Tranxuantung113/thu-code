<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng #{{ $order->id }} | 5 Heros Decor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        :root {
            --clx-bg-page: #FDFBFA;
            --clx-bg-card: #FFFFFF;
            --clx-primary: #C98A53;
            --clx-text-main: #3D352E;
            --clx-text-muted: #82756A;
            --clx-border: #E8E1DA;
            --clx-shadow: 0 10px 30px rgba(0,0,0,0.03);
            --clx-font-heading: 'Playfair Display', serif;
            --clx-font-body: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            font-family: var(--clx-font-body);
            background-color: var(--clx-bg-page);
            color: var(--clx-text-main);
            margin: 0;
            padding: 0;
        }
       
        .container-detail { 
            max-width: 1000px; 
            margin: 40px auto 80px; 
            padding: 0 20px; 
        }
        
        /* Card */
        .order-card { 
            background: var(--clx-bg-card); 
            border: 1px solid var(--clx-border); 
            border-radius: 16px; 
            padding: 40px; 
            box-shadow: var(--clx-shadow);
        }
        
        .section-header { 
            display: flex; justify-content: space-between; align-items: center; 
            border-bottom: 1px solid var(--clx-border); 
            padding-bottom: 20px; margin-bottom: 30px; 
        }
        
        .order-id { 
            font-family: var(--clx-font-heading); 
            font-size: 26px; 
            color: var(--clx-text-main); 
            margin: 0 0 5px; 
            font-weight: 700;
        }
        
        .order-date { color: var(--clx-text-muted); font-size: 0.9rem; }
        
        .status-badge {
            padding: 6px 16px; 
            background: #FDF8F3; 
            color: var(--clx-primary); 
            border: 1px solid var(--clx-primary); 
            border-radius: 8px; 
            font-size: 13px; 
            font-weight: 600; 
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-back { 
            color: var(--clx-text-muted); 
            text-decoration: none; 
            font-size: 0.95rem; 
            font-weight: 500;
            transition: 0.2s; 
            display: inline-block;
            margin-bottom: 20px;
        }
        .btn-back:hover { color: var(--clx-primary); transform: translateX(-3px); }

        /* Tracking Timeline */
        .tracking-wrap { padding: 20px 0; margin-bottom: 40px; }
        .step-wizard { display: flex; justify-content: space-between; position: relative; }
        .step-wizard::before { 
            content: ''; position: absolute; top: 18px; left: 0; 
            width: 100%; height: 2px; background: var(--clx-border); z-index: 0; 
        }
        .step-item { position: relative; z-index: 1; text-align: center; flex: 1; }
        .step-circle { 
            width: 38px; height: 38px; background: var(--clx-bg-card); border-radius: 50%; 
            margin: 0 auto 10px; display: flex; align-items: center; justify-content: center; 
            color: var(--clx-text-muted); font-size: 14px; border: 2px solid var(--clx-border); 
            transition: 0.3s; font-weight: 600;
        }
        .step-text { font-size: 12px; color: var(--clx-text-muted); text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px; }
        
        /* Active State */
        .step-item.active .step-circle { background: var(--clx-primary); border-color: var(--clx-primary); color: #fff; box-shadow: 0 4px 10px rgba(201,138,83,0.3); }
        .step-item.active .step-text { color: var(--clx-primary); }
        /* Completed State (đã qua) */
        .step-item.completed .step-circle { background: #FDF8F3; border-color: var(--clx-primary); color: var(--clx-primary); }
        .step-item.completed .step-text { color: var(--clx-text-main); }

        /* Info Grid */
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 40px; }
        .info-box { background: #FDFBFA; padding: 25px; border-radius: 12px; border: 1px solid var(--clx-border); }
        .info-box h4 { color: var(--clx-text-main); font-size: 15px; margin: 0 0 15px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 700; border-bottom: 1px solid var(--clx-border); padding-bottom: 10px;}
        .info-text { color: var(--clx-text-muted); font-size: 0.95rem; line-height: 1.8; }
        .info-text strong { color: var(--clx-text-main); font-weight: 600;}

        /* Product List */
        .product-list { width: 100%; border-collapse: collapse; }
        .product-list th { text-align: left; padding: 15px 0; border-bottom: 2px solid var(--clx-border); color: var(--clx-text-muted); font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; }
        .product-list td { padding: 20px 0; border-bottom: 1px solid var(--clx-border); vertical-align: middle; color: var(--clx-text-main); }
        .prod-img { width: 70px; height: 70px; object-fit: cover; border-radius: 8px; border: 1px solid var(--clx-border); margin-right: 15px; }
        .prod-info { display: flex; align-items: center; }
        .prod-name { color: var(--clx-text-main); font-weight: 600; font-size: 15px; display: block; margin-bottom: 4px; }
        .prod-meta { color: var(--clx-text-muted); font-size: 13px; }

        /* Total */
        .total-section { display: flex; justify-content: flex-end; padding-top: 30px; }
        .total-box { width: 320px; background: #FDFBFA; padding: 25px; border-radius: 12px; border: 1px solid var(--clx-border); }
        .total-row { display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 0.95rem; color: var(--clx-text-muted); }
        .total-row span:last-child { color: var(--clx-text-main); font-weight: 500; }
        
        .total-row.final { border-top: 1px solid var(--clx-border); padding-top: 15px; margin-top: 15px; margin-bottom: 0; }
        .total-row.final span:first-child { color: var(--clx-text-main); font-weight: 700; font-size: 16px; }
        .total-row.final span:last-child { color: var(--clx-primary); font-size: 22px; font-weight: 700; font-family: var(--clx-font-heading); }

        @media (max-width: 768px) {
            .info-grid { grid-template-columns: 1fr; gap: 20px; }
            .step-text { font-size: 10px; }
            .total-section { justify-content: center; }
            .total-box { width: 100%; }
        }
    </style>
</head>
<body>
    @include('layouts.navbar.header')

    <div class="container-detail">
        <a href="{{ route('profile.index') }}" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Quay lại hồ sơ</a>

        <div class="order-card">
            <div class="section-header">
                <div>
                    <h1 class="order-id">Đơn hàng #{{ $order->id }}</h1>
                    <span class="order-date">Ngày đặt: {{ $order->created_at->format('H:i d/m/Y') }}</span>
                </div>
                <span class="status-badge">
                    {{ $order->status }}
                </span>
            </div>

            <div class="tracking-wrap">
                <div class="step-wizard">
                    {{-- Logic hiển thị trạng thái active dựa trên status đơn hàng --}}
                    @php
                        $status = $order->status; // pending, processing, shipping, completed, cancelled
                        $steps = ['pending', 'processing', 'shipping', 'completed'];
                        $labels = ['Chờ Duyệt', 'Đang Xử Lý', 'Đang Giao', 'Hoàn Thành'];
                        $currentIndex = array_search($status, $steps);
                        if ($status == 'cancelled') $currentIndex = -1;
                    @endphp

                    @foreach($steps as $index => $step)
                        <div class="step-item {{ $index <= $currentIndex ? ($index == $currentIndex ? 'active' : 'completed') : '' }}">
                            <div class="step-circle">
                                @if($index < $currentIndex) <i class="fa-solid fa-check"></i> 
                                @else {{ $index + 1 }} @endif
                            </div>
                            <div class="step-text">{{ $labels[$index] }}</div>
                        </div>
                    @endforeach
                </div>
                @if($status == 'cancelled')
                    <div style="text-align: center; color: #ef4444; margin-top: 30px; font-weight: bold; background: #fef2f2; padding: 10px; border-radius: 8px;">ĐƠN HÀNG ĐÃ BỊ HỦY</div>
                @endif
            </div>

            <div class="info-grid">
                <div class="info-box">
                    <h4>Thông tin nhận hàng</h4>
                    <div class="info-text">
                        <strong>{{ $order->name ?? $order->user->name }}</strong><br>
                        SĐT: {{ $order->phone ?? $order->user->phone }}<br>
                        Đ/c: {{ $order->address ?? $order->user->address }}
                    </div>
                </div>
                <div class="info-box">
                    <h4>Thông tin thanh toán</h4>
                    <div class="info-text">
                        Phương thức: <strong>{{ strtoupper($order->payment_method) }}</strong><br>
                        Trạng thái: <strong>{{ $order->status == 'completed' ? 'Đã thanh toán' : 'Chưa thanh toán / Thanh toán khi nhận hàng' }}</strong>
                    </div>
                </div>
            </div>

            <table class="product-list">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>SL</th>
                        <th style="text-align: right;">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>
                            <div class="prod-info">
                                <img src="{{ $item->product ? asset('storage/'.$item->product->hinh_anh) : 'https://placehold.co/70' }}" class="prod-img">
                                <div>
                                    <span class="prod-name">{{ $item->product_name ?? 'Sản phẩm Decor' }}</span>
                                    <span class="prod-meta">Mã SP: {{ $item->product->sku ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ number_format($item->price) }}₫</td>
                        <td>x{{ $item->quantity }}</td>
                        <td style="text-align: right; font-weight: 600;">{{ number_format($item->price * $item->quantity) }}₫</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-section">
                <div class="total-box">
                    <div class="total-row">
                        <span>Tạm tính:</span>
                        <span>{{ number_format($order->total_price) }}₫</span>
                    </div>
                    <div class="total-row">
                        <span>Phí vận chuyển:</span>
                        <span>Miễn phí</span>
                    </div>
                    <div class="total-row final">
                        <span>TỔNG CỘNG:</span>
                        <span>{{ number_format($order->total_price) }}₫</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('layouts.navbar.footer')
</body>
</html>