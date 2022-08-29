        var absen = document.getElementById('absen');
        var jadwal = document.getElementById('jadwal');

        var btnabsen = document.getElementById('btnabsen');
        var btnjadwal = document.getElementById('btnjadwal');

        function dataabsen() {
            if (absen.style.display == "none") {
                absen.style.display = "block";
                jadwal.style.display = "none";

                btnabsen.classList.add('disabled');
                btnjadwal.classList.remove('disabled');
            } else {
                absen.style.display = "none";
                jadwal.style.display = "block";

                btnabsen.classList.remove('disabled');
                btnjadwal.classList.add('disabled');
            }
        }

        function datajadwal() {
            if (jadwal.style.display == "none") {
                jadwal.style.display = "block";
                absen.style.display = "none";

                btnjadwal.classList.add('disabled');
                btnabsen.classList.remove('disabled');
            } else {
                jadwal.style.display = "block";
                absen.style.display = "none";

                btnjadwal.classList.remove('disabled');
                btnabsen.classList.add('disabled');
            }
        }
