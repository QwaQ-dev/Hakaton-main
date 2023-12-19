const wheel = document.getElementById("wheel");
const spinBtn = document.getElementById("spin-btn");
const addNumberBtn = document.getElementById("add-number-btn");
const numberInput = document.getElementById("number-input");
const finalValue = document.getElementById("final-value");

const data = [];
const pieColors = ["#202020", "#202020", "#202020", "#202020", "#202020"];

let myChart;

function createChart() {
    myChart = new Chart(wheel, {
        plugins: [ChartDataLabels],
        type: "pie",
        data: {
            labels: data,
            datasets: [
                {
                    backgroundColor: pieColors,
                    data: Array(data.length).fill(1), // Each data point represents one segment
                },
            ],
        },
        options: {
            responsive: true,
            animation: { duration: 0 },
            plugins: {
                tooltip: false,
                legend: {
                    display: false,
                },
                datalabels: {
                    color: "#ffffff",
                    formatter: (_, context) => context.chart.data.labels[context.dataIndex],
                    font: { size: 24 },
                },
            },
        },
    });
}

function updateChart() {
    myChart.data.labels = data;
    myChart.data.datasets[0].data = Array(data.length).fill(1);
    myChart.update();
}

function addNumber() {
    const inputValue = parseInt(numberInput.value);
    if (!isNaN(inputValue)) {
        data.push(inputValue);
        updateChart();
    }
    numberInput.value = ""; // Clear the input field
}

function valueGenerator(angleValue) {
    finalValue.innerHTML = `<p>Значение: ${data[angleValue % data.length]}</p>`;
}

let count = 0;
let resultValue = 101;

spinBtn.addEventListener("click", () => {
    spinBtn.disabled = true;
    finalValue.innerHTML = `<p>Удачи!</p>`;

    let randomDegree = Math.floor(Math.random() * (355 - 0 + 1) + 0);
    let rotationInterval = window.setInterval(() => {
        myChart.options.rotation = myChart.options.rotation + resultValue;
        myChart.update();

        if (myChart.options.rotation >= 360) {
            count += 1;
            resultValue -= 5;
            myChart.options.rotation = 0;
        } else if (count > 15 && myChart.options.rotation == randomDegree) {
            valueGenerator(randomDegree);
            data.splice(randomDegree % data.length, 1); // Remove the selected value
            updateChart();
            clearInterval(rotationInterval);
            count = 0;
            resultValue = 101;
            spinBtn.disabled = false;
        }
    }, 15);
});

addNumberBtn.addEventListener("click", addNumber);

// Initialize the chart when the page loads
createChart();
