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
                text: "Total Pemasukan per Bulan",
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

new Chart(document.getElementById("pemasukanChart"), config);
