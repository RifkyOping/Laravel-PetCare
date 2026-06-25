@extends('layout.master')

@section('title', 'Tambah Hewan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-plus-circle me-2" style="color: #0d9488;"></i>Tambah Hewan
    </h1>
</div>

<form action="{{ route('hewan.store') }}" method="POST">
@csrf
<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body text-center p-4">
                    {{-- Default View: Photo & Buttons --}}
                    <div id="profileImageContainer">
                        <img id="photoPreview" 
                             src="{{ asset('img/profil.png') }}" 
                             alt="avatar" 
                             class="rounded-circle img-fluid mb-3" 
                             style="width: 130px; height: 130px; border: 4px solid #ccfbf1; padding: 4px; object-fit: cover;">
                        
                        <div class="mb-4">
                            <label for="foto_profil_picker" class="btn btn-outline-primary" style="border-radius: 9999px; font-weight: 600; padding: 0.5rem 1.5rem; cursor: pointer;">
                                <i class="fas fa-camera me-2"></i>Pilih Foto Hewan
                            </label>
                            <input type="file" id="foto_profil_picker" class="d-none" accept="image/jpeg,image/png,jpg">
                            <input type="hidden" name="foto_profil" id="foto_profil_final">
                            @error('foto_profil')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center mb-2" id="submitBtnContainer">
                            <button type="submit" class="btn btn-primary" style="border-radius: 9999px !important;">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </div>

                    {{-- Inline Cropper Area --}}
                    <div id="inlineCropperContainer" style="display: none; width: 100%; margin-bottom: 1rem;">
                        <p class="text-muted text-center mb-2" style="font-size:0.85rem; font-weight: 600;">Sesuaikan Foto Hewan</p>
                        <div id="cropContainer" style="width: 100%; height: 300px; background: #000; border-radius: 0.75rem; overflow: hidden; position: relative;">
                            <img id="cropImage" src="" style="display:block; max-width:100%;">
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <button type="button" class="btn btn-secondary w-50" id="cancelCrop" style="border-radius:9999px;">
                                <i class="fas fa-times me-1"></i> Batal
                            </button>
                            <button type="button" class="btn btn-primary w-50" id="applyCrop" style="border-radius:9999px;">
                                <i class="fas fa-check me-1"></i> Terapkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-0">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body p-4">
                    <h6 style="font-weight: 700; color: #0f172a; margin-bottom: 1rem;">
                        <i class="fas fa-paw me-2" style="color: #0d9488;"></i>Data Peliharaan Baru
                    </h6>
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama</p></div>
                        <div class="col-sm-9"><input type="text" name="nama" class="form-control" placeholder="Nama peliharaan" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jenis</p></div>
                        <div class="col-sm-9"><input type="text" name="jenis" class="form-control" placeholder="Contoh: Kucing, Anjing" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Tanggal Lahir</p></div>
                        <div class="col-sm-9"><input type="date" name="tanggal_lahir" class="form-control" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jenis Kelamin</p></div>
                        <div class="col-sm-9">
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="jantan">Jantan</option>
                                <option value="betina">Betina</option>
                            </select>
                        </div>
                    </div>
                    @if ($role === 'admin')
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Pilih Klien</p></div>
                        <div class="col-sm-9">
                            <select name="klien_id" class="form-control" required>
                                <option value="">-- Pilih Klien --</option>
                                @foreach ($daftarKlien as $klien)
                                    <option value="{{ $klien->id }}">{{ $klien->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
</form>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
    let cropper = null;
    let pendingImageUrl = null;
    
    const pickerInput = document.getElementById('foto_profil_picker');
    const hiddenInput = document.getElementById('foto_profil_final');
    const cropImage = document.getElementById('cropImage');
    
    const profileImageContainer = document.getElementById('profileImageContainer');
    const inlineCropperContainer = document.getElementById('inlineCropperContainer');

    pickerInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        if (!file.type.startsWith('image/')) {
            alert('Silakan pilih file gambar.');
            pickerInput.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(evt) {
            pendingImageUrl = evt.target.result;
            
            profileImageContainer.style.display = 'none';
            inlineCropperContainer.style.display = 'block';

            cropImage.onload = function() {
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
                cropper = new Cropper(cropImage, {
                    aspectRatio: 1,
                    viewMode: 1,
                    dragMode: 'move',
                    autoCropArea: 0.8,
                    guides: true,
                    center: true,
                    highlight: false,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                });
            };
            cropImage.src = pendingImageUrl;
        };
        reader.readAsDataURL(file);
    });

    document.getElementById('applyCrop').addEventListener('click', function() {
        if (!cropper) return;

        try {
            const canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300,
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
            });

            if (canvas) {
                const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
                document.getElementById('photoPreview').src = dataUrl;
                hiddenInput.value = dataUrl;
                closeCropper();
            } else {
                alert("Gagal memproses gambar. Silakan coba lagi.");
            }
        } catch (e) {
            console.error(e);
            alert("Terjadi kesalahan saat memproses gambar.");
        }
    });

    document.getElementById('cancelCrop').addEventListener('click', function() {
        closeCropper();
    });

    function closeCropper() {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        pickerInput.value = '';
        pendingImageUrl = null;
        
        inlineCropperContainer.style.display = 'none';
        profileImageContainer.style.display = 'block';
    }
</script>
@endpush
