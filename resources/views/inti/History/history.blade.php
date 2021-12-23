@extends('inti.main.header')
@section('konten')
 <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                  
                       Total Pendapatan : Rp.{{ number_format($history) }}
                  
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
    window.onload = function () {
    var history = [];
    var history = '{{ $history }}';
    console.log(history);
    //Better to construct options first and then pass it as a parameter
    var options = {
        title: {
            text: "History Pemesanan Hari Ini"              
        },
        data: [              
        {
            // Change type to "doughnut", "line", "splineArea", etc.
            type: "column",
            dataPoints: [
                { label: "Senin",  y: parseInt('{{$histori[1]['senin']}}')  },
                { label: "Selasa", y: parseInt('{{$histori[2]['selasa']}}')  },
                { label: "Rabu", y: parseInt('{{$histori[3]['rabu']}}')  },
                { label: "Kamis",  y: parseInt('{{$histori[4]['kamis']}}')  },
                { label: "Jumat",  y: parseInt('{{$histori[5]['jumat']}}')  },
                { label: "Sabtu",  y: parseInt('{{$histori[6]['sabtu']}}')  },
                { label: "Minggu",  y: parseInt('{{$histori[0]['minggu']}}')  }
            ]
        }
        ]
    };
    
    $("#chartContainer").CanvasJSChart(options);
    }
    </script>
    
@endsection

