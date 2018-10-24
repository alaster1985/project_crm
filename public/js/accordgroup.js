var mytable = document.getElementById('myTable').getElementsByTagName('tbody')[0];

var ll
var globalDirectionId;
var globalStudSata;

function studget(studdata) {
    // console.log(studdata);
    // CLEAR TABLE BY DELETE ROWS
    globalStudSata = studdata;
    for (var i = document.getElementById('myTable').getElementsByTagName('tr').length - 1; i; i--) {
        document.getElementById('myTable').deleteRow(i);
    }
    var rowTable = 0;
    for (var gr = 0; gr < studdata.length; gr++) {
        var row = mytable.insertRow(rowTable);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = '<a href="students/show/' + studdata[gr]['person_id'] + '">' + studdata[gr]['name'] + '</a>';
        cell2.innerHTML = gr;
        cell3.innerHTML = '<a href="students/show/' + studdata[gr]['person_id'] + '">' + studdata[gr]['direction'] + '</a>';
        rowTable++;
    }
}

var ind = document.querySelectorAll(".direct")
ind.forEach(studDirection)
function studDirection(item, id) {
    item.onclick = function () {
        globalDirectionId = id;
        jsonPost(location.origin + "/employees/studentsdirection", item.id)
            .then(response => studget(JSON.parse(response)))
            .then(studget(studdata))
    }
}

var navlink = document.querySelectorAll(".navlink");
navlink.forEach(studGroup)
function studGroup(itemgr, idgr) {
    console.log(itemgr)
    console.log(itemgr.id)
    itemgr.onclick = function () {
        jsonPost(location.origin + "/students/studentsgroupoutput", itemgr.id)
            .then(response => studget(JSON.parse(response)))
            .then(studget(studdata))
    }
}

