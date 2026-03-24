<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm Decor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/admin/banner.css'])

    <style>
        :root {
            --decor-gold: #b45309;
            --decor-bg: #fdfbf7;
            --decor-text: #1f2937;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f3f4f6;
            color: var(--decor-text);
        }

        .card-box {
            background: #ffffff;
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border-radius: 16px;
        }

        .card-header-custom {
            background: #ffffff !important;
            border-bottom: 1px solid #f3f4f6 !important;
            padding: 20px !important;
            border-radius: 16px 16px 0 0 !important;
        }

        .card-header-custom h5 {
            color: var(--decor-text);
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .custom-table thead {
            background: #fafafa;
        }

        .custom-table th {
            color: #6b7280;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 15px;
            border-bottom: 1px solid #f3f4f6;
        }

        .price-text {
            color: var(--decor-gold);
            font-weight: 700;
        }

        .form-label {
            color: #374151;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-input {
            background: #f9fafb !important;
            border: 1px solid #e5e7eb !important;
            color: var(--decor-text) !important;
            border-radius: 8px !important;
            padding: 10px 15px !important;
        }

        .form-input:focus {
            border-color: var(--decor-gold) !important;
            box-shadow: 0 0 0 2px rgba(180, 83, 9, 0.1) !important;
        }

        .variant-item {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 12px;
            border: 1px dashed #d1d5db;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn-remove-variant {
            color: #f87171;
            transition: 0.3s;
            cursor: pointer;
        }

        .btn-remove-variant:hover { color: #ef4444; }

        .btn-save {
            background: var(--decor-gold) !important;
            color: #fff !important;
            padding: 12px 30px !important;
            border-radius: 8px !important;
            border: none !important;
            font-weight: 600;
        }

        .btn-delete-img {
            position: absolute;
            top: -5px; right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px; height: 18px;
            line-height: 18px; font-size: 10px;
            border: none;
        }
    </style>
</head>

<body>
    @include('admin.nav')

    <div class="banner-container container-fluid py-4">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card-box">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-couch me-2"></i> DANH SÁCH ĐỒ DECOR</h5>
                @if(isset($productEdit))
                    <a href="{{ route('admin.product.index') }}" class="btn btn-dark btn-sm rounded-pill px-4">
                        <i class="fas fa-plus me-1"></i> Thêm mới
                    </a>
                @else
                    <button type="button" class="btn btn-dark btn-sm rounded-pill px-4" onclick="openModal()">
                        <i class="fas fa-plus me-1"></i> Thêm mới
                    </button>
                @endif
            </div>

            <div class="card-body-custom table-responsive">
                <table class="table custom-table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm Decor</th>
                            <th>Giá & Tồn kho</th>
                            <th>Danh mục</th>
                            <th>Thông số (KT | Chất liệu)</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$item->hinh_anh) }}" class="rounded shadow-sm" style="width: 70px; height: 70px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold" style="font-size: 1rem;">{{ $item->tensp }}</div>
                            </td>
                            <td>
                                <div class="price-text">{{ number_format($item->gia, 0, ',', '.') }} đ</div>
                                <div class="text-muted small">Tổng kho: {{ $item->so_luong }}</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $item->category->ten_danhmuc ?? 'Decor' }}</span>
                            </td>
                            <td>
                                <div style="max-height: 80px; overflow-y: auto; font-size: 0.85rem;">
                                    @foreach($item->variants as $v)
                                        <div class="mb-1 text-muted">
                                            <i class="fas fa-expand me-1"></i> {{ $v->size }} | <i class="fas fa-palette me-1"></i> {{ $v->color }}
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-sm btn-outline-primary border-0"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('admin.product.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Xác nhận xóa?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="productModal" class="modal-overlay" style="display: none; position: fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
        <div class="modal-content card-box mx-auto" style="max-width: 950px; width: 95%; max-height: 90vh; overflow-y: auto; position: relative; background: #fff;">
            
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ isset($productEdit) ? 'CHI TIẾT SẢN PHẨM' : 'THÊM SẢN PHẨM DECOR MỚI' }}</h5>
                <button type="button" class="btn-close" onclick="closeModal()"></button>
            </div>

            <div class="card-body-custom p-4">
                <form action="{{ isset($productEdit) ? route('admin.product.update', $productEdit->id) : route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($productEdit)) @method('PUT') @endif

                    <div class="row">
                        <div class="col-md-7 border-end">
                            <div class="form-group mb-4">
                                <label class="form-label">Tên sản phẩm Decor *</label>
                                <input type="text" name="tensp" class="form-input w-100" required value="{{ isset($productEdit) ? $productEdit->tensp : old('tensp') }}" placeholder="VD: Đèn ngủ gốm sứ cao cấp">
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <label class="form-label">Giá bán (VNĐ) *</label>
                                    <input type="number" name="gia" class="form-input w-100" required value="{{ isset($productEdit) ? $productEdit->gia : old('gia') }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Số lượng tổng kho</label>
                                    <input type="number" name="so_luong" class="form-input w-100" value="{{ isset($productEdit) ? $productEdit->so_luong : old('so_luong', 0) }}">
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <label class="form-label">Danh mục sản phẩm</label>
                                    <select name="category_id" class="form-input w-100">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ (isset($productEdit) && $productEdit->category_id == $cat->id) ? 'selected' : '' }}>{{ $cat->ten_danhmuc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Thương hiệu / Xuất xứ</label>
                                    <select name="brand_id" class="form-input w-100">
                                        @foreach($brands as $br)
                                            <option value="{{ $br->id }}" {{ (isset($productEdit) && $productEdit->brand_id == $br->id) ? 'selected' : '' }}>{{ $br->ten_thuonghieu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Mô tả chi tiết sản phẩm</label>
                                <textarea name="mota" class="form-input w-100" rows="5">{{ isset($productEdit) ? $productEdit->mota : old('mota') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-5 ps-md-4">
                            <div class="form-group mb-4 text-center">
                                <label class="form-label d-block text-start">Hình ảnh chính</label>
                                <div class="mb-2">
                                    <img id="preview" src="{{ isset($productEdit) ? asset('storage/'.$productEdit->hinh_anh) : '' }}" class="img-thumbnail" style="max-height: 180px; display: {{ isset($productEdit) ? 'block' : 'none' }}">
                                </div>
                                <input type="file" name="hinh_anh" class="form-control form-control-sm" onchange="previewFile(this)">
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label d-flex justify-content-between align-items-center">
                                    Phân loại (KT | Chất liệu)
                                    <button type="button" class="btn btn-sm btn-outline-dark border-0" onclick="addVariant()"><i class="fas fa-plus-circle"></i></button>
                                </label>
                                <div id="variant-container">
                                    @php $variants = isset($productEdit) ? $productEdit->variants : (old('variants') ?? [[]]); @endphp
                                    @foreach($variants as $index => $v)
                                    <div class="variant-item">
                                        <input type="text" name="variants[{{$index}}][size]" class="form-input py-1" placeholder="KT: DxRxC" value="{{ $v['size'] ?? ($v->size ?? '') }}">
                                        <input type="text" name="variants[{{$index}}][color]" class="form-input py-1" placeholder="Chất liệu" value="{{ $v['color'] ?? ($v->color ?? '') }}">
                                        <input type="number" name="variants[{{$index}}][stock]" class="form-input py-1" placeholder="Tồn" style="width: 65px;" value="{{ $v['stock'] ?? ($v->stock ?? 0) }}">
                                        <i class="fas fa-times-circle btn-remove-variant" onclick="this.parentElement.remove()"></i>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Album ảnh bổ sung</label>
                                <input type="file" name="album[]" class="form-control form-control-sm" multiple onchange="previewAlbum(this)">
                                <div id="album-preview" class="d-flex flex-wrap gap-2 mt-3">
                                    @if(isset($productEdit))
                                        @foreach($productEdit->images as $img)
                                            <div class="position-relative shadow-sm">
                                                <img src="{{ asset('storage/'.$img->image_path) }}" class="rounded" style="width: 55px; height: 55px; object-fit: cover;">
                                                <button type="button" class="btn-delete-img" onclick="deleteImage('{{ route('admin.product.image.delete', $img->id) }}')">&times;</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top text-end">
                        <button type="button" class="btn btn-light rounded-pill px-4 me-2" onclick="closeModal()">Hủy bỏ</button>
                        <button type="submit" class="btn btn-save px-5">Cập nhật sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form id="delete-image-form" action="" method="POST" style="display: none;">
        @csrf @method('DELETE')
    </form>

    <script>
        const modal = document.getElementById('productModal');
        let variantIndex = {{ isset($productEdit) ? $productEdit->variants->count() : 1 }};

        function openModal() { 
            modal.style.display = 'flex'; 
            document.body.style.overflow = 'hidden'; 
        }

        function closeModal() {
            @if(!isset($productEdit)) 
                modal.style.display = 'none'; 
                document.body.style.overflow = 'auto'; 
            @else
                window.location.href = "{{ route('admin.product.index') }}";
            @endif
        }

        function addVariant() {
            const html = `
                <div class="variant-item">
                    <input type="text" name="variants[${variantIndex}][size]" class="form-input py-1" placeholder="KT: DxRxC">
                    <input type="text" name="variants[${variantIndex}][color]" class="form-input py-1" placeholder="Chất liệu">
                    <input type="number" name="variants[${variantIndex}][stock]" class="form-input py-1" placeholder="Tồn" value="0" style="width: 65px;">
                    <i class="fas fa-times-circle btn-remove-variant" onclick="this.parentElement.remove()"></i>
                </div>`;
            document.getElementById('variant-container').insertAdjacentHTML('beforeend', html);
            variantIndex++;
        }

        function previewFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) { 
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result; 
                    preview.style.display = 'block'; 
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewAlbum(input) {
            var container = document.getElementById('album-preview'); 
            if (input.files) {
                Array.from(input.files).forEach(file => {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = `<img src="${e.target.result}" class="rounded border" style="width: 55px; height: 55px; object-fit: cover;">`;
                        container.insertAdjacentHTML('beforeend', img);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }

        function deleteImage(url) {
            if (confirm('Bạn có chắc muốn xóa ảnh này khỏi album?')) {
                var form = document.getElementById('delete-image-form');
                form.action = url; 
                form.submit();
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            @if(isset($productEdit) || $errors->any()) openModal(); @endif
        });
    </script>
</body>

</html>