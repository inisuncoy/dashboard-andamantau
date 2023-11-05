import Chart from "chart.js/auto";

const datasets = chartDataPendapatanPerHariSatuMinggu.datasets;

const labels = [
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu",
    "Minggu"
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
                text: "Grafik Pendapatan UMKM Per Minggu",
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
        },
    },
};

new Chart(document.getElementById("dashboardLineChartWeek"), config);
