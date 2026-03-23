<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 Heros Decor | Home & Living</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/layout/main.css', 'resources/js/layout/main.js', 'resources/css/layout/chatbot.css', 'resources/js/layout/chatbot.js'])
</head>

{{-- 1. BANNER CAROUSEL (GIỮ NGUYÊN) --}}
<div class="carousel">
    <div class="list">
        @foreach($banners as $banner)
        <div class="item">
            <img src="{{ asset('storage/' . $banner->hinhanh) }}" alt="{{ $banner->title }}">
            <div class="introduce">
                <div class="title">{{ $banner->title }}</div>
                <div class="topic">{{ $banner->thuonghieu }}</div>
                <div class="des">{{ $banner->mota }}</div>
                <button class="seeMore">KHÁM PHÁ NGAY &#8599;</button>
            </div>
        </div>
        @endforeach
    </div>
    <div class="arrows">
        <button id="prev">&lt;</button>
        <button id="next">&gt;</button>
        <button id="back">See All &#8599;</button>
    </div>
</div>

<div class="clx-wrapper">

    {{-- ── Thương Hiệu ── --}}
    <section id="brands" class="clx-section clx-bg-medium">
        <div class="clx-container">
            <div class="clx-text-center mb-20">
                <span class="clx-gold-text">Đối Tác Chính Hãng Decor</span>
                <h2 class="clx-heading">PHONG CÁCH & THƯƠNG HIỆU</h2>
                <div class="gold-line-center"></div>
            </div>

            <div class="clx-grid-3">
                @if(isset($brands) && count($brands) > 0)
                    @foreach($brands as $brand)
                    <div class="clx-card brand-card">
                        <div class="clx-card-img-wrapper">
                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->ten_thuonghieu }}">
                        </div>
                        <div class="clx-card-body">
                            <h3 class="clx-card-title">{{ $brand->ten_thuonghieu }}</h3>
                            <p class="clx-card-desc">Không gian sống đẳng cấp, nơi phong cách gặp gỡ sự tinh tế.</p>
                            <a href="#" class="clx-btn-link">Xem Bộ Sưu Tập <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- ── Bộ Sưu Tập ── --}}
    <section id="collection" class="clx-section clx-bg-dark">
        <div class="clx-container">
            <div class="clx-text-center mb-20">
                <p class="clx-gold-text">TUYỂN CHỌN MÙA NÀY</p>
                <h2 class="clx-heading-lg">BỘ SƯU TẬP NỔI BẬT</h2>
            </div>

            <div class="clx-showcase-row">
                <div class="clx-showcase-img">
                    <img src="{{ asset('storage/images/img1.webp') }}" alt="Decor Collection I">
                    <div class="clx-badge">New Arrival</div>
                </div>
                <div class="clx-showcase-info">
                    <p class="clx-gold-title">Phong Cách Wabi-Sabi</p>
                    <h3 class="clx-info-title">Bộ Decor Tối Giản Tự Nhiên</h3>
                    <p class="clx-info-desc">
                        Lấy cảm hứng từ triết học Nhật Bản, bộ sưu tập này tôn vinh vẻ đẹp không hoàn hảo của thiên nhiên. Gốm thủ công, gỗ tái sinh và vải lanh tạo nên không gian sống nhẹ nhàng, chữa lành.
                    </p>
                    <ul class="clx-list">
                        <li><span>✦</span> Chất liệu thủ công 100% tự nhiên</li>
                        <li><span>✦</span> Tông màu earth tone ấm áp</li>
                        <li><span>✦</span> Phù hợp phòng khách & phòng ngủ</li>
                    </ul>
                    <a href="#" class="clx-link-arrow">Khám Phá Bộ Sưu Tập <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="clx-showcase-row reverse">
                <div class="clx-showcase-img">
                    <img src="{{ asset('storage/images/img2.webp') }}" alt="Decor Collection II">
                    <div class="clx-badge-dark">Best Seller</div>
                </div>
                <div class="clx-showcase-info">
                    <p class="clx-gold-title">Phong Cách Scandinavian</p>
                    <h3 class="clx-info-title">Bộ sưu tập cuộc sống Bắc Âu</h3>
                    <p class="clx-info-desc">
                        Sự giao thoa hoàn hảo giữa chức năng và thẩm mỹ. Đường nét tối giản, màu sắc trung tính và chất liệu bền vững từ Bắc Âu mang lại cảm giác rộng rãi, thanh thoát cho mọi không gian.
                    </p>
                    <ul class="clx-list">
                        <li><span>✦</span> Gỗ sồi và tre tự nhiên</li>
                        <li><span>✦</span> Palette trắng kem & xanh sage</li>
                        <li><span>✦</span> Thiết kế đa năng, tiết kiệm không gian</li>
                    </ul>
                    <a href="#" class="clx-link-arrow">Khám Phá Bộ Sưu Tập <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- ── About ── --}}
    <section id="about" class="clx-section clx-bg-medium">
        <div class="clx-container clx-flex-center">
            <div class="clx-half">
                <h2 class="clx-heading">Triết Lý Của Chúng Tôi</h2>
                <p class="clx-quote">
                    "Ngôi nhà không chỉ là nơi để ở — đó là nơi tâm hồn bạn được bày tỏ. Mỗi góc nhỏ là một câu chuyện chờ được kể."
                </p>
                <p class="clx-desc">
                    Tại 5 Heros Decor, chúng tôi tuyển chọn những món đồ decor phản ánh sự hài hoà giữa vẻ đẹp tự nhiên và phong cách sống hiện đại — giúp bạn biến mỗi không gian thành tuyệt phẩm riêng của mình.
                </p>
                <a href="#" class="clx-link-gold">TÌM HIỂU THÊM VỀ CHÚNG TÔI &rarr;</a>
            </div>
            <div class="clx-half relative">
                <div class="clx-img-overlay"></div>
                <img src="{{ asset('storage/images/img3.webp') }}" class="clx-rounded-img" alt="Craftsmanship">
            </div>
        </div>
    </section>

    {{-- ── CTA ── --}}
    <section id="contact" class="clx-section clx-bg-dark border-top">
        <div class="clx-container text-center">
            <h3 class="clx-heading-md">Sẵn Sàng Biến Nhà Thành Tổ Ấm?</h3>
            <p class="clx-subheading">Liên hệ với chuyên gia tư vấn nội thất của chúng tôi để được hỗ trợ riêng.</p>
            <a href="#" class="clx-btn-white">YÊU CẦU TƯ VẤN MIỄN PHÍ</a>
        </div>
    </section>

</div>

{{-- 6. CHATBOT (GIỮ NGUYÊN) --}}
<div class="chatbot-container">
    <button id="toggle-chat" class="chatbot-toggle-btn">
        <i class="fa-solid fa-comment-dots" style="font-size: 24px;"></i>
    </button>

    <div id="chat-box" class="chatbot-window">
        <div class="chat-header">
            <span class="chat-title">5 HEROS AI</span>
            <span id="close-chat-mini" class="chat-close-mini">&times;</span>
        </div>
        <div id="messages" class="chat-messages">
            <div class="message bot-message">Chào bạn! 🪴 5 Heros có thể giúp gì cho bạn hôm nay?</div>
        </div>
        <div class="chat-input-area">
            <input type="text" id="user-input" class="chat-input" placeholder="Nhập câu hỏi...">
            <button id="send-btn" class="chat-send-btn"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>
</div>

<div id="chatbot-config" data-url="{{ route('chat.ai') }}" style="display: none;"></div>