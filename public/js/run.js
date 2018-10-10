var groupSelector = document.getElementById("groups")
var direction = document.getElementById("direction")  //Формировка Селекта снаправлениями
var div = document.getElementById("ext")
var searchfield = document.getElementById("search")
var findResult = document.getElementById("findResult")
var extData = {}
var studdata = {}
var selectedGruppaEdit;
var studgroups = document.getElementById("studgroups")

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
// SEARCH FIELD
searchfield.addEventListener("keyup", function addelement() {
    if (searchfield.value != "") {
        document.getElementById('findResult').innerHTML = ''
        jsonPost('http://public/employees/findstudents', searchfield.value)
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
    //In GROUPSELECTED - ID of the group
    httpGet('http://public/employees/students')
        .then(response => fun(JSON.parse(response)))
        .then(fun(extData))

    function fun(extData) {
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

// SECTION VIEW AND EDIT !!!!!-> STUDENTS <-!!!! INFORMATION

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


// FIELD EDIT PERSONAL DATA

var urlPart = window.location.pathname.split('/')

jsonPost('http://public/students/studedition', urlPart[3])
    .then(response => studedit(JSON.parse(response)))
    .then(studedit(someth))

function studedit(studdata) {
    console.log(studdata)
    var studparam = document.getElementById('studParam');  //div

    var studnamehtml = document.createElement('p');  //p in div
    var studaddresshtml = document.createElement('p');  //p in div
    var studcommenthtml = document.createElement('p');  //p in div
    var studgroup_namehtml = document.createElement('p');  //p in div

    studnamehtml.innerHTML = studdata['name'] + '<button id="stname">Press to edit</button>';
    studaddresshtml.innerHTML = studdata['address'] + '<button id="staddress">Press to edit</button>';
    studcommenthtml.innerHTML = studdata['comment'] + '<button id="stcomment">Press to edit</button>';
    studgroup_namehtml.innerHTML = studdata['group_name'] + '<button id="stgroup_name">Press to edit</button>';

    studparam.appendChild(studnamehtml);
    studparam.appendChild(studaddresshtml);
    studparam.appendChild(studcommenthtml);
    studparam.appendChild(studgroup_namehtml);

    document.getElementById('stname').onclick = function () {
        studnamehtml.innerHTML = "<input type='text' id='stnameInput' value=" + studdata['name'] + "><button id='stname'>Press to edit</button>";
        studaddresshtml.innerHTML = "<input type='text' id='staddressInput' value=" + studdata['address'] + "><button id='staddress'>Press to edit</button>";
        studcommenthtml.innerHTML = "<input type='text' id='stcommentInput' value=" + studdata['comment'] + "><button id='stcomment'>Press to edit</button>";

        studgroup_namehtml.innerHTML = "<input type='text' id='stgroup_nameInput' value=" + studdata['group_name'] + "><button id='stgroup_name'>Press to edit</button>";


        httpGet('http://public/employees/groups')
            .then(response => fun(JSON.parse(response)))
            .then(fun(extData))

        function fun(extData) {
            var selectList = document.createElement('select');
            for (let gr = 0; gr < extData.length; gr++) {
                   let studgroupElement = new Option(extData[gr]['group_name'], extData[gr]['id']);
                    selectList.appendChild(studgroupElement);
                    document.getElementById('studgroups').appendChild(selectList)
            }
//            selectedGruppaEdit = selectList.options[selectList.selectedIndex].value;
            selectList.onchange = ()=> {selectedGruppaEdit = selectList.options[selectList.selectedIndex].value
            console.log(selectedGruppaEdit)};
        }

        studparam.appendChild(studnamehtml)
        studparam.appendChild(studaddresshtml)
        studparam.appendChild(studcommenthtml);
        studparam.appendChild(studgroup_namehtml);
        document.getElementById('stname').onclick = function () {

            console.log(selectedGruppaEdit);

            jsonPostEdit('http://public/students/addata', urlPart[3], document.getElementById('stnameInput').value)
            jsonPostEdit('http://public/students/chgroup', urlPart[3], document.getElementById('stgroup_nameInput').value)

           location.reload();
        }
    }
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
