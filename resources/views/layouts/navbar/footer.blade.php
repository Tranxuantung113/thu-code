{{-- resources/views/layout/footer.blade.php --}}

<style>
    /* ── FOOTER ── */
    .main-footer {
        background: #1a1a1a url('{{ asset("storage/images/footer-bg.jpg") }}') center/cover no-repeat;
        color: #aaaaaa;
        font-size: 13px;
        padding-top: 70px;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1.5fr;
        gap: 40px;
        margin-bottom: 50px;
    }

    /* Brand column */
    .footer-logo {
        margin-bottom: 18px;
    }
    .footer-logo a {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 700;
        color: #fff;
        letter-spacing: 1px;
    }
    .footer-logo a span { color: var(--accent); }

    .footer-desc {
        line-height: 1.8;
        color: #888;
        margin-bottom: 22px;
    }

    .footer-contact-info {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .footer-contact-info li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #888;
    }
    .footer-contact-info li i { color: var(--accent); margin-top: 2px; flex-shrink: 0; }

    /* Footer columns */
    .footer-widget h2 {
        font-family: 'Playfair Display', serif;
        font-size: 17px;
        color: #fff;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid rgba(255,255,255,.08);
        position: relative;
    }
    .footer-widget h2::after {
        content: '';
        position: absolute;
        bottom: -1px; left: 0;
        width: 40px; height: 2px;
        background: var(--accent);
    }

    /* Tags */
    .tags-list { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 4px; }
    .tags-list a {
        display: inline-block;
        padding: 5px 12px;
        border: 1px solid rgba(255,255,255,.12);
        color: #999;
        font-size: 12px;
        transition: all .2s;
        text-decoration: none;
    }
    .tags-list a:hover {
        background: var(--accent);
        border-color: var(--accent);
        color: #fff;
    }

    /* Recent Works gallery thumbs */
    .gallery-widget { margin-top: 28px; }
    .gallery-thumbs { display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px; margin-top: 4px; }
    .gallery-thumb { position: relative; aspect-ratio: 1; overflow: hidden; }
    .gallery-thumb img { width: 100%; height: 100%; object-fit: cover; filter: brightness(.7); transition: filter .2s; }
    .gallery-thumb:hover img { filter: brightness(1); }
    .gallery-thumb .thumb-link {
        position: absolute; inset: 0;
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 14px; opacity: 0;
        transition: opacity .2s;
    }
    .gallery-thumb:hover .thumb-link { opacity: 1; }

    /* Recent Posts */
    .posts-widget .post {
        display: flex;
        gap: 12px;
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .posts-widget .post:last-child { border-bottom: none; margin-bottom: 0; }
    .post-thumb-img {
        width: 62px; height: 62px;
        object-fit: cover;
        flex-shrink: 0;
        border: 1px solid rgba(255,255,255,.1);
    }
    .post-desc a {
        display: block;
        font-size: 12px;
        color: #aaa;
        line-height: 1.5;
        margin-bottom: 5px;
        text-decoration: none;
        transition: color .2s;
    }
    .post-desc a:hover { color: var(--accent); }
    .post-time { font-size: 11px; color: #666; display: flex; align-items: center; gap: 5px; }
    .post-time i { color: var(--accent); }

    .view-more-btn {
        display: inline-block;
        margin-top: 16px;
        font-size: 12px;
        color: var(--accent);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        text-decoration: none;
    }
    .view-more-btn:hover { color: #fff; }

    /* Send Message Form */
    .contact-widget .nl-form { display: flex; flex-direction: column; gap: 10px; margin-top: 4px; }
    .contact-widget input,
    .contact-widget textarea {
        width: 100%;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        padding: 10px 14px;
        color: #ccc;
        font-size: 12px;
        font-family: 'Open Sans', sans-serif;
        outline: none;
        transition: border-color .2s;
    }
    .contact-widget input:focus,
    .contact-widget textarea:focus { border-color: var(--accent); }
    .contact-widget textarea { height: 80px; resize: none; }
    .contact-widget button {
        background: var(--accent);
        color: #fff;
        border: none;
        padding: 10px 22px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .8px;
        cursor: pointer;
        font-family: 'Open Sans', sans-serif;
        align-self: flex-start;
        transition: background .2s;
    }
    .contact-widget button:hover { background: var(--accent-dark); }

    /* Social links */
    .footer-social { display: flex; gap: 8px; margin-top: 20px; }
    .footer-social a {
        width: 34px; height: 34px;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.1);
        display: flex; align-items: center; justify-content: center;
        color: #888;
        font-size: 14px;
        transition: all .2s;
    }
    .footer-social a:hover {
        background: var(--accent);
        border-color: var(--accent);
        color: #fff;
    }

    /* Footer Bottom */
    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,.08);
        padding: 20px 0;
    }
    .footer-bottom-inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }
    .copyright { font-size: 12px; color: #666; }
    .copyright a { color: var(--accent); }
    .copyright a:hover { color: #fff; }

    .footer-nav { display: flex; gap: 0; }
    .footer-nav li a {
        padding: 4px 14px;
        font-size: 12px;
        color: #777;
        border-right: 1px solid rgba(255,255,255,.1);
        transition: color .2s;
        text-decoration: none;
    }
    .footer-nav li:last-child a { border-right: none; }
    .footer-nav li a:hover { color: var(--accent); }

    .payment-methods {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        color: #666;
    }
    .payment-icon {
        background: rgba(255,255,255,.08);
        color: #aaa;
        font-size: 10px;
        font-weight: 700;
        padding: 4px 8px;
        border: 1px solid rgba(255,255,255,.1);
        letter-spacing: .3px;
    }

    /* Scroll to top */
    .scroll-to-top {
        position: fixed;
        bottom: 90px; right: 28px;
        width: 40px; height: 40px;
        background: var(--accent);
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all .3s;
        z-index: 400;
        border: none;
    }
    .scroll-to-top.visible { opacity: 1; visibility: visible; }
    .scroll-to-top:hover { background: var(--accent-dark); }

    @media (max-width: 991px) {
        .footer-grid { grid-template-columns: 1fr 1fr; }
        .footer-bottom-inner { flex-direction: column; text-align: center; }
        .footer-nav { justify-content: center; }
    }
    @media (max-width: 600px) {
        .footer-grid { grid-template-columns: 1fr; gap: 30px; }
    }
</style>

<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-grid">

            {{-- ── Brand Column ── --}}
            <div class="footer-widget">
                <div class="footer-logo">
                    <a href="/"><span>5</span> HEROS DECOR</a>
                </div>
                <p class="footer-desc">
                    Biến không gian sống của bạn thành tuyệt phẩm nghệ thuật. Chúng tôi mang đến những món đồ decor tinh tế, kết hợp hài hòa giữa vẻ đẹp tự nhiên và phong cách sống hiện đại Việt Nam.
                </p>
                <ul class="footer-contact-info">
                    <li><i class="fa fa-map-marker"></i> 123 Đường ABC, Buôn Ma Thuột, Đắk Lắk</li>
                    <li><i class="fa fa-phone"></i> 0399 506 003</li>
                    <li><i class="fa fa-envelope-o"></i> NgũVịHương@5heros.vn</li>
                </ul>
                <div class="footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>

            {{-- ── Tags + Gallery Column ── --}}
            <div>
                <div class="footer-widget tags-widget">
                    <h2>Từ Khóa Phổ Biến</h2>
                    <ul class="tags-list">
                        <li><a href="#">Decor</a></li>
                        <li><a href="#">Gốm Sứ</a></li>
                        <li><a href="#">Nội Thất</a></li>
                        <li><a href="#">Rèm Cửa</a></li>
                        <li><a href="#">Cây Cảnh</a></li>
                        <li><a href="#">Boho</a></li>
                        <li><a href="#">Minimalist</a></li>
                    </ul>
                </div>
                <div class="footer-widget gallery-widget" style="margin-top:28px;">
                    <h2>Công Trình Gần Đây</h2>
                    <div class="gallery-thumbs">
                        @foreach(['img1','img2','img3','img1','img2','img3','img1','img2'] as $img)
                        <div class="gallery-thumb">
                            <img src="{{ asset('storage/images/' . $img . '.webp') }}" alt="gallery"
                                 onerror="this.src='https://placehold.co/80x80/2a2a2a/666?text=D'">
                            <a href="#" class="thumb-link"><i class="fa fa-link"></i></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ── Recent Posts Column ── --}}
            <div class="footer-widget posts-widget">
                <h2>Tin Tức Mới Nhất</h2>
                <div class="posts">
                    @php
                    $fp = [
                        ['title'=>'5 Xu Hướng Decor Nổi Bật Năm 2025','date'=>'20 tháng 3, 2025'],
                        ['title'=>'Cách Phối Màu Theo Phong Cách Wabi-Sabi','date'=>'15 tháng 3, 2025'],
                        ['title'=>'Chọn Cây Xanh Phù Hợp Không Gian Sống','date'=>'10 tháng 3, 2025'],
                    ];
                    @endphp
                    @foreach($fp as $post)
                    <div class="post">
                        <img class="post-thumb-img"
                             src="https://placehold.co/62x62/2a2a2a/666?text=N"
                             alt="post">
                        <div class="post-desc">
                            <a href="#">{{ $post['title'] }}</a>
                            <div class="post-time"><i class="fa fa-clock-o"></i> {{ $post['date'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="#" class="view-more-btn">Đọc Thêm <i class="fa fa-caret-right"></i></a>
            </div>

            {{-- ── Contact Form Column ── --}}
            <div class="footer-widget contact-widget">
                <h2>Gửi Tin Nhắn</h2>
                <div class="nl-form">
                    <form method="post" action="{{ route('lienhe') }}">
                        @csrf
                        <div style="display:flex;flex-direction:column;gap:10px;">
                            <input type="text" name="name" placeholder="Họ &amp; Tên" required>
                            <input type="email" name="email" placeholder="Email *" required>
                            <textarea name="message" placeholder="Nội dung tin nhắn *" required></textarea>
                            <button type="submit">Gửi Tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="footer-bottom">
        <div class="footer-container">
            <div class="footer-bottom-inner">
                <div class="copyright">
                    &copy; {{ date('Y') }} <a href="/">5 Heros Decor</a>. All rights reserved. |
                    <a href="#">Chính Sách Bảo Mật</a> |
                    <a href="#">Điều Khoản Dịch Vụ</a>
                </div>
                <ul class="footer-nav">
                    <li><a href="/">Trang Chủ</a></li>
                    <li><a href="{{ route('sanpham') }}">Sản Phẩm</a></li>
                    <li><a href="#">Dịch Vụ</a></li>
                    <li><a href="{{ route('lienhe') }}">Liên Hệ</a></li>
                </ul>
                <div class="payment-methods">
                    <span>Thanh toán:</span>
                    <div class="payment-icon">VISA</div>
                    <div class="payment-icon">VNPAY</div>
                    <div class="payment-icon">MOMO</div>
                    <div class="payment-icon">COD</div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Scroll to top button --}}
<button class="scroll-to-top" id="scrollTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
    <i class="fa fa-long-arrow-up"></i>
</button>

<script>
window.addEventListener('scroll', function() {
    const btn = document.getElementById('scrollTop');
    if (window.scrollY > 400) btn.classList.add('visible');
    else btn.classList.remove('visible');
});
</script>