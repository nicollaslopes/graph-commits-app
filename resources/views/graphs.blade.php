<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!isset($arrayCommits['date']))
                    <center>
                        <h2>Este repositório não possui commits nos últimos 90 dias.</h2>
                    </center>
                    @endif
                    <center>
                        Exibindo a data dos commits dos últimos 90 dias do repositório <b> {{ $arrayCommits['name'] }} </b>
                    </center>
                    <a href="{{ url()->previous() }}" class="btn btn-primary float-right">
                        Voltar
                    </a>
                <body>
                    <canvas id="myChart" width="400" height="400"></canvas>
                </body>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ mix('js/graphsCommit.js') }}"></script>