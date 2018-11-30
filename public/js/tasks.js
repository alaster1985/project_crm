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
    var dat;
    let sel = statexec.selectedIndex;
    let options = statexec.options;
    self = this;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: location.origin + "/alltasks",
        data: JSON.stringify([1,4,7]),
        contentType: "application/json",
        dataType: "json",
        success: function(dat){
            self.dat = dat;
            for (let key in dat) {

                if ((sel -1)!== dat[key]['task_completed']) {
                    delete dat[key];
                }
            }
            tasks(dat);
        },
        failure: function(errMsg) {
            //
        }
    })
}
