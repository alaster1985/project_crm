var ll

var ind = document.querySelectorAll(".direct");
console.log(ind)
ind.forEach(aaa)
function aaa(item, id) {
    item.onclick = function(){
        alert(id+1)
        jsonPost('http://public/employees/studentsdirection', id)
            .then(response => studedit(JSON.parse(response)))
            .then(studget(someth))
        function studget(studdata) {
            console.log(studdata)

        }
        //ЗАПОЛНИТЬ ПОЛЕ ПО НАПРАВЛЕНИЯМ
    }
}


httpGet('http://public/employees/directions')
    .then(response => fun(JSON.parse(response)))
    .then(fun(extData))

function fun(extData) {
    for (let key in extData) {

       ll.innerHTML = "<p>";

        accordionmenu.appendChild(ll)
    }
}




// direction.onchange = function () {
//     var directionSelected = direction.options[direction.selectedIndex].value
//     groupSelector.options.length = 0;
//     httpGet('http://public/employees/groups')
//         .then(response => fun(JSON.parse(response)))
//         .then(fun(extData))
//
//     function fun(extData) {
//         for (var gr = 0; gr < extData.length; gr++) {
//             if (((extData[gr]['direction_id']) - 1) == (directionSelected)) {
//                 groupElement = new Option(extData[gr]['group_name'], extData[gr]['id']);
//                 groupSelector.appendChild(groupElement)
//             }
//         }
//     }
// }
//
// groupSelector.onchange = function () {
//     var groupSelected = groupSelector.options[groupSelector.selectedIndex].value
//     //In GROUPSELECTED - ID of the group
//     httpGet('http://public/employees/students')
//         .then(response => fun(JSON.parse(response)))
//         .then(fun(extData))
//
//     function fun(extData) {
//         for (var gr = 0; gr < extData.length; gr++) {
//             if ((extData[gr]['group_id']) == (groupSelected)) {
//                 var a = document.createElement('a');
//                 a.setAttribute('href', extData[gr]['person_id']);
//                 a.innerHTML = extData[gr]['name'];
//                 div.appendChild(a)
//                 div.appendChild(document.createElement('br'))
//             }
//         }
//     }
// }
