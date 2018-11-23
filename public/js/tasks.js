var tasksTable = document.getElementById('tasksT').getElementsByTagName('tbody')[0];
var ll;
var globaldata = {};
var studdata = {};


function tasks(studdata) {
    // CLEAR TABLE BY DELETE ROWS
    globaldata = studdata;
    for (let i = document.getElementById('tasksT').getElementsByTagName('tr').length - 1; i; i--) {
        document.getElementById('tasksT').deleteRow(i);
    }
    var rowTable = 0;
    for (var gr in studdata) {
        let complit = studdata[gr]['task_completed'] == 0  ? 'In process' : 'Complited';
        var row = tasksTable.insertRow(rowTable);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        cell1.innerHTML = '<a href="tasks/show/' + studdata[gr]['id'] + '">' + studdata[gr]['task_name'] + '</a>';
        cell2.innerHTML = '<a href="tasks/show/' + studdata[gr]['id'] + '">' + studdata[gr]['description'] + '</a>';
        cell3.innerHTML = '<a href="tasks/show/' + studdata[gr]['id'] + '">' + studdata[gr]['dead_line'] + '</a>';
        cell4.innerHTML = '<a href="tasks/show/' + studdata[gr]['id'] + '">' + studdata[gr]['customerName'] + '</a>';
        cell5.innerHTML = '<a href="tasks/show/' + studdata[gr]['id'] + '">' + studdata[gr]['doerName'] + '</a>';
        cell6.innerHTML = '<a href="tasks/show/' + studdata[gr]['id'] + '">' + studdata[gr]['doers_report'] + '</a>';
        cell7.innerHTML = '<a href="tasks/show/' + studdata[gr]['id'] + '">' + complit+ '</a>';
        rowTable++;
    }
}

function allTasks() {
    jsonPost(location.origin + "/alltasks", 5)
        .then(response => tasks(JSON.parse(response)))
        .then(tasks(studdata))
}
allTasks();

resetTasks.onclick = function(){
    allTasks();
}

// Filters
statexec.onchange = function(){

    let sel = statexec.selectedIndex;
    let options = statexec.options;
    for (let key in globaldata) {

        if ((sel -1)!== globaldata[key]['task_completed']) {
            delete globaldata[key];
        }
    }
    tasks(globaldata);
}
