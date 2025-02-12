$(document).ready(function () {
    $("#tahun_id").change(function () {
        if ($(this).val() !== "Pilih...") {
            $("#filterForm").submit();
        }
    });

    $("#default").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var start = button.data("start");
        var end = button.data("end");
        var tahun = button.data("tahun");
        var kategori = button.data("kategori");
        var modal = $("#default");
        var tbody = modal.find("#modalContent tbody");

        tbody.empty();

        $.ajax({
            url:
                "/reports/neraca/details/" +
                start +
                "/" +
                end +
                "/" +
                tahun +
                "/" +
                kategori,
            method: "GET",
            success: function (data) {
                console.log(data);

                // Pastikan ada item dalam data
                if (data.items && data.items.length > 0) {
                    $.each(data.items, function (index, item) {
                        const kodeCoa = item.coa.kode
                            ? item.coa.kode.toString()
                            : "";
                        const indentStyle =
                            kodeCoa.slice(-1) === "0" &&
                            kodeCoa.slice(0, -1) !== "110" &&
                            kodeCoa.slice(0, -1) !== "121" &&
                            kodeCoa.slice(0, -1) !== "210"
                                ? "10px"
                                : kodeCoa.slice(-2) === "00"
                                ? "0"
                                : "30px";

                        var row = `
                            <tr>
                                <td>${kodeCoa}</td>
                                <td style="text-indent: ${indentStyle}">
                                    ${item.coa.nama}
                                </td>
                                <td class="text-end">${
                                    item.debit > 0
                                        ? "Rp " +
                                          new Intl.NumberFormat("id-ID").format(
                                              item.debit
                                          )
                                        : ""
                                }${
                                    item.kredit > 0
                                        ? "Rp (" +
                                          new Intl.NumberFormat("id-ID").format(
                                              item.kredit
                                          ) + ")"
                                        : ""
                                }</td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append(
                        '<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>'
                    );
                }

                modal.modal("show");
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
                tbody.append(
                    '<tr><td colspan="4" class="text-center">Error dalam mengambil data.</td></tr>'
                );
            },
        });
    });

    $("#defaultAktivitas").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var start = button.data("start");
        var end = button.data("end");
        var tahun = button.data("tahun");
        var kategori = button.data("kategori");
        var modal = $("#defaultAktivitas");
        var tbody = modal.find("#modalContent2 tbody");

        tbody.empty();

        $.ajax({
            url:
                "/reports/aktivitas/details/" +
                start +
                "/" +
                end +
                "/" +
                tahun +
                "/" +
                kategori,
            method: "GET",
            success: function (data) {
                console.log(data);

                // Pastikan ada item dalam data
                if (data.items && data.items.length > 0) {
                    $.each(data.items, function (index, item) {
                        const kodeCoa = item.coa.kode
                            ? item.coa.kode.toString()
                            : "";
                        const indentStyle =
                            kodeCoa.slice(-1) === "0" &&
                            kodeCoa.slice(0, -1) !== "410" &&
                            kodeCoa.slice(0, -1) !== "421" &&
                            kodeCoa.slice(0, -1) !== "610" &&
                            kodeCoa.slice(0, -1) !== "620"
                                ? "10px"
                                : kodeCoa.slice(-2) === "00"
                                ? "0"
                                : "30px";

                        var row = `
                            <tr>
                                <td>${kodeCoa}</td>
                                <td style="text-indent: ${indentStyle}">
                                    ${item.coa.nama}
                                </td>
                                <td class="text-end">${
                                    item.debit > 0
                                        ? "Rp " +
                                          new Intl.NumberFormat("id-ID").format(
                                              item.debit
                                          )
                                        : ""
                                }</td>
                                <td class="text-end">${
                                    item.kredit > 0
                                        ? "Rp " +
                                          new Intl.NumberFormat("id-ID").format(
                                              item.kredit
                                          )
                                        : ""
                                }</td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append(
                        '<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>'
                    );
                }

                modal.modal("show");
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
                tbody.append(
                    '<tr><td colspan="4" class="text-center">Error dalam mengambil data.</td></tr>'
                );
            },
        });
    });

    $("#defaultArusKas").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var start = button.data("start");
        var tahun = button.data("tahun");
        var modal = $("#defaultArusKas");
        var tbody = modal.find("#modalContent3 tbody");

        tbody.empty();

        $.ajax({
            url: "/reports/arusKas/details/" + start + "/" + tahun,
            method: "GET",
            success: function (data) {
                console.log(data);

                // Pastikan ada item dalam data
                if (data.items && data.items.length > 0) {
                    $.each(data.items, function (index, item) {
                        const kode = item.kode ? item.kode.toString() : "";
                        const indentStyle =
                            kode.slice(-1) === "0" &&
                            kode.slice(0, -1) !== "110" &&
                            kode.slice(0, -1) !== "121" &&
                            kode.slice(0, -1) !== "210" &&
                            kode.slice(0, -1) !== "220"
                                ? "10px"
                                : kode.slice(-2) === "00"
                                ? "0"
                                : "30px";

                        var row = `
                                <tr>
                                    <td>${kode}</td>
                                    <td style="text-indent: ${indentStyle}">
                                        ${item.nama}
                                    </td>
                                    <td class="text-end">
                                        ${
                                            item.debit > 0
                                                ? "Rp " +
                                                  new Intl.NumberFormat(
                                                      "id-ID"
                                                  ).format(item.debit)
                                                : item.kredit > 0
                                                ? "Rp (" +
                                                  new Intl.NumberFormat(
                                                      "id-ID"
                                                  ).format(item.kredit) +
                                                  ")"
                                                : "-"
                                        }
                                    </td>
                                </tr>
                            `;

                        tbody.append(row);
                    });
                } else {
                    tbody.append(
                        '<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>'
                    );
                }

                modal.modal("show");
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
                tbody.append(
                    '<tr><td colspan="4" class="text-center">Error dalam mengambil data.</td></tr>'
                );
            },
        });
    });
});
