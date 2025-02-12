<script>
    function createChartOptions(name, data, categories, titleY) {
        return {
            series: [{
                name: name,
                data: data
            }],
            chart: {
                height: 600,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            // colors:['green'],
            markers: {
                size: 7,
            },
            xaxis: {
                categories: categories,
                title: {
                    text: 'Tahun',
                    style: {
                        color: 'white'
                    }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return value.toFixed(2) + '%';
                    }
                },
                title: {
                    text: titleY,
                    style: {
                        color: 'white'
                    }
                }
            }
        };
    }

    // Data dan kategori
    var tahun = @json($data['tahun']);

    // Opsi grafik
    var options_rasio_lancar = createChartOptions("Rasio Lancar", @json($rasio['Rasio_Lancar']), tahun,
        'Perbandingan Rasio Lancar (%)');
    var options_rasio_sangat_lancar = createChartOptions("Rasio Sangat Lancar", @json($rasio['Rasio_Sangat_Lancar']), tahun,
        'Perbandingan Rasio Sangat Lancar (%)');
    var options_ROI = createChartOptions("Return On Investment (ROI)", @json($rasio['ROI']), tahun,
        'Perbandingan Rasio Return On Investment (ROI)');
    var options_ROE = createChartOptions("Return On Equity (ROE)", @json($rasio['ROE']), tahun,
        'Perbandingan Rasio Return On Equity (ROE)');
    var options_utang_aset = createChartOptions("Rasio Utang Terhadap Aset", @json($rasio['Rasio_Utang_Terhadap_Aset']), tahun,
        'Perbandingan Rasio Utang Terhadap Aset');
    var options_utang_modal = createChartOptions("Rasio Utang Terhadap Modal", @json($rasio['Rasio_Utang_Terhadap_Ekuitas']), tahun,
        'Perbandingan Rasio Utang Terhadap Modal');
    var options_perputaran_persediaan = createChartOptions("Rasio Perputaran Persediaan", @json($rasio['Rasio_Perputaran_Persediaan']),
        tahun,
        'Perbandingan Rasio Perputaran Persediaan');
    var options_perputaran_modal_kerja = createChartOptions("Rasio Perputaran Modal Kerja",
        @json($rasio['Rasio_Perputaran_Modal_Kerja']), tahun,
        'Perbandingan Rasio Modal Kerja');

    // Membuat grafik
    new ApexCharts(document.querySelector("#rasiolancarchart"), options_rasio_lancar).render();
    new ApexCharts(document.querySelector("#rasiosangatlancarchart"), options_rasio_sangat_lancar).render();
    new ApexCharts(document.querySelector("#rasioROI"), options_ROI).render();
    new ApexCharts(document.querySelector("#rasioROE"), options_ROE).render();
    new ApexCharts(document.querySelector("#rasioUtangTerhadapAset"), options_utang_aset).render();
    new ApexCharts(document.querySelector("#rasioUtangTerhadapModal"), options_utang_modal).render();
    new ApexCharts(document.querySelector("#rasioUtangTerhadapModal"), options_utang_modal).render();
    new ApexCharts(document.querySelector("#rasioPerputaranPersediaan"), options_perputaran_persediaan).render();
    new ApexCharts(document.querySelector("#rasioPerputaranModalKerja"), options_perputaran_modal_kerja).render();
</script>
