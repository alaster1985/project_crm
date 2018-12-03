var alevelTable = document.getElementById('alevelTable').getElementsByTagName('tbody')[0];
var ll;
var globaldata = {};
var studdata = {};

var alevelDirection = document.getElementById("direction_it");


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
        cell1.innerHTML = '<a href="groups/show/' + studdata[gr]['id'] + '">' + studdata[gr]['group_name'] + '</a>';
        cell2.innerHTML = '<a href="groups/show/' + studdata[gr]['id'] + '">' + studdata[gr]['direction'] + '</a>';
        cell3.innerHTML = '<a href="groups/show/' + studdata[gr]['id'] + '">' + studdata[gr]['start_date'] + '</a>';
        cell4.innerHTML = '<a href="groups/show/' + studdata[gr]['id'] + '">' + studdata[gr]['finish_date'] + '</a>';
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
alevelDirection.onchange = function(){

    let sel = alevelDirection.selectedIndex;
    let options = alevelDirection.options;
    text = alevelDirection.options[alevelDirection.selectedIndex].text;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: location.origin + "/groupall",
        data: JSON.stringify([1,4,7]),
        contentType: "application/json",
        dataType: "json",
        success: function(dat){
            self.dat = dat;
            for (let key in dat) {
                if (text !== dat[key]['direction']) {
                    delete dat[key];
                }
            }
            alevel(dat);
        },
        failure: function(errMsg) {
            //
        }
    })
}
