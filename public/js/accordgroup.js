var mytable = document.getElementById('myTable').getElementsByTagName('tbody')[0];
var ll;
var globaldata = {};
var studdata = {};

function add(extData) {
    for (let gr = 0; gr < extData.length; gr++) {
        if (((extData[gr]['direction_id']) - 1) == (directionSelected)) {
            groupElement = new Option(extData[gr]['group_name'], extData[gr]['id']);
            groupSelector.appendChild(groupElement)
        }
    }
}

// Show all students when page loading
function allStudensShow() {
    jsonPost(location.origin + "/students/studentsalloutput", 5)
        .then(response => studget(JSON.parse(response)))
        .then(studget(studdata))
}
allStudensShow();
// Select-filter employment status
selectemployment.onchange = function(){
    let sel = selectemployment.selectedIndex;
    let options = selectemployment.options;

    // console.log(sel)
    // console.log(options)
    // // alert('Выбрана опция ' + options[sel].text + ' ' + options[sel].value);
    if (sel !== 0) {
        for (let key in globaldata) {
            if (options[sel].value !== globaldata[key]['employment_status']) {
                delete globaldata[key];
            }
        }
    }
    studget(globaldata);
}

// Select-filter learning status
selectlearn.onchange = function () {
    let sel = selectlearn.selectedIndex;
    let options = selectlearn.options;
    // alert('Выбрана опция ' + options[sel].text + ' ' + options[sel].value);
    if (sel !== 0) {
        for (let key in globaldata) {
            if (options[sel].value !== globaldata[key]['learning_status']) {
                delete globaldata[key];
            }
        }
    }
    studget(globaldata);
}

function studget(studdata) {
    // CLEAR TABLE BY DELETE ROWS
    globaldata = studdata;
    for (let i = document.getElementById('myTable').getElementsByTagName('tr').length - 1; i; i--) {
        document.getElementById('myTable').deleteRow(i);
    }
    var rowTable = 0;
    for (var gr in studdata) {
        var row = mytable.insertRow(rowTable);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = '<a href="students/show/' + studdata[gr]['person_id'] + '">' + studdata[gr]['name'] + '</a>';
        cell2.innerHTML = '<a href="students/show/' + studdata[gr]['person_id'] + '">' + studdata[gr]['group_name'] + '</a>';
        cell3.innerHTML = '<a href="students/show/' + studdata[gr]['person_id'] + '">' + studdata[gr]['direction'] + '</a>';
        cell4.innerHTML = '<a href="students/show/' + studdata[gr]['person_id'] + '">' + studdata[gr]['learning_status'] + '</a>';
        cell5.innerHTML = '<a href="students/show/' + studdata[gr]['person_id'] + '">' + studdata[gr]['employment_status'] + '</a>';
        rowTable++;
    }
}



var ind = document.querySelectorAll(".direct")
ind.forEach(studDirection)

function studDirection(item, id) {
    item.onclick = function () {
        jsonPost(location.origin + "/employees/studentsdirection", item.id)
            .then(response => studget(JSON.parse(response)))
            .then(studget(studdata))
    }
}

var navlink = document.querySelectorAll(".navlink");
navlink.forEach(studGroup)

function studGroup(itemgr, idgr) {
    itemgr.onclick = function () {
        jsonPost(location.origin + "/students/studentsgroupoutput", itemgr.id)
            .then(response => studget(JSON.parse(response)))
            .then(studget(studdata))
    }
}

