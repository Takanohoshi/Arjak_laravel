@include('layouts.admin')
<title>Dashboard</title>
<style>
    /* CSS untuk mengatur tampilan konten */
    .content-container {
        display: flex;
        flex-direction: column; /* Mengubah tampilan menjadi kolom */
        align-items: center; /* Pusatkan elemen horizontal */
        margin-top: 20px;
    }

/* CSS untuk mengatur tampilan card profil */
.profile-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center; /* Pusatkan teks horizontal */
    background-color: white;
}


/* CSS untuk mengatur tampilan gambar profil */
.profile-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
}

/* CSS untuk mengatur tampilan tabel profil */
.profile-table {
    width: 300px;
    display: flex;
    flex-direction: column; /* Ubah tampilan tabel menjadi kolom */
    align-items: center; /* Pusatkan elemen horizontal */
}

.profile-table th {
    text-align: left;
    width: 100%;
}

.profile-table td {
    width: 100%;
}

.profile-table input {
    border: none;
    background-color: transparent;
    pointer-events: none;
    width: 100%;
}

/* CSS untuk mengatur tampilan tombol "Change Data" */
.change-button {
    background-color: #f44336; /* Warna latar merah */
    color: white; /* Warna teks putih */
    padding: 10px 20px; /* Ukuran padding tombol*/
    border: none; /* Tanpa batas tombol */
    text-align: center; /* Teks di tengah tombol */
    text-decoration: none; /* Tanpa garis bawah tautan*/
    font-size: 16px; /* Ukuran font */
    margin: 4px 2px; /* Ruang margin */
    cursor: pointer; /* Kursor pointer saat dihover*/
    width: 100%;
}

</style>
<body>
    <div class="content-container">

    @if (session()->has('loginberhasil'))
    <div class="alert alert-success alert-dismissible fade show col-lg-10 mx-auto col-lg-5" role="alert">
        {{ session('loginberhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        <!-- Pesan Selamat Datang -->
        <div class="welcome-message">
            <h1>Selamat datang, {{ Auth::user()->name }} !!</h1>
        </div>
<br>

        <!-- Card Profil -->
        <div class="profile-card">
            <!-- Tampilkan gambar profil -->
            <img src="{{ asset('path-to-profile-image.jpg') }}" alt="Profile Image" class="profile-image">
            
            <!-- Tampilkan data profil dalam tabel -->
            <table class="profile-table">
                <tr>
                    <th>Nama: {{ Auth::user()->name }}</th>
                </tr>
                <tr>
                    <th>Email: {{ Auth::user()->email }}</th>
                    
                </tr>
                <tr>
                    <th>Password: *******</th>
                </tr>
            </table>
            
            <!-- Tombol "Change Data" -->
            <button class="change-button">Change Data</button>
        </div>
    </div>
</body>
