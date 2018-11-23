$(".names-select2").select2({
    minimumInputLength: 1, // минимальная длинна ввода, после которой можно отправлять запрос на сервер
    allowClear: true,
    placeholder: "Поиск по сайту",
    ajax: {
        url: location.origin+"/employees/findall", // адрес бэкэн-обработчика (url)
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
            document.getElementById('findResult').innerHTML = ''
            // console.log(extData)
            for (var gr = 0; gr < extData.length; gr++) {
                var u = document.createElement('a');
                u.setAttribute('href', 'students/show/'+extData[gr]['id']);
                u.innerHTML = extData[gr]['name'];
                findResult.appendChild(u)
                findResult.appendChild(document.createElement('br'))
            }
        }
    }
});

