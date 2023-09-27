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
        {
            label: "Dataset 2",
            data: [0, 5, 15, 20, 25, 10, 50, 20, 45, 50, 10, 5],
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
                display: false,
            },
            title: {
                display: false,
                text: "Chart.js Line Chart",
            },
        },
    },
};

new Chart(document.getElementById("twoLineChart"), config);
