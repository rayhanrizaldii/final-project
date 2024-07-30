{{-- script --}}

<script src="{{ asset('template/assets/static/js/components/dark.js') }}"></script>
<script src="{{ asset('template/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

<script src="{{ asset('template/assets/compiled/js/app.js') }}"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/assets/static/js/pages/dashboard.js') }}"></script>


{{-- script sidebar --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.sidebar-item');

        // Menandai item sidebar yang sesuai dengan URL halaman saat ini sebagai aktif
        const currentURL = window.location.href;
        items.forEach(item => {
            const link = item.querySelector('a.sidebar-link');
            if (link && link.href === currentURL) {
                item.classList.add('active');
            }

            item.addEventListener('click', function() {
                // Hapus kelas 'active' dari semua item
                items.forEach(i => i.classList.remove('active'));

                // Tambahkan kelas 'active' pada item yang diklik
                this.classList.add('active');
            });
        });
    });
</script>

{{-- script alert --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusMessage = document.getElementById('status-message');
        if (statusMessage) {
            setTimeout(function() {
                statusMessage.style.transition = 'opacity 1s'; // Animasi transisi untuk efek yang halus
                statusMessage.style.opacity = 0;
                setTimeout(function() {
                    statusMessage.remove(); // Hapus elemen dari DOM setelah animasi
                }, 1000); // Waktu yang sama dengan durasi animasi transisi
            }, 3000); // 3000 ms = 3 detik
        }
    });
</script>
