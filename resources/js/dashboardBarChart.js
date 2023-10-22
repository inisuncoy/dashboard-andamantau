import Chart from "chart.js/auto";

const datasets = chartDataPeningkatanPesananPerBulanSatuTahun.datasets;

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
            label: "Total Pesanan",
            data: datasets,
            borderColor: "#FF0000",
            backgroundColor: "#EA6346",
        },
    ],
};

const config = {
    type: "bar",
    data: data,
    options: {
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
            legend: {
                position: "top",
                display: true,
            },
            title: {
                display: true,
                text: "Grafik Peningkatan Pesanan UMKM",
                align: "center",
                font: {
                    size: 22
                },
                color: '#000000',
            },
        },
    },
};

new Chart(document.getElementById("dashboardBarChart"), config);
