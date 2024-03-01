@extends('layouts.app')

@section('content')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Link ke file CSS -->
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
  <header>
    <div class="row">
        <div class="col">
            <div id="pengumuman" class="p-3">
                <marquee bgcolor="red">RUNNING TEXT LATAR KUNING</marquee>
            </div>
        </div>
    </div>
</header>
  <div class="row px-3 mt-5">
    <div class="col">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @for ($i = 0; $i < 3; $i++)
          <div class="carousel-item @if ($i === 0) active @endif">
            <table class="table pb-3">
              <thead>
                <tr>
                  <th scope="col">Kode Rombel</th>
                  <th scope="col">Pelajaran</th>
                  <th scope="col">Waktu Mulai</th>
                  <th scope="col">Waktu Selesai</th>
                  <th scope="col">Ruang</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courseSchedules as $schedule)
                <tr class="schedule-row d-none">
                  <td>{{ $schedule->kode_rombel }}</td>
                  <td>{{ $schedule->pelajaran }}</td>
                  <td class="start-time">{{ $schedule->waktu_mulai }}</td>
                  <td class="end-time">{{ $schedule->waktu_selesai }}</td>
                  <td>{{ $schedule->ruang }}</td>
                  <td>{{ $schedule->keterangan }}</td>
                  <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                  </td>
                </tr>
                @endforeach
                {{-- <p>{{ now('Asia/Jakarta')->toTimeString() }}</p> --}}
              </tbody>
            </table>
          </div>
          @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
      <!-- Bagian Sponsor, Jadwal Guru Piket, dan Jadwal Sholat -->
      <div class="col-4">
        <aside>
            <div id="sponsor" class="bg-light p-3 mb-3">
                <div class="slider">
                    <div>
                        <!-- Video slide -->
                        <video controls autoplay muted loop onended="nextSlide()">
                            <source src="assets/vidio-for-slide.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div><img src="img/foto-for-slide.png" alt="Image 1"></div>
                    <div><img src="img/foto-for-slide-scnd.png" alt="Image 2"></div>
                    <!-- Tambahkan video atau gambar lainnya sesuai kebutuhan -->
                </div>
            </div>
            <!-- Bagian Jadwal Guru Piket -->
            <div id="guru-piket" class="bg-light p-3 mb-3">
                <h2>Jadwal Guru Piket</h2>
                <p>Isi jadwal guru piket disini</p>
            </div>
            <div id="jadwal-sholat">
                <div class="row">
                    <div class="col-md-8">
                        <div id="sholat">Jadwal Sholat</div>
                    </div>
                    <div class="col-md-4">
                        <div class="waktu-item">
                            <strong></strong> <span id="jam-sekarang"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="waktu-sholat">
                            <!-- Data jadwal sholat lima waktu akan ditampilkan di sini -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="waktu-sekarang">
                            <div class="kalender-item">
                                <strong>Masehi:</strong> <span id="kalender-masehi"></span>
                            </div>
                            <div class="kalender-item">
                                <strong>Hijriah:</strong> <span id="kalender-hijriah"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <footer>
        <div class="row">
            <div class="col">
                <p>&copy; 2024 Nama Perusahaan. All rights reserved.</p>
            </div>
        </div>
    </footer>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
 $(document).ready(function(){
  var slider = $('.slider');
  var video = slider.find('video');

  video.on('loadedmetadata', function() {
      var videoDuration = this.duration * 1000; // Durasi video dalam milidetik
      slider.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: videoDuration,
          pauseOnFocus: false,
          pauseOnHover: false,
          pauseOnDotsHover: false
      });
  });

  function nextSlide() {
      slider.slick('slickNext'); // Pindah ke slide berikutnya setelah video selesai diputar
  }
});
// JADWAL SHOLAT
navigator.geolocation.getCurrentPosition(function(position) {
const latitude = position.coords.latitude;
const longitude = position.coords.longitude;

// Mendapatkan waktu sholat berdasarkan koordinat
fetch(`https://api.aladhan.com/v1/timings?latitude=${latitude}&longitude=${longitude}&method=2`)
  .then(response => response.json())
  .then(data => {
      const jadwalSholat = data.data.timings;

      // Filter dan ambil hanya waktu sholat lima waktu
      const waktuSholatLimaWaktu = {
          'Subuh': jadwalSholat.Fajr,
          'Dzuhur': jadwalSholat.Dhuhr,
          'Ashar': jadwalSholat.Asr,
          'Maghrib': jadwalSholat.Maghrib,
          'Isya': jadwalSholat.Isha
      };

      // Ambil waktu sekarang
      const waktuSekarang = new Date();
      const waktuSekarangMillis = waktuSekarang.getTime();

      // Tampilkan data jadwal sholat lima waktu
      const waktuSholatContainer = document.querySelector('.waktu-sholat');
      for (const [key, value] of Object.entries(waktuSholatLimaWaktu)) {
          // Ubah format waktu sholat menjadi objek Date
          const waktuSholatMillis = new Date(`January 1, 1970 ${value}`).getTime();

          // Jika waktu sholat sudah lewat, tambahkan kelas waktu-lewat
          const waktuLebihDulu = waktuSholatMillis < waktuSekarangMillis ? ' waktu-lewat' : '';

          // Ganti teks bahasa Inggris dengan terjemahan ke bahasa Indonesia
          let translatedKey;
          switch(key) {
              case 'Fajr':
                  translatedKey = 'Subuh';
                  break;
              case 'Dhuhr':
                  translatedKey = 'Dzuhur';
                  break;
              case 'Asr':
                  translatedKey = 'Ashar';
                  break;
              case 'Maghrib':
                  translatedKey = 'Maghrib';
                  break;
              case 'Isha':
                  translatedKey = 'Isya';
                  break;
              default:
                  translatedKey = key;
          }

          // Tampilkan waktu sholat
          const waktuSholatItem = document.createElement('div');
          waktuSholatItem.className = `waktu-sholat-item${waktuLebihDulu}`;
          waktuSholatItem.innerHTML = `<strong>${translatedKey}:</strong> ${value}`;
          waktuSholatContainer.appendChild(waktuSholatItem);

          // Hentikan loop setelah menemukan waktu sholat yang belum lewat
          break;
      }
  })
  .catch(error => console.error('Error:', error));
});
  // KALENDER & WAKTU SEKARANG
   // Fungsi untuk menampilkan waktu sekarang
