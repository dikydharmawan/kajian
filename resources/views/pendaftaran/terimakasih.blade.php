@extends('layouts.app')

@section('title', 'Terima Kasih Sudah Mendaftar!')

@section('content')
<div class="container text-center py-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h1 class="mb-3" style="font-size:2rem; color:#22c55e;">
                <i class="fas fa-check-circle"></i>
                Terima Kasih!
            </h1>
            <p class="mb-4">Pendaftaran kamu telah berhasil.<br>Silakan gabung ke grup WhatsApp untuk info selanjutnya.</p>
            <a href="https://chat.whatsapp.com/YOUR_GROUP_LINK" target="_blank" class="btn btn-success mb-3" style="font-size:1.1rem;">
                <i class="fab fa-whatsapp"></i> Masuk Grup WhatsApp
            </a>
            <p class="text-muted" style="font-size:0.9rem;">Pastikan kamu bergabung agar tidak ketinggalan info penting.</p>
        </div>
    </div>
</div>
@endsection 