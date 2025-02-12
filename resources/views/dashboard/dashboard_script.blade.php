@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        });
    </script>
@endif
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        });
    </script>
@endif

<script>
    var options = {
        series: [{
            type: "bar",
            name: "Pendapatan",
            data: @json($total_pendapatan)
        }, {
            type: "bar",
            name: "Beban",
            data: @json($total_beban),
        }, {
            type: "line",
            name: "Laba Bersih",
            data: @json($rasio['Laba_Bersih']),
        }],
        chart: {
            height: 330,
            zoom: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'straight'
        },
        markers: {
            size: 7,
        },
        xaxis: {
            categories: @json($tahun),
            title: {
                text: 'Tahun',
                style: {
                    color: 'white'
                }
            },
        },
        yaxis: [{
            title: {
                text: 'Jumlah (dalam jutaan rupiah)',
                style: {
                    color: 'white'
                }
            },
            labels: {
                formatter: function(value) {
                    return value.toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    });
                }
            },
            // max:21000000
        },
        // {
        //     opposite: true,
        //     title: {
        //         text: 'Laba Bersih',
        //         style: {
        //             color: '#DC991C'
        //         }
        //     },
        //     labels: {
        //         formatter: function(value) {
        //             return value.toLocaleString("id-ID", {
        //                 style: "currency",
        //                 currency: "IDR"
        //             });
        //         },
        //     },
        //     max: 1000000
        // }
    ]
    };

    var chart = new ApexCharts(document.querySelector("#pendapatanChart"), options);
    chart.render();
</script>
<script>
    @php
        $namaKategori = $KategoriPendapatan->pluck('nama');
        $nominalKategori = $KategoriPendapatan->pluck('kredit');
        $totalKategori = $KategoriPendapatan->pluck('kredit')->sum();
    @endphp
    let proporsiPendapatan = {
        series: @json($nominalKategori),
        labels: @json($namaKategori),
        colors: ["#435ebe", "#879ae0", "#98a3ca", "#6a759c"],
        chart: {
            type: "donut",
            width: "100%",
            height: "355px",
        },
        legend: {
            position: "bottom",
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "40%",
                },
            },
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return value.toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    });
                }
            }
        }
    }

    var chartVisitorsProfile = new ApexCharts(
        document.querySelector("#proporsi-pendapatan-chart"),
        proporsiPendapatan
    )
    chartVisitorsProfile.render();
</script>
