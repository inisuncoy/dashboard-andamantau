import Chart from "chart.js/auto";

const labels = ["January", "February", "March", "April", "May", "June"];
const data = {
    labels: labels,
    datasets: [
        {
            label: "Dataset 1",
            data: [0, 10, 5, 2, 20, 45, 50],
            borderColor: "rgb(255, 99, 132)",
            backgroundColor: "rgb(255, 99, 132)",
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

new Chart(document.getElementById("dsLineChart"), config);
