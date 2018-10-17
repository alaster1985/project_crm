
searchfield.addEventListener("keyup", function addelement() {
    if (searchfield.value != "") {
        document.getElementById('findResult').innerHTML = ''
        jsonPost(location.origin+"/employees/findstudents", searchfield.value)
            .then(response => fun(JSON.parse(response)))
            .then(fun(extData))

        function fun(extData) {
            for (var gr = 0; gr < extData.length; gr++) {
                var u = document.createElement('a');
                u.setAttribute('href', extData[gr]['person_id']);
                u.innerHTML = extData[gr]['name'];
                findResult.appendChild(u)
                findResult.appendChild(document.createElement('br'))
            }
        }
    }
});

searchall.addEventListener("keyup", function addelement() {
    if (searchall.value != "") {
        document.getElementById('findAllResult').innerHTML = ''
        jsonPost(location.origin+"/employees/findall", searchall.value)
            .then(response => fun(JSON.parse(response)))
            .then(fun(extData))

        function fun(extData) {
            for (var gr = 0; gr < extData.length; gr++) {
                var u = document.createElement('a');
                u.setAttribute('href', extData[gr]['id']);
                u.innerHTML = extData[gr]['name'];
                findAllResult.appendChild(u)
                findAllResult.appendChild(document.createElement('br'))
            }
        }
    }
});
