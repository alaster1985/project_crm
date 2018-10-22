var mytable = document.getElementById('myTable').getElementsByTagName('tbody')[0];;
var ll

var filter = 7;

var ind = document.querySelectorAll(".direct");
ind.forEach(aaa)
function aaa(item, id) {
    item.onclick = function(){
        // document.getElementById('stres').innerHTML = '';

        // CLEARE TABLE BY DELETE ROWS
        for (var i = document.getElementById('myTable').getElementsByTagName('tr').length -1; i; i--) {
            document.getElementById('myTable').deleteRow(i);
        }
        console.log( location.origin)
        jsonPost(location.origin+"/employees/studentsdirection", id)
            .then(response => studget(JSON.parse(response)))
            .then(studget(someth))
        function studget(studdata) {
            // document.getElementById('stres').innerHTML = '';
//           console.log(studdata)
            var rowTable =0;
            for (var gr = 0; gr < studdata.length; gr++) {
                if (filter == 7) {

                    console.log(filter)
                    if (studdata[gr]['name'] == 'fox') {
                        console.log(studdata[gr]['name'])
                        var row = mytable.insertRow(rowTable);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        cell1.innerHTML = studdata[gr]['name'];
                        cell2.innerHTML = gr;
                        console.log(mytable)
                        rowTable ++;
                    }
                }
            }

            // for (var gr = 0; gr < studdata.length; gr++) {
            //     var a = document.createElement('a');
            //     a.setAttribute('href', "students/show/"+ studdata[gr]['person_id']);
            //     a.innerHTML = studdata[gr]['name']
            //     studext.appendChild(a)
            //     studext.appendChild(document.createElement('br'))
            // }
        }
    }
}

var navlink = document.querySelectorAll(".navlink");
navlink.forEach(navfun)
function navfun(itemgr, idgr) {
    itemgr.onclick = function(){
        document.getElementById('stres').innerHTML = '';
        jsonPost(location.origin+"/employees/studentgroup", itemgr.id)
            .then(response => studgr(JSON.parse(response)))
            .then(studgr(someth))
        function studgr(studdata) {
            for (var gr = 0; gr < studdata.length; gr++) {
                var a = document.createElement('a');
                a.setAttribute('href', "students/show/"+ studdata[gr]['person_id']);
                a.innerHTML = studdata[gr]['name']
                studext.appendChild(a)
                studext.appendChild(document.createElement('br'))
            }
        }
    }
}
