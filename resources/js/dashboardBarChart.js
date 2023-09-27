import Chart from "chart.js/auto";

const labels = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "Mei",
    "Jun",
    "Jul",
    "Ags",
    "Sep",
    "Okt",
    "Nov",
    "Des",
];
const data = {
    labels: labels,
    datasets: [
        {
            label: "Dataset 1",
            data: [0, 10, 5, 2, 20, 45, 50, 10, 5, 2, 20, 10],
            borderColor: "#FF0000",
            backgroundColor: "#FF0000",
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
                display: false,
            },
            title: {
                display: false,
                text: "Chart.js Line Chart",
            },
        },
    },
};

new Chart(document.getElementById("dashboardBarChart"), config);