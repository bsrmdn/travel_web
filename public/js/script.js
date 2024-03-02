$(document).ready(function () {
    var slider = $('.slider');
    var video = slider.find('video');

    video.on('loadedmetadata', function () {
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

function checkSchedule() {
    function currentTime() {
        let date = new Date();
        let hh = date.getHours();
        let mm = date.getMinutes();
        let ss = date.getSeconds();
        // let session = "AM";

        // if (hh === 0) {
        //     hh = 12;
        // }
        // if (hh > 12) {
        //     hh = hh - 12;
        //     session = "PM";
        // }

        hh = (hh < 10) ? "0" + hh : hh;
        mm = (mm < 10) ? "0" + mm : mm;
        ss = (ss < 10) ? "0" + ss : ss;

        let time = hh + ":" + mm + ":" + ss;

        return time;
    }

    let scheduleRows = document.getElementsByClassName('schedule-row');

    for (let i = 0; i < scheduleRows.length; i++) {
        let startTime = scheduleRows[i].getElementsByClassName('start-time')[0].innerText;
        let endTime = scheduleRows[i].getElementsByClassName('end-time')[0].innerText;

        if (startTime <= currentTime() && currentTime() <= endTime) {
            scheduleRows[i].classList.remove('d-none');
        } else {
            scheduleRows[i].classList.add('d-none');
        }
    }
}
setInterval(checkSchedule, 1000);


// JADWAL SHOLAT
navigator.geolocation.getCurrentPosition(function (position) {
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
                switch (key) {
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
setInterval(function () {
    tampilkanWaktuSekarang();
}, 1000);