$(".names-select2").select2({
    minimumInputLength: 1, // минимальная длинна ввода, после которой можно отправлять запрос на сервер
    allowClear: true,
    placeholder: "Поиск по сайту",
    ajax: {
//        url: location.origin+"/employees/findall", // адрес бэкэн-обработчика (url)
        url: location.origin+"/employees/findstudents", // адрес бэкэн-обработчика (url)
        delay: 250,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        dataType: "json",
        cache: true,
        // что будем отправлять на сервер в запросе
        data: function (params) {
            var  obj = {
                key: params.term
            };
            // console.log(obj.name);
            /* obj.term --то что ввёл пользователь,
             * но вы можете и обработать это ввод пред тем
             * как отправлять на сервер,
             * может добавитьдоп. парамерты */

            return obj;
        },
        /* обрабатываем то, что пришло с сервера
         * (напр. просто берём подмассив) */

        processResults: function fun(extData, param) {
            let newdata = {};

            function unique(arr) {
                var result = [];
                nextInput:
                    for (var i = 0; i < arr.length; i++) {
                        var str = arr[i]; // для каждого элемента
                        for (var j = 0; j < result.length; j++) { // ищем, был ли он уже?
                            if (result[j] == str) continue nextInput; // если да, то следующий
                        }
                        result.push(str);
                    }

                return result;
            }
            newdata = unique(extData)

            document.getElementById('findResult').innerHTML = ''

            for (var gr = 0; gr < newdata.length; gr++) {
                var u = document.createElement('a');
                u.setAttribute('href', 'students/show/'+newdata[gr]['id']);
                u.innerHTML = newdata[gr]['name'];
                findResult.appendChild(u)
                findResult.appendChild(document.createElement('br'))

            }
        }
    }
});

