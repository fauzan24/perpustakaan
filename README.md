Detail Fitur Website Perpustakaan Digital

Website perpustakaan ini dibuat untuk membantu proses pengelolaan buku dan pencatatan peminjaman secara digital. Dengan adanya sistem ini, semua kegiatan seperti peminjaman buku, pengembalian, serta pengelolaan data anggota dan buku bisa dilakukan dengan lebih cepat, mudah, dan rapi tanpa perlu pencatatan manual di kertas.
Website ini memiliki dua jenis pengguna, yaitu Admin (pengelola perpustakaan) dan Anggota (peminjam buku).
Masing-masing pengguna memiliki halaman dan fitur yang berbeda sesuai dengan kebutuhannya.

🔐 1. Halaman Login
Sebelum masuk ke sistem, setiap pengguna harus login terlebih dahulu agar data dan aktivitasnya bisa tercatat dengan aman.
Login Admin:
Digunakan oleh petugas perpustakaan. Admin masuk menggunakan username dan password. Setelah berhasil login, admin bisa mengelola seluruh data seperti data buku, anggota, dan transaksi peminjaman.
Login Anggota:
Digunakan oleh mahasiswa atau anggota perpustakaan. Anggota login menggunakan Nama dan NPM (Nomor Pokok Mahasiswa). Setelah masuk, anggota hanya bisa melihat dan mengelola peminjaman buku miliknya sendiri.
Tujuan dari adanya dua jenis login ini adalah untuk memisahkan hak akses, sehingga data tetap aman dan tidak semua orang bisa mengubah data penting.

📚 2. Halaman Anggota
Setelah anggota berhasil login, mereka akan diarahkan ke halaman utama yang berisi informasi peminjaman mereka.
🧾 a. Tabel History Peminjaman
Di halaman ini terdapat tabel riwayat peminjaman yang menampilkan semua transaksi yang pernah dilakukan oleh anggota tersebut.
Tabel ini berisi kolom:
No — nomor urut data
Kode Buku — kode unik dari buku yang dipinjam
Peminjam — nama anggota yang meminjam
Tanggal Pinjam — tanggal saat buku dipinjam
Tanggal Kembali — batas waktu pengembalian buku
Status — menampilkan apakah buku sudah dikembalikan atau belum
Dengan adanya tabel ini, anggota bisa melihat riwayat dan status buku yang masih dipinjam dengan mudah tanpa perlu bertanya ke petugas perpustakaan.

➕ b. Tombol Tambah Transaksi Peminjaman
Anggota juga bisa menambah transaksi baru dengan menekan tombol “Tambah Transaksi Peminjaman”.
Setelah tombol ditekan, akan muncul formulir peminjaman yang berisi:
Pilihan Buku:
Menampilkan daftar buku yang masih tersedia di perpustakaan. Setiap buku juga menampilkan jumlah stoknya, sehingga anggota bisa tahu apakah buku tersebut masih bisa dipinjam.
Nama Peminjam:
Otomatis terisi dengan nama anggota yang sedang login, jadi tidak perlu diketik lagi. Hal ini mencegah kesalahan data peminjam.
Tanggal Peminjaman:
Terisi otomatis dengan tanggal hari itu (tanggal saat peminjaman dilakukan). Tanggal ini tidak bisa diubah agar data tetap akurat.
Tanggal Kembali:
Terisi otomatis dengan tanggal pengembalian yang sudah diatur 7 hari ke depan dari tanggal peminjaman. Misalnya buku dipinjam tanggal 1 Oktober, maka tanggal kembali otomatis menjadi 8 Oktober.
Setelah anggota mengisi data dengan benar dan menekan tombol Simpan, data peminjaman akan langsung tersimpan dan otomatis muncul di tabel History Peminjaman.

🧑‍💼 3. Halaman Admin

Admin memiliki peran untuk mengelola seluruh data dalam sistem, seperti menambah buku baru, membuat laporan, mengatur akun anggota, serta mengelola transaksi peminjaman.
Berikut fitur-fitur yang tersedia di halaman admin:
📕 a. Menu Buku
Menu ini digunakan untuk mengelola seluruh koleksi buku di perpustakaan.
Di dalam menu ini, admin dapat melakukan beberapa hal:
Menambah Buku Baru:
Admin bisa menambahkan data buku baru dengan mengisi informasi seperti judul, pengarang, penerbit, tahun terbit, jumlah stok, deskripsi buku, dan lokasi buku di rak perpustakaan.
Mengedit dan Menghapus Buku:
Jika ada kesalahan data atau buku sudah tidak tersedia, admin dapat memperbaikinya melalui tombol Edit atau menghapusnya dengan tombol Hapus.
Mencetak Laporan Buku:
Admin bisa mencetak laporan seluruh data buku dalam bentuk file PDF atau Excel, agar mudah dibagikan atau disimpan sebagai arsip.
Tabel daftar buku di menu ini menampilkan kolom:
No
Cover Buku (gambar sampul buku)
Judul Buku
ISBN (kode unik buku)
Pengarang
Penerbit
Tahun Terbit
Jumlah/Stok Buku
Deskripsi Buku
Lokasi Buku di Perpustakaan
Tombol Edit dan Hapus
Dengan menu ini, admin bisa dengan mudah melihat daftar buku yang tersedia dan menambah stok buku jika diperlukan.

👥 b. Menu User (Kelola Akun Anggota)
Menu ini berfungsi untuk mengatur seluruh akun yang dapat mengakses sistem.
Di sini admin bisa:
Menambahkan akun anggota baru (misalnya mahasiswa baru yang ingin menjadi anggota perpustakaan)
Mengubah data akun jika ada kesalahan
Menghapus akun anggota jika sudah tidak aktif
Tabel data user menampilkan:
No
Foto (foto wajah anggota)
Nama Lengkap
Username
Email
Password
Level Pengguna (Admin atau Anggota)
Tombol Edit dan Hapus
Fitur ini membantu admin memastikan hanya pengguna yang terdaftar yang bisa menggunakan sistem.

🔄 c. Menu Transaksi
Menu ini menampilkan semua data peminjaman buku yang dilakukan oleh seluruh anggota.
Admin dapat:
Melihat seluruh riwayat peminjaman buku
Menambah transaksi peminjaman baru secara manual
Mencetak laporan transaksi ke dalam format PDF atau Excel untuk keperluan dokumentasi
Mengedit dan menghapus data transaksi jika ada kesalahan
Tabel transaksi berisi:
No
Kode Buku
Judul Buku
Nama Peminjam
Tanggal Pinjam
Tanggal Kembali
Status (dikembalikan/belum dikembalikan)
Tombol Edit dan Hapus
Dengan fitur ini, admin dapat memantau semua aktivitas peminjaman secara real-time dan memastikan buku yang dipinjam dikembalikan tepat waktu.
