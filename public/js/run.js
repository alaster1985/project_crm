var groupSelector = document.getElementById("groups")
var direction = document.getElementById("direction")  //Формировка Селекта снаправлениями
var div = document.getElementById("ext")
var searchfield = document.getElementById("search")
var findResult = document.getElementById("findResult")

var searchall = document.getElementById("searchall")
var findAllResult = document.getElementById("findAllResult")
var studext = document.getElementById("stres")
var extData = {}

var studdata = {}
//var selectedGruppaEdit;
var studgroups = document.getElementById("studgroups")
var urlPart = window.location.pathname.split('/')
var selectlearn = document.getElementById("learningstatus");
var selectemployment = document.getElementById("employmentstatus");
var resetStudents = document.getElementById("resetstudents");
var resetEmloyees = document.getElementById("resetemployees");
var resetCompanies = document.getElementById("resetcompanies");
var statvz = document.getElementById("statvz");
var statsort = document.getElementById("statsort");

// var alevel = document.getElementById("alevelTable");


var accordionmenu = document.getElementById("accordionmenu");

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

function jsonPostEdit(url, id, field, counter = null) {
    return new Promise((resolve, reject) => {
        var x = new XMLHttpRequest(),
            token = document.querySelector('meta[name="csrf-token"]').content;
        x.open("POST", url, true);
        x.setRequestHeader('Content-Type', 'application/json');
        x.setRequestHeader('X-CSRF-TOKEN', token);
        x.send(JSON.stringify({"id": id, "field": field, "counter": counter}))
        x.onreadystatechange = () => {
            if (x.readyState == XMLHttpRequest.DONE && x.status == 200){
                resolve(x.responseText)
            }
        }
    })
}

