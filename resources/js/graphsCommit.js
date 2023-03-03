const arr = @json($arrayCommits);

const arrFormated = arr.date;
const arrCountDates = [];

arrFormated.forEach(function (x) { arrCountDates[x] = (arrCountDates[x] || 0) + 1; });

const eixoX = [];
const eixoY = [];

Object.keys(arrCountDates).forEach(key => {
    eixoX.push(key)
    eixoY.push(arrCountDates[key])
});

const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: eixoX,
        datasets: [{
            label: 'Commits',
            data: eixoY,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});