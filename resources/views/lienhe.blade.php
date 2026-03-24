<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ Hỗ Trợ - 5 Heros Decor</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/layout/lienhe.css', 'resources/js/layout/lienhe.js'])
</head>
<body style="margin: 0; padding: 0;">
@extends('layouts.navbar.header')
    <div class="contact-wrapper">
        <div class="contact-ui-wrap">
            <header class="contact-ui-top">
                <div class="contact-ui-title-group">
                   
                    <div class="contact-ui-logo" style="background: #C9623F; color: #fff;">5H</div>
                    <div class="contact-ui-heading">
                        <h1>Liên hệ</h1>
                        <p>Sẵn sàng hỗ trợ trang trí nội thất 24/7</p>
                    </div>
                </div>
                <div class="contact-ui-foot">
                    <div style="display:flex;gap:14px;align-items:center">
                        <div style="display:flex;flex-direction:column;align-items:flex-end">
                            <span style="font-weight:600;color:#eee">Giờ làm việc</span>
                            <span style="color:#9aa0a6">Thứ 2 - Thứ 7, 12:00 - 23:00</span>
                        </div>
                        <div style="width:1px;height:28px;background:rgba(255,255,255,0.03);margin-left:6px"></div>
                    </div>
                </div>
            </header>

            <section class="contact-ui-cols">
                <div class="contact-ui-card">
                    <h2 style="margin:0 0 8px 0;font-family:'Playfair Display',serif;color:#fff;font-size:24px">Gửi tin nhắn cho 5 Heros</h2>
                    <p style="color:#9aa0a6;margin:0 0 16px 0">Bạn cần tư vấn đồ decor hay không gian sống? Hãy để lại lời nhắn.</p>

                    <form id="contactForm" class="contact-ui-form" novalidate>
                        <div class="contact-ui-row">
                            <div class="contact-ui-col contact-ui-field">
                                <input id="name" name="name" type="text" placeholder=" " required />
                                <label class="contact-ui-label-float" for="name">Họ & tên</label>
                            </div>
                            <div class="contact-ui-col contact-ui-field">
                                <input id="phone" name="phone" type="text" placeholder=" " />
                                <label class="contact-ui-label-float" for="phone">Số điện thoại</label>
                            </div>
                        </div>

                        <div class="contact-ui-field">
                            <input id="email" name="email" type="email" placeholder=" " required />
                            <label class="contact-ui-label-float" for="email">Email</label>
                        </div>

                        <div class="contact-ui-field">
                            <textarea id="message" name="message" placeholder=" " required></textarea>
                            <label class="contact-ui-label-float" for="message">Nội dung tư vấn...</label>
                        </div>

                        <div class="contact-ui-meta">
                            <div class="contact-ui-hint">Phản hồi trong 24h.</div>
                            <div style="display:flex;gap:8px;align-items:center">
                                <button type="button" class="contact-ui-btn" id="clearBtn">Xóa</button>
                                <button type="submit" class="contact-ui-btn primary" id="submitBtn" style="background:#C9623F;">Gửi liên hệ</button>
                            </div>
                        </div>
                    </form>
                </div>

                <aside class="contact-ui-side">
                    <div class="contact-ui-map-wrap">
                        <div class="contact-ui-map-actions">
                            <button class="contact-ui-chip" id="openMap">Xem lớn</button>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124671.30058814792!2d107.9554030638708!3d12.678739775073172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f7d6a5933399%3A0x7d6b8f108f9d0c!2zVHAuIEJ1w7RuIE1hIFRodeG7mXQsIMSQ4bqvayBM4bqvaywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1711200000000!5m2!1svi!2s" loading="lazy" style="border:0;" allowfullscreen=""></iframe>
                    </div>

                    <div class="contact-ui-card contact-ui-info">
                        <div class="contact-ui-info-item">
                            <div class="contact-ui-icon"><i class="fa-solid fa-location-dot"></i></div>
                            <div class="contact-ui-content">
                                <span class="contact-ui-label">Showroom Decor</span>
                                <span class="contact-ui-value">TP. Buôn Ma Thuột, Đắk Lắk</span>
                            </div>
                        </div>
                        <div class="contact-ui-info-item">
                            <div class="contact-ui-icon"><i class="fa-solid fa-phone"></i></div>
                            <div class="contact-ui-content">
                                <span class="contact-ui-label">Hotline tư vấn</span>
                                <span class="contact-ui-value" id="phoneText">0399506003</span>
                            </div>
                        </div>
                        <div class="contact-ui-info-item">
                            <div class="contact-ui-icon"><i class="fa-solid fa-envelope"></i></div>
                            <div class="contact-ui-content">
                                <span class="contact-ui-label">Email</span>
                                <span class="contact-ui-value" id="emailText">NgũVịHương@5heros.vn</span>
                            </div>
                        </div>
                    </div>

                    <div class="contact-ui-foot">
                        <div>© <strong>5 Heros Decor</strong></div>
                        <div class="contact-ui-socials">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                        </div>
                    </div>
                </aside>
            </section>
        </div>
        
        <div class="contact-ui-modal" id="mapModal">
            <div class="contact-ui-modal-card">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124671.30058814792!2d107.9554030638708!3d12.678739775073172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f7d6a5933399%3A0x7d6b8f108f9d0c!2zVHAuIEJ1w7RuIE1hIFRodeG7mXQsIMSQ4bqvayBM4bqvaywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1711200000000!5m2!1svi!2s" style="width:100%;height:100%;border:0" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <button class="contact-ui-close-btn" id="closeMap">Đóng</button>
        </div>

        <div class="contact-ui-snack" id="snack">Thông báo</div>
    </div>
    @extends('layouts.navbar.footer')
</body>
</html>