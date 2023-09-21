import Chart from "chart.js/auto";

const labels = ["jan", "feb", "mar", "apr", "mei"];
const data = {
    labels: labels,
    datasets: [
        {
            label: "Dataset 1",
            data: [10, 20, 30, 20, 50],
            borderColor: "rgb(255, 99, 132)",
            backgroundColor: "rgb(255, 99, 132)",
        },
    ],
};

const config = {
    type: "bar",
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

new Chart(document.getElementById("dsBarChart"), config);
