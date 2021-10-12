<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard : {{ Auth::user()->status->status }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
    var datas = {!! json_encode($datas, JSON_HEX_TAG) !!}

    var ctx = document.getElementById('myChart').getContext('2d');
    var chartLabels = []
    var chartDatas = []

    datas.forEach(function(data) { 
        chartLabels.push(data.category)
        chartDatas.push(data.number)
    });

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'My First Dataset',
                data: chartDatas,
                backgroundColor: [
                'rgb(255, 0, 0)',
                'rgb(255, 128, 0)',
                'rgb(255, 255, 0)',
                'rgb(128, 255, 0)',
                'rgb(0, 255, 255)',
                'rgb(0, 0, 255)',
                'rgb(127, 0, 255)',
                'rgb(128, 128, 128)',
                'rgb(255, 0, 255)',
                'rgb(02, 51, 0)'
                ],
                hoverOffset: 4
            }]
        },
    });
</script>
</x-app-layout>
