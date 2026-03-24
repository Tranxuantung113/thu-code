<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Của Tôi - 5 Heros Decor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        :root {
            /* Palette Decor */
            --clx-bg-page: #FDFBFA;
            --clx-bg-card: #FFFFFF;
            --clx-primary: #C98A53; /* Vàng đồng */
            --clx-primary-dark: #B07644;
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
        }

        .decor-profile-wrapper {
            max-width: 1200px;
            margin: 40px auto 80px;
            padding: 0 20px;
            display: flex;
            gap: 30px;
            align-items: flex-start;
        }

        /* ================= SIDEBAR ================= */
        .profile-sidebar {
            width: 280px;
            background: var(--clx-bg-card);
            border-radius: 16px;
            box-shadow: var(--clx-shadow);
            border: 1px solid var(--clx-border);
            overflow: hidden;
            flex-shrink: 0;
        }

        .sidebar-user {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid var(--clx-border);
            background-color: #FAF7F2; /* Nền kem nhẹ cho phần avatar */
        }

        .sidebar-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .sidebar-name {
            font-family: var(--clx-font-heading);
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--clx-text-main);
            margin: 0 0 5px;
        }

        .sidebar-email {
            font-size: 0.85rem;
            color: var(--clx-text-muted);
        }

        .sidebar-nav {
            list-style: none;
            padding: 15px 0;
            margin: 0;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 25px;
            color: var(--clx-text-main);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .sidebar-nav li a:hover, .sidebar-nav li a.active {
            background-color: #FDF8F3;
            color: var(--clx-primary);
            border-left-color: var(--clx-primary);
        }

        .sidebar-nav li a i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        /* ================= MAIN CONTENT ================= */
        .profile-main {
            flex: 1;
            background: var(--clx-bg-card);
            border-radius: 16px;
            box-shadow: var(--clx-shadow);
            border: 1px solid var(--clx-border);
            padding: 40px;
        }

        .profile-header {
            border-bottom: 1px solid var(--clx-border);
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .profile-header h1 {
            font-family: var(--clx-font-heading);
            font-size: 2rem;
            margin: 0 0 5px;
            color: var(--clx-text-main);
        }

        .profile-header p {
            color: var(--clx-text-muted);
            margin: 0;
            font-size: 0.95rem;
        }

        .profile-form-grid {
            display: flex;
            gap: 50px;
        }

        .profile-form-left { flex: 1; }

        .profile-form-right {
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-left: 1px solid var(--clx-border);
            padding-left: 50px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .form-label {
            width: 140px;
            color: var(--clx-text-muted);
            font-weight: 500;
            font-size: 0.95rem;
            flex-shrink: 0;
        }

        .form-control {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid var(--clx-border);
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--clx-text-main);
            background-color: #FDFBFA;
            transition: 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--clx-primary);
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(201,138,83,0.1);
        }

        /* Radio Buttons */
        .gender-group {
            display: flex;
            gap: 20px;
            align-items: center;
            height: 45px;
        }

        .gender-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--clx-text-main);
        }

        .gender-label input[type="radio"] {
            accent-color: var(--clx-primary);
            width: 16px;
            height: 16px;
        }

        /* Avatar Upload Section */
        .avatar-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid var(--clx-border);
            margin-bottom: 20px;
            padding: 4px;
        }

        .btn-upload {
            background: #fff;
            border: 1px solid var(--clx-border);
            color: var(--clx-text-main);
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: 0.2s;
        }

        .btn-upload:hover {
            background: #FDF8F3;
            border-color: var(--clx-primary);
            color: var(--clx-primary);
        }

        .upload-hint {
            font-size: 0.8rem;
            color: var(--clx-text-muted);
            text-align: center;
            margin-top: 15px;
            line-height: 1.5;
        }

        /* Submit Button */
        .btn-save {
            background: linear-gradient(135deg, var(--clx-primary) 0%, var(--clx-primary-dark) 100%);
            color: #fff;
            border: none;
            padding: 12px 35px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            margin-left: 140px; /* Căn thẳng với input */
            box-shadow: 0 4px 10px rgba(201,138,83,0.3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(201,138,83,0.4);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .decor-profile-wrapper { flex-direction: column; }
            .profile-sidebar { width: 100%; }
            .profile-form-grid { flex-direction: column-reverse; gap: 30px; }
            .profile-form-right {
                width: 100%; border-left: none; border-bottom: 1px solid var(--clx-border);
                padding-left: 0; padding-bottom: 30px;
            }
            .form-label { width: 110px; }
            .btn-save { margin-left: 110px; }
        }

        @media (max-width: 576px) {
            .form-group { flex-direction: column; align-items: flex-start; gap: 8px; }
            .btn-save { margin-left: 0; width: 100%; }
        }
    </style>
</head>
<body>
    @include('layouts.navbar.header')

    <div class="decor-profile-wrapper">
        <aside class="profile-sidebar">
            <div class="sidebar-user">
                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=C98A53&color=fff' }}" alt="Avatar" class="sidebar-avatar" id="sidebar-avatar-preview">
                <h3 class="sidebar-name">{{ Auth::user()->name }}</h3>
                <div class="sidebar-email">{{ Auth::user()->email }}</div>
            </div>
            <ul class="sidebar-nav">
                <li><a href="{{ route('profile.index') }}" class="active"><i class="fa-regular fa-user"></i> Hồ sơ của tôi</a></li>
                <li><a href="#"><i class="fa-solid fa-clipboard-list"></i> Đơn hàng của tôi</a></li>
                <li><a href="{{ route('dangxuat') }}" style="color: #ef4444;"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
            </ul>
        </aside>

        <main class="profile-main">
            <div class="profile-header">
                <h1>Hồ sơ của tôi</h1>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản và tối ưu trải nghiệm mua hàng.</p>
            </div>

            @if(session('success'))
                <div style="background: #FDF8F3; color: #C98A53; padding: 14px 20px; border-radius: 8px; margin-bottom: 25px; border-left: 4px solid #C98A53; font-weight: 500;">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="profile-form-grid">
                    
                    <div class="profile-form-left">
                        <div class="form-group">
                            <label class="form-label">Tên của bạn</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled style="background: #f1f5f9; cursor: not-allowed;">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" name="phone" class="form-control" value="{{ old('phone', Auth::user()->phone) }}" placeholder="Thêm số điện thoại của bạn">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Giới tính</label>
                            <div class="gender-group">
                                <label class="gender-label">
                                    <input type="radio" name="gender" value="male" {{ Auth::user()->gender == 'male' ? 'checked' : '' }}> Nam
                                </label>
                                <label class="gender-label">
                                    <input type="radio" name="gender" value="female" {{ Auth::user()->gender == 'female' ? 'checked' : '' }}> Nữ
                                </label>
                                <label class="gender-label">
                                    <input type="radio" name="gender" value="other" {{ Auth::user()->gender == 'other' ? 'checked' : '' }}> Khác
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" name="dob" class="form-control" value="{{ old('dob', Auth::user()->dob) }}">
                        </div>

                        <button type="submit" class="btn-save">Lưu thay đổi</button>
                    </div>

                    <div class="profile-form-right">
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=C98A53&color=fff' }}" alt="Avatar Preview" class="avatar-preview" id="main-avatar-preview">
                        
                        <label for="avatar-upload" class="btn-upload">
                            Chọn Ảnh
                        </label>
                        <input type="file" id="avatar-upload" name="avatar" accept="image/jpeg, image/png, image/jpg" style="display: none;" onchange="previewImage(this)">
                        
                        <div class="upload-hint">
                            Dung lượng file tối đa 2 MB<br>
                            Định dạng: .JPEG, .PNG
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

    @include('layouts.navbar.footer')

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('main-avatar-preview').src = e.target.result;
                    document.getElementById('sidebar-avatar-preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>