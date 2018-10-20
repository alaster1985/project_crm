$(".names-select2").select2({
    minimumInputLength: 1, // минимальная длинна ввода, после которой можно отправлять запрос на сервер
    allowClear: true,
    placeholder: "Enter name to search",
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
            console.log(obj.name);
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
            console.log(extData)
            for (var gr = 0; gr < extData.length; gr++) {
                var u = document.createElement('a');
                u.setAttribute('href', extData[gr]['id']);
                u.innerHTML = extData[gr]['name'];
                findResult.appendChild(u)
                findResult.appendChild(document.createElement('br'))
            }
        }
    }
});

// searchall.addEventListener("keyup", function addelement() {
//     if (searchall.value != "") {
//         document.getElementById('findAllResult').innerHTML = ''
//         jsonPost(location.origin+"/employees/findall", searchall.value)
//             .then(response => fun(JSON.parse(response)))
//             .then(fun(extData))
//
//         function fun(extData) {
//             for (var gr = 0; gr < extData.length; gr++) {
//                 var u = document.createElement('a');
//                 u.setAttribute('href', extData[gr]['id']);
//                 u.innerHTML = extData[gr]['name'];
//                 findAllResult.appendChild(u)
//                 findAllResult.appendChild(document.createElement('br'))
//             }
//         }
//     }
// });