function tampilkanWaktuSekarang() {
  const waktuSekarang = new Date();
  const jam = waktuSekarang.getHours();
  const menit = waktuSekarang.getMinutes();
  const detik = waktuSekarang.getSeconds();
  document.getElementById('jam-sekarang').textContent = `${jam}:${menit}:${detik}`;
}

// Fungsi untuk menampilkan kalender Masehi
function tampilkanKalenderMasehi() {
  const waktuSekarang = new Date();
  const tahun = waktuSekarang.getFullYear();
  const bulan = waktuSekarang.getMonth() + 1;
  const tanggal = waktuSekarang.getDate();
  document.getElementById('kalender-masehi').textContent = `${tanggal}/${bulan}/${tahun}`;
}

// Fungsi untuk menampilkan kalender Hijriah
function tampilkanKalenderHijriah() {
  fetch('https://api.aladhan.com/v1/gToH?date=02-03-2024')
      .then(response => response.json())
      .then(data => {
          document.getElementById('kalender-hijriah').textContent = data.data.hijri.date;
      })
      .catch(error => console.error('Error:', error));
}

// Panggil fungsi-fungsi untuk menampilkan waktu sekarang dan kalender
tampilkanWaktuSekarang();
tampilkanKalenderMasehi();
tampilkanKalenderHijriah();

// Perbarui waktu setiap detik
setInterval(function() {
  tampilkanWaktuSekarang();
}, 1000);
</script>
</body>
@endsection
