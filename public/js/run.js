var groupSelector = document.getElementById("groups")
var direction = document.getElementById("direction")  //Формировка Селекта снаправлениями
var div = document.getElementById("ext")
var searchfield = document.getElementById("search")
var findResult = document.getElementById("findResult")
var extData = {}
var studdata = {}
var selectedGruppaEdit;
var studgroups = document.getElementById("studgroups")
var urlPart = window.location.pathname.split('/')

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

function jsonPostEdit(url, id, field) {
    return new Promise((resolve, reject) => {
        var x = new XMLHttpRequest(),
            token = document.querySelector('meta[name="csrf-token"]').content;
        x.open("POST", url, true);
        x.setRequestHeader('Content-Type', 'application/json');
        x.setRequestHeader('X-CSRF-TOKEN', token);
        x.send(JSON.stringify({"id": id, "field": field}))
        x.onreadystatechange = () => {
            if (x.readyState == XMLHttpRequest.DONE && x.status == 200){
                resolve(x.responseText)
            }
        }
    })
}





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
