$("#submitPrediksi").click(function (event) {
    event.preventDefault();

    var modal = $("#defaultModalPrediksi");
    var tbody = modal.find("#tbodyPrediksi");
    var tbody2 = modal.find("#tbodyPrediksi2");
    var tfoot = modal.find("#tfootPrediksi");
    var selectedRatio = $("#selectedRatio").val();
    let count = 0;
    if (!dataRasio[selectedRatio]) {
        Toast.fire({
            icon: "error",
            title: "Rasio Tidak Ditemukan!",
        });
        return;
    }

    var rasio = dataRasio[selectedRatio];
    console.log("Data Rasio:", rasio);

    if (!selectedRatio || selectedRatio === "Pilih Rasio...") {
        Toast.fire({
            icon: "error",
            title: "Silahkan Pilih Jenis Rasio Terlebih Dahulu!",
        });
        return;
    }

    $.ajax({
        url: "calculate",
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            selectedRatio: selectedRatio,
            ratioData: rasio,
        },
        success: function (response) {
            console.log(response);

            tbody.empty();
            tbody2.empty();

            var tahun = 2019;
            var tahun2 = 2024;

            $.each(response.limaDataAkhir, function (index, item) {
                if (tahun <= 2023) {
                    tbody.append(
                        "<tr>" +
                            "<td>" +
                            tahun +
                            "</td>" +
                            "<td>" +
                            parseFloat(item).toFixed(2) +
                            "</td>" +
                            "<td>" +
                            response.forecast[index].toFixed(2) +
                            "</td>" +
                            "<td>" +
                            response.error[index].toFixed(2) +
                            "</td>" +
                            "<td>" +
                            Math.abs(response.error[index]).toFixed(2) +
                            "</td>" +
                            "<td>" +
                            response.MAPE[index].toFixed(2) * 100 +
                            "</td>" +
                            "</tr>"
                    );

                    tahun++;
                }
                if (tahun2 <= 2029) {
                    response.nextForecast.forEach((forecastValue, index) => {
                        if (count >= 5) return;
                        let penilaian = getPenilaian(
                            response.NamaRasio,
                            forecastValue,
                            tahun2
                        );

                        tbody2.append(
                            "<tr>" +
                                "<td>" +
                                tahun2 +
                                "</td>" +
                                "<td>" +
                                forecastValue.toFixed(2) +
                                "</td>" +
                                "<td>" +
                                penilaian +
                                "</td>" +
                                "</tr>"
                        );

                        tahun2++;
                        count++;
                    });
                }
                // Fungsi untuk mendapatkan penilaian berdasarkan rasio
                function getPenilaian(namaRasio, nilaiForecast, tahun) {
                    let nilai = nilaiForecast.toFixed(2);

                    if (namaRasio === "Rasio Lancar" && nilai < 200) {
                        if (nilai < 200) {
                            return (
                                "Berdasarkan hasil prediksi rasio lancar PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dianggap tidak likuid sehingga perusahaan dianggap kurang mampu untuk melunasi utang jangka pendeknya dikarenakan nilai standar untuk rasio lancar adalah 200%."
                            );
                        } else {
                            return (
                                "Berdasarkan hasil prediksi rasio lancar PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dianggap likuid sehingga perusahaan dianggap mampu untuk melunasi utang jangka pendeknya dikarenakan nilai standar untuk rasio lancar adalah 200%."
                            );
                        }
                    }

                    if (namaRasio === "Rasio Sangat Lancar") {
                        if (nilai < 150) {
                            return (
                                "Berdasarkan hasil prediksi rasio sangat lancar PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dianggap tidak likuid sehingga perusahaan dianggap kurang mampu untuk melunasi utang jangka pendeknya dikarenakan nilai standar untuk rasio sangat lancar adalah 150%."
                            );
                        } else {
                            return (
                                "Berdasarkan hasil prediksi rasio sangat lancar PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dianggap likuid sehingga perusahaan dianggap mampu untuk melunasi utang jangka pendeknya dikarenakan nilai standar untuk rasio sangat lancar adalah 150%."
                            );
                        }
                    }

                    if (namaRasio === "ROI") {
                        if (nilai < 30) {
                            return (
                                "Berdasarkan hasil prediksi Rasio Return On Investment PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dikatakan tidak baik karena nilai standar untuk ROI adalah 30%."
                            );
                        } else {
                            return (
                                "Berdasarkan hasil prediksi Rasio Return On Investment PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dikatakan baik karena nilai standar untuk ROI adalah 30%."
                            );
                        }
                    }

                    if (namaRasio === "ROE") {
                        if (nilai < 40) {
                            return (
                                "Berdasarkan hasil prediksi Rasio Return On Equity PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dikatakan tidak baik karena nilai standar untuk ROE adalah 40%."
                            );
                        } else {
                            return (
                                "Berdasarkan hasil prediksi Rasio Return On Equity PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dikatakan baik karena nilai standar untuk ROE adalah 40%."
                            );
                        }
                    }

                    if (namaRasio === "Rasio Utang Terhadap Aset") {
                        if (nilai < 35) {
                            return (
                                "Berdasarkan hasil prediksi Rasio Utang Terhadap Aset PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dikatakan baik karena nilai standar untuk rasio ini adalah 35%. Hal ini dikarenakan apabila menginginkan nilai rasio rendah maka nilai aset yang disiapkan harus tinggi. Keamanan perusahaan akan terjamin apabila perusahaan hanya mempunyai utang yang sedikit."
                            );
                        } else {
                            return (
                                "Berdasarkan hasil prediksi Rasio Utang Terhadap Aset PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dikatakan buruk karena nilai standar untuk rasio ini adalah 35%. Hal ini dikarenakan apabila nilai rasio tinggi maka perusahaan akan menanggung risiko yang besar terkait pelunasan utangnya."
                            );
                        }
                    }

                    if (namaRasio === "Rasio Utang Terhadap Ekuitas") {
                        if (nilai < 90) {
                            return (
                                "Berdasarkan hasil prediksi Rasio Utang Terhadap Ekuitas PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dikatakan baik karena nilai standar untuk rasio ini adalah 90%. Hal ini dikarenakan Apabila nilai rasio ini rendah, maka kemampuan untuk melunasi kewajiban jangka panjangnya semakin baik"
                            );
                        } else {
                            return (
                                "Berdasarkan hasil prediksi Rasio Utang Terhadap Ekuitas PT Adhi Karya Tbk tahun " +
                                tahun +
                                " maka dapat dikatakan tidak baik karena nilai standar untuk rasio ini adalah 90%. Hal ini dikarenakan apabila nilai rasio ini tinggi akan mereduksi laba perusahaan, karena harus dikurangi dengan biaya bunga dari kewajibannya"
                            );
                        }
                    }
                }
            });
            tfoot.empty();
            tfoot.append(
                "<tr>" +
                    "<td colspan='5' style='text-align: right; font-weight:700;'>" +
                    "Rata - Rata" +
                    "</td>" +
                    "<td style='font-weight:700;'>" +
                    response.averageMAPE.toFixed(2) +
                    "</td></tr>"
            );
            $("#TitlePrediksi").text("Prediksi " + response.NamaRasio);
        },
        error: function (xhr, status, error) {
            console.error("Error fetching forecast data:", error);
        },
    });
});
