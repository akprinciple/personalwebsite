<div class="col-md-9 p-2">
<canvas id="graphCanvas"></canvas>
</div>

<script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].date);
                        marks.push(data[i].ip);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Views',
                                backgroundColor: 'darkorange',
                                borderColor: 'lightblue',
                                hoverBackgroundColor: '#cc7000',
                                hoverBorderColor: 'lightblue',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
