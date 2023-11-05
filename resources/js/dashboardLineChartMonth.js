import Chart from "chart.js/auto";

const datasets = chartDataPendapatanPerBulanSatuTahun.datasets;

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
            label: "Total Pendapatan",
            data: datasets,
            borderColor: "#FF0000",
            backgroundColor: "#FF0000",
        },
    ],
};

const config = {
    type: "line",
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: "top",
                display: true,
            },
            title: {
                display: true,
                text: "Grafik Pendapatan UMKM Per Bulan",
                align: "start",
                font: {
                    size: 22
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

new Chart(document.getElementById("dashboardLineChartMonth"), config);
