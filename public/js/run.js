var groupSelector = document.getElementById("groups")
var direction = document.getElementById("direction")  //Формировка Селекта снаправлениями
var div = document.getElementById("ext")
var searchfield = document.getElementById("search")
var findResult = document.getElementById("findResult")
var extData = {}

function httpGet(url) {
    return new Promise(function (resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function () {
            if (this.status == 200) {
                resolve(this.responseText);
            }
        };
        xhr.send();
    });
}

httpGet('http://public/employees/directions')
    .then(response => fun(JSON.parse(response)))
    .then(fun(extData))

function fun(extData) {
    for (let key in extData) {
        var ll = new Option(extData[key].direction, `${key}`);
        direction.appendChild(ll)
    }
}

function jsonPost(url, data) {
    return new Promise((resolve, reject) => {
        var x = new XMLHttpRequest(),
        token = document.querySelector('meta[name="csrf-token"]').content;
        x.open("POST", url, true);
        x.setRequestHeader('Content-Type', 'application/json');
        x.setRequestHeader('X-CSRF-TOKEN', token);
        x.send(JSON.stringify({key: data}))
        x.onreadystatechange = () => {
            if (x.readyState == XMLHttpRequest.DONE && x.status == 200){
                resolve(x.responseText)
            }
        }
    })
}

searchfield.addEventListener("keyup", function addelement() {
    if (searchfield.value != "") {
        document.getElementById('findResult').innerHTML = ''
        jsonPost('http://public/employees/findstudents', searchfield.value)
            .then(response => fun(JSON.parse(response)))
            .then(fun(extData))

        function fun(extData) {
            console.log(extData)
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

direction.onchange = function () {
    var directionSelected = direction.options[direction.selectedIndex].value
    groupSelector.options.length = 0;
    httpGet('http://public/employees/groups')
        .then(response => fun(JSON.parse(response)))
        .then(fun(extData))

    function fun(extData) {
        for (var gr = 0; gr < extData.length; gr++) {
            if (((extData[gr]['direction_id']) - 1) == (directionSelected)) {
                groupElement = new Option(extData[gr]['group_name'], extData[gr]['id']);
                groupSelector.appendChild(groupElement)
            }
        }
    }
}

groupSelector.onchange = function () {
    var groupSelected = groupSelector.options[groupSelector.selectedIndex].value
//    console.log()
    //In GROUPSELECTED - ID of the group
    httpGet('http://public/employees/students')
        .then(response => fun(JSON.parse(response)))
        .then(fun(extData))

    function fun(extData) {
//        console.log((extData))
        for (var gr = 0; gr < extData.length; gr++) {

            if ((extData[gr]['group_id']) == (groupSelected)) {
                var a = document.createElement('a');

                a.setAttribute('href', extData[gr]['person_id']);
                a.innerHTML = extData[gr]['name'];
                div.appendChild(a)
                div.appendChild(document.createElement('br'))
            }
        }
    }
}

// function jsonPost(url, data) {
//     return new Promise((resolve, reject) => {
//         var x = new XMLHttpRequest();
//         x.open("POST", url, true);
//         x.send(JSON.stringify(data))
//         x.onreadystatechange = () => {
//             if (x.readyState == XMLHttpRequest.DONE && x.status == 200){
//                 resolve(JSON.parse(x.responseText))
//             }
//         }
//     })
// }

// fetch("localhost/json/",
//     {
//         headers: {
//             'Accept': 'application/json',
//             'Content-Type': 'application/json'
//         },
//         method: "POST",
//         body: JSON.stringify({a: 1, b: 2})
//     })
//     .then(function(res){ console.log(res) })
