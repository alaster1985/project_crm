var companiesTable = document.getElementById('companiesTable').getElementsByTagName('tbody')[0];
var ll;
var globaldata = {};
var studdata = {};


function companies(studdata) {
    // CLEAR TABLE BY DELETE ROWS
    globaldata = studdata;
    for (let i = document.getElementById('companiesTable').getElementsByTagName('tr').length - 1; i; i--) {
        document.getElementById('companiesTable').deleteRow(i);
    }
    var rowTable = 0;
    for (var gr in studdata) {
        var row = companiesTable.insertRow(rowTable);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        let logo;
        if (!studdata[gr]['logo']) {logo = ''} else {logo = studdata[gr]['logo']}
        let comment;
        if (!studdata[gr]['comment']) {comment = ''} else {comment = studdata[gr]['comment']}
        cell1.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['company_name'] + '</a>';
        cell2.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['status'] + '</a>';
        cell3.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['type'] + '</a>';
        cell4.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['site'] + '</a>';
        cell5.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + studdata[gr]['address'] + '</a>';
        cell6.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + logo + '</a>';
        cell7.innerHTML = '<a href="companies/show/' + studdata[gr]['id'] + '">' + comment + '</a>';
        rowTable++;
    }
}

function allCompanies() {
    jsonPost(location.origin + "/companiesall", 5)
        .then(response => companies(JSON.parse(response)))
        .then(companies(studdata))
}
allCompanies();

resetCompanies.onclick = function(){
    allCompanies();
}

// Filters
statvz.onchange = function(){
    let sel = statvz.selectedIndex;
    let options = statvz.options;
    // alert('Выбрана опция ' + options[sel].text + ' ' + options[sel].value);
    for (let key in globaldata) {
        if (options[sel].value !== globaldata[key]['status']) {
            delete globaldata[key];
        }
    }
    companies(globaldata);
}

statsort.onchange = function () {
    let sel = statsort.selectedIndex;
    let options = statsort.options;
    for (let key in globaldata) {
        if (options[sel].value !== globaldata[key]['type']) {
            delete globaldata[key];
        }
    }
    companies(globaldata);
}




