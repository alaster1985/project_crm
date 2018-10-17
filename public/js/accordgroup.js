var ll

var ind = document.querySelectorAll(".direct");
ind.forEach(aaa)
function aaa(item, id) {
    item.onclick = function(){
        console.log( location.origin)
        jsonPost(location.origin+"/employees/studentsdirection", id)
            .then(response => studget(JSON.parse(response)))
            .then(studget(someth))
        function studget(studdata) {
            document.getElementById('stres').innerHTML = '';
//            console.log(studdata)
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
