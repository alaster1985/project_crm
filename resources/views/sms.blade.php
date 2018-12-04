@extends('layouts.nav')
<div>

    <title>Статистика</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.google.com/jsapi"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @csrf
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <script type="text/javascript">

    function getgoogle(){
            let self = this;

           $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: location.origin + "/students/studentsalloutput",
                data: JSON.stringify([1,4,7]),
                contentType: "application/json",
                dataType: "json",
                success: function(dat){

                    var backend = 0;
                    var frontend = 0;
                    var fullStack = 0;
                    var sales = 0;
                    var PM = 0;
                    var design = 0;
                    var backendemployed = 0;
                    var frontendemployed = 0;
                    var fullStackemployed = 0;
                    var salesemployed = 0;
                    var PMemployed = 0;
                    var designemployed = 0;

                    for(let i=0; i< dat.length; i++ ){

                        if (dat[i]['direction'] =='backend' ) {
                            if (dat[i]['employment_status'] == 'employed') { backendemployed++; }
                            backend++;
                        }
                        if (dat[i]['direction'] =='frontend' ) {
                            if (dat[i]['employment_status'] == 'employed') { frontendemployed++; }
                            frontend++;
                        }
                        if (dat[i]['direction'] =='fullStack' ) {
                            if (dat[i]['employment_status'] == 'employed') { fullStackemployed++; }
                            fullStack++;
                        }
                        if (dat[i]['direction'] =='sales' ) {
                            if (dat[i]['employment_status'] == 'employed') { salesemployed++; }
                            sales++;
                        }
                        if (dat[i]['direction'] =='PM' ) {
                            if (dat[i]['employment_status'] == 'employed') { PMemployed++; }
                            PM++;
                        }
                        if (dat[i]['direction'] =='design' ) {
                            if (dat[i]['employment_status'] == 'employed') { designemployed++; }
                            design++;
                        }
                    }

                    // google.load("visualization", "1", {packages: ["corechart"]});
                    // google.setOnLoadCallback(drawChart);
                    google.charts.load("visualization", "1", {packages: ["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['directions', 'quantity'],
                            ['backend', backend],
                            ['frontend', frontend],
                            ['fullStack', fullStack],
                            ['sales', sales],
                            ['PM', PM],
                            ['design', design],
                        ]);
                        var data1 = google.visualization.arrayToDataTable([
                            ['Direction', 'Backend', 'Frontend', 'Fullstack', 'Sales', 'PM', 'Design'],
                            ['Directions', backendemployed, frontendemployed,fullStackemployed,
                                salesemployed, PMemployed, designemployed]
                        ]);
                        var options = {
                            title: 'На сегодняшний день студентами А-левел являются '+ dat.length+ ' человек',
                            is3D: true,
                            pieResidueSliceLabel: 'Остальное'
                        };
                        var options1 = {
                            title : 'Employeed students',
                            vAxis: {title: 'Persons'},
                            // hAxis: {title: 'Direction'},
                            seriesType: 'bars',
                            series: {5: {type: 'line'}}
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('circle'));
                        var chart1 = new google.visualization.ComboChart(document.getElementById('chart_div'));

                        chart.draw(data, options);
                        chart1.draw(data1, options1);
                    }
                },
                failure: function(errMsg) {
                    //
                }
            })
        }
        getgoogle();
    </script>

    <div class="row">
        <div class="col-md-6 col-sm-6" id="circle" style="width: 50%; height: 90%;"></div>
        <div class="col-md-6 col-sm-6" id="chart_div" style="width: 50%; height: 90%;"></div>
    </div>
</div>
