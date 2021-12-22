@extends('inti.main.header')
@section('konten')
 <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                   @foreach($history as $a)
                       {{ $a->harga }}
                   @endforeach
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
            text: "Layanan"              
        },
        data: [              
        {
            // Change type to "doughnut", "line", "splineArea", etc.
            type: "column",
            dataPoints: [
                { label: "apple",  y: 10  },
                { label: "orange", y: 15  },
                { label: "banana", y: 25  },
                { label: "mango",  y: 30  },
                { label: "grape",  y: 28  }
            ]
        }
        ]
    };
    
    $("#chartContainer").CanvasJSChart(options);
    }
    </script>
    
@endsection

