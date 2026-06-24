@extends('layout.master')

@section('title', 'Edit Profil')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-user-edit me-2" style="color: #0d9488;"></i>Edit Profil
    </h1>
</div>

<form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

@if ($errors->any())
    <div class="alert alert-danger" style="border-radius: 1rem;">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body text-center p-4">
                    
                    {{-- Default View: Photo & Buttons --}}
                    <div id="profileImageContainer">
                        {{-- Photo preview --}}
                        <img id="photoPreview" 
                             src="{{ $pengguna->photo_profile ? asset('storage/' . $pengguna->photo_profile) : asset('img/profil.png') }}" 
                             alt="avatar" 
                             class="rounded-circle img-fluid mb-3" 
                             style="width: 130px; height: 130px; border: 4px solid #ccfbf1; padding: 4px; object-fit: cover;">

                        <div class="mb-4">
                            <label for="photo_profile_picker" class="btn btn-outline-primary" style="border-radius: 9999px; font-weight: 600; padding: 0.5rem 1.5rem; cursor: pointer;">
                                <i class="fas fa-camera me-2"></i>Pilih Foto Baru
                            </label>
                            <input type="file" id="photo_profile_picker" class="d-none" accept="image/jpeg,image/png,jpg">
                            <input type="hidden" name="photo_profile" id="photo_profile_final">
                            @error('photo_profile')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center mb-2" id="submitBtnContainer">
                            <button type="submit" class="btn btn-primary" style="border-radius: 9999px !important;">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>

                    {{-- Inline Cropper Area (Hidden initially) --}}
                    <div id="inlineCropperContainer" style="display: none; width: 100%; margin-bottom: 1rem;">
                        <p class="text-muted text-center mb-2" style="font-size:0.85rem; font-weight: 600;">Sesuaikan Foto Profil</p>
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
                        <i class="fas fa-info-circle me-2" style="color: #0d9488;"></i>Edit Informasi
                    </h6>
                    
                    @if ($pengguna->role === 'klien')
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama Lengkap</p></div>
                            <div class="col-sm-9"><input type="text" name="nama" value="{{ Auth::user()->klien->nama }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Email</p></div>
                            <div class="col-sm-9"><input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">No Telepon</p></div>
                            <div class="col-sm-9"><input type="text" name="no_telepon" value="{{ Auth::user()->klien->no_telepon }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Alamat</p></div>
                            <div class="col-sm-9"><input type="text" name="alamat" value="{{ Auth::user()->klien->alamat }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">

                    @elseif ($pengguna->role === 'dokter')
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama Lengkap</p></div>
                            <div class="col-sm-9"><input type="text" name="nama" value="{{ Auth::user()->dokter->nama }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Email</p></div>
                            <div class="col-sm-9"><input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">No Telepon</p></div>
                            <div class="col-sm-9"><input type="text" name="no_telepon" value="{{ Auth::user()->dokter->no_telepon }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Alamat</p></div>
                            <div class="col-sm-9"><input type="text" name="alamat" value="{{ Auth::user()->dokter->alamat }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Spesialis</p></div>
                            <div class="col-sm-9"><input type="text" name="spesialisasi" value="{{ Auth::user()->dokter->spesialisasi }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jadwal Praktik</p></div>
                            <div class="col-sm-9">
                                <select name="hari" class="form-control" required>
                                    <option disabled {{ old('hari', optional(Auth::user()->dokter->jadwalPraktik->first())->hari) ? '' : 'selected' }}>
                                        -- Pilih Jadwal Praktik --
                                    </option>
                                    <option value="Senin - Jumat" {{ old('hari', optional(Auth::user()->dokter->jadwalPraktik->first())->hari) == 'Senin - Jumat' ? 'selected' : '' }}>
                                        Senin - Jumat
                                    </option>
                                    <option value="Setiap Hari" {{ old('hari', optional(Auth::user()->dokter->jadwalPraktik->first())->hari) == 'Setiap Hari' ? 'selected' : '' }}>
                                        Setiap Hari
                                    </option>
                                </select>
                            </div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">

                    @elseif ($pengguna->role === 'admin')
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama Lengkap</p></div>
                            <div class="col-sm-9"><input type="text" name="nama" value="{{ optional(Auth::user()->admin)->nama ?? '' }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Email</p></div>
                            <div class="col-sm-9"><input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">No Telepon</p></div>
                            <div class="col-sm-9"><input type="text" name="no_telepon" value="{{ optional(Auth::user()->admin)->no_telepon ?? '' }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                        
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Alamat</p></div>
                            <div class="col-sm-9"><input type="text" name="alamat" value="{{ optional(Auth::user()->admin)->alamat ?? '' }}" class="form-control" required></div>
                        </div>
                        <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">

                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
</form>

{{-- Cropper.js JS --}}
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
    let cropper = null;
    let pendingImageUrl = null;
    
    const pickerInput = document.getElementById('photo_profile_picker');
    const hiddenInput = document.getElementById('photo_profile_final');
    const cropImage = document.getElementById('cropImage');
    
    const profileImageContainer = document.getElementById('profileImageContainer');
    const inlineCropperContainer = document.getElementById('inlineCropperContainer');

    // Step 1: User selects file → show inline cropper
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
            
            // Hide preview, show cropper area
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

    // "Terapkan" button
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

                // Update preview
                document.getElementById('photoPreview').src = dataUrl;

                // Store base64 in hidden input for form submission
                hiddenInput.value = dataUrl;
                
                closeCropper();
            } else {
                console.error("Gagal membuat canvas crop");
                alert("Gagal memproses gambar. Silakan coba lagi.");
            }
        } catch (e) {
            console.error("Error cropping image:", e);
            alert("Terjadi kesalahan saat memproses gambar.");
        }
    });

    // "Batal" button
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
        
        // Return to normal view
        inlineCropperContainer.style.display = 'none';
        profileImageContainer.style.display = 'block';
    }
</script>
@endpush
@endsection