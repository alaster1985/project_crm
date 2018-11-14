var alevelTable = document.getElementById('alevelTable').getElementsByTagName('tbody')[0];
var ll;
var globaldata = {};
var studdata = {};


function alevel(studdata) {
    // CLEAR TABLE BY DELETE ROWS
    globaldata = studdata;
    for (let i = document.getElementById('alevelTable').getElementsByTagName('tr').length - 1; i; i--) {
        document.getElementById('alevelTable').deleteRow(i);
    }
    var rowTable = 0;
    for (var gr in studdata) {
        var row = alevelTable.insertRow(rowTable);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['group_name'] + '</a>';
        cell2.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['direction'] + '</a>';
        cell3.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['start_date'] + '</a>';
        cell4.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['finish_date'] + '</a>';
        rowTable++;
    }
}

function alevelAll() {
    jsonPost(location.origin + "/groupall", 5)
        .then(response => alevel(JSON.parse(response)))
        .then(alevel(studdata))
}
alevelAll();

resetalevel.onclick = function(){
    alevelAll();
}

// Filters
// statvz.onchange = function(){
//     let sel = statvz.selectedIndex;
//     let options = statvz.options;
//     // alert('Выбрана опция ' + options[sel].text + ' ' + options[sel].value);
//     for (let key in globaldata) {
//         if (options[sel].value !== globaldata[key]['status']) {
//             delete globaldata[key];
//         }
//     }
//     companies(globaldata);
// }
//
// statsort.onchange = function () {
//     let sel = statsort.selectedIndex;
//     let options = statsort.options;
//     for (let key in globaldata) {
//         if (options[sel].value !== globaldata[key]['type']) {
//             delete globaldata[key];
//         }
//     }
//     companies(globaldata);
// }
