        var profile = document.getElementById('profile');
        var absen2 = document.getElementById('absen');
        var jadwal2 = document.getElementById('jadwal');

        var btnprofile = document.getElementById('btnprofile');
        var btnabsen2 = document.getElementById('btnabsen2');
        var btnjadwal2 = document.getElementById('btnjadwal2');

        var judul = document.getElementById('judul');

        function dataprofile() {
            if (profile.style.display == "none") {
                profile.style.display = "block";
                absen2.style.display = "none";
                jadwal2.style.display = "none";

                btnprofile.classList.add('disabled');
                btnabsen2.classList.remove('disabled');
                btnjadwal2.classList.remove('disabled');

                judul.innerHTML = 'Profile'; 
            } else {
                profile.style.display = "none";
                btnprofile.classList.add('disabled');
            }
        }

        function dataabsen2() {
            if (absen2.style.display == "none") {
                absen2.style.display = "block";
                profile.style.display = "none";
                jadwal2.style.display = "none";

                btnabsen2.classList.add('disabled');
                btnprofile.classList.remove('disabled');
                btnjadwal2.classList.remove('disabled');

                judul.innerHTML = 'Absen kelas';
            } else {
                absen2.style.display = "none";
                btnabsen2.classList.add('disabled');
            }
        }

        function datajadwal2() {
            if (jadwal2.style.display == "none") {
                jadwal2.style.display = "block";
                absen2.style.display = "none";
                profile.style.display = "none";

                btnjadwal2.classList.add('disabled');
                btnabsen2.classList.remove('disabled');
                btnprofile.classList.remove('disabled');
                
                judul.innerHTML = 'Jadwal kelas';
            } else {
                jadwal2.style.display = "none";
                btnjadwal2.classList.add('disabled');
            }
        }
