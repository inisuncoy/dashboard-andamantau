import Chart from "chart.js/auto";

const pendapatanDatasets = chartDataPendapatanPerBulanSatuTahun.datasets;
const pengeluaranDatasets = chartDataPengeluaranPerBulanSatuTahun.datasets;

const labels = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
];
const data = {
    labels: labels,
    datasets: [
        {
            label: "Total Pengeluaran",
            data: pengeluaranDatasets,
            borderColor: "#FF0000",
            backgroundColor: "#FF0000",
        },
        {
            label: "Total Pendapatan",
            data: pendapatanDatasets,
            borderColor: "#00B9E3",
            backgroundColor: "#00B9E3",
        },
    ],
};

const config = {
    type: "line",
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: "top",
                display: true,
            },
            title: {
                display: true,
                text: "Laporan Per Bulan",
                align: "center",
                font: {
                    size: 30
                },
                color: '#000000',
            },
        },
        scales: {
            y: { // defining min and max so hiding the dataset does not change scale range
              min: 0,
            }
        }
    },
};

new Chart(document.getElementById("twoLineChart"), config);
