import Chart from "chart.js/auto";

const labels = ["January", "February", "March", "April", "May", "June"];

const data = {
    labels: ["Red", "Blue", "Yellow"],
    datasets: [
        {
            label: "My First Dataset",
            data: [300, 50, 100],
            backgroundColor: ["#4260FF", "#300FF8", "#1B00A1"],
            hoverOffset: 4,
        },
    ],
};

const config = {
    type: "pie",
    data: data,
    options: {
        plugins: {
            legend: {
                display: false,
            },
        },
    },
};

new Chart(document.getElementById("piechart"), config);
