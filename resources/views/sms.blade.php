@extends('layouts.nav')
<div>

    <title>Статистика</title>
    <script src="https://www.google.com/jsapi"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @csrf
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <script>

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

                    let s;
                    var backend = 0;
                    var frontend = 0;
                    var fullStack = 0;
                    var sales = 0;
                    var PM = 0;
                    var design = 0;

                    for(let i=0; i< dat.length; i++ ){

                        if (dat[i]['direction'] =='backend' ) {
                            backend++;
                        }
                        if (dat[i]['direction'] =='frontend' ) {
                            frontend++;
                        }
                        if (dat[i]['direction'] =='fullStack' ) {
                            fullStack++;
                        }
                        if (dat[i]['direction'] =='sales' ) {
                            sales++;
                        }
                        if (dat[i]['direction'] =='PM' ) {
                            PM++;
                        }
                        if (dat[i]['direction'] =='design' ) {
                            design++;
                        }
                    }

                    google.load("visualization", "1", {packages: ["corechart"]});
                    google.setOnLoadCallback(drawChart);

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
                        var options = {
                            title: 'На сегодняшний день студентами А-левел являются 100500человек',
                            is3D: true,
                            pieResidueSliceLabel: 'Остальное'
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('circle'));
                        chart.draw(data, options);
                    }
                },
                failure: function(errMsg) {
                    //
                }
            })
        }
        getgoogle();
    </script>




    <script src="https://www.google.com/jsapi"></script>
    <script>
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);


        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['employment_status', 'employed', 'in_search', 'not_relevant_in_IT', 'refused','in_IT_not_in_direction','Other'],
                ['2018', 20, 30, 40, 50, 70, 10],
                ['2017', 50, 30, 50, 10, 40, 0],
                ['2016', 10, 9, 40, 70, 5, 70]
            ]);
            var options = {
                title: 'Статистика по трудоустройству',
                hAxis: {title: 'Год'},
                vAxis: {title: 'Человек'}
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('employment'));
            chart.draw(data, options);
        }
    </script>

    <div class="row">
    <div class="col-md-6 col-sm-6" id="circle" style="width: 500px; height: 400px;"></div>
    <div class="col-md-6 col-sm-6" id="employment" style="width: 500px; height: 400px;"></div>
    </div>
</div>
{{--
<div>
<h2>Отправка Сообщений </h2>
<form action="{{Route('sendSMS')}}" method="post">
    @csrf
    Введите сообщение:<br>
    <textarea placeholder="Message" name="msg"></textarea><br>
    <input type="submit" value="Отправить">
</form>
</div>--}}
