var groupSelector = document.getElementById("groups")
var direction = document.getElementById("direction")  //Формировка Селекта снаправлениями
var div = document.getElementById("ext")
var extData = {}

function httpGet(url) {
    return new Promise(function (resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function () {
            if (this.status == 200) {
                resolve(this.responseText);
            }
        };
        xhr.send();
    });
}

httpGet('http://public/employees/directions')
    .then(response => fun(JSON.parse(response)))
    .then(fun(extData))

function fun(extData) {
    for (let key in extData) {
        var ll = new Option(extData[key].direction, `${key}`);
        direction.appendChild(ll)
    }
}

direction.onchange = function () {
    var directionSelected = direction.options[direction.selectedIndex].value
    groupSelector.options.length = 0;
    httpGet('http://public/employees/groups')
        .then(response => fun(JSON.parse(response)))
        .then(fun(extData))

    function fun(extData) {
        for (var gr = 0; gr < extData.length; gr++) {
            if (((extData[gr]['direction_id']) - 1) == (directionSelected)) {
                groupElement = new Option(extData[gr]['group_name'], extData[gr]['id']);
              console.log(groupElement)
                groupSelector.appendChild(groupElement)
            }
        }
    }
}

groupSelector.onchange = function () {
    var groupSelected = groupSelector.options[groupSelector.selectedIndex].value
    //In GROUPSELECTED - ID of the group
    console.log(groupSelected)
    httpGet('http://public/employees/students')
        .then(response => fun(JSON.parse(response)))
        .then(fun(extData))


    function fun(extData) {

        for (var gr = 0; gr < extData.length; gr++) {
            if ((extData[gr]['group_id']) == (groupSelected)) {
                var a = document.createElement('a');
                a.setAttribute('href', gr + 1);
                a.innerHTML = extData[gr]['name'];
                div.appendChild(a)
                div.appendChild(document.createElement('br'))
            }


            //     firstParagraph = div.firstElementChild;
            // var href = document.createElement("p");
            // .innerHTML = "Lorem ipsum <i>dolor sit amet</i>, consectetur adipisicing elit.
            //     <b>Natus pariatur</b>, ipsa dolorum adipisci.";
            // text.insertBefore(p, firstParagraph );
            //
            //
            //      groupElement = new Option(extData[directionSelected]['group_name'], extData[directionSelected]['id']);
            //      groupSelector.appendChild(groupElement)
//                    }
        }
    }


// function jsonPost(url, data) {
//     return new Promise((resolve, reject) => {
//         var x = new XMLHttpRequest();
//         x.open("POST", url, true);
//         x.send(JSON.stringify(data))
//         x.onreadystatechange = () => {
//             if (x.readyState == XMLHttpRequest.DONE && x.status == 200){
//                 resolve(JSON.parse(x.responseText))
//             }
//         }
//     })
// }


//  	    var group = groupSelector.options[groupSelector.selectedIndex].value;
//  	    var yql =`select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="${group}") and u='c'`
//  	    req = new XMLHttpRequest()
//  	    req.open('GET', "https://query.yahooapis.com/v1/public/yql?" + 'q=' + encodeURIComponent(yql) + '&format=json', true)
//  	    req.send()
//  	    req.onreadystatechange = function()  {
//         if (this.readyState === 4 && this.status === 200) {
// 			var nr = JSON.parse(this.response)
// 			document.getElementById("ext").innerHTML = ""
// 	 		for (var key in nr.query.results.channel.item.forecast[0]) {
// 			var req = nr.query.results.channel.item.forecast[0][key]
// 			var p = document.createElement("p");
// 			p.innerText = key + " = " + req
// 			div.appendChild(p)
// 	 		}
//         }
//  		}
//  	}
}



// fetch("localhost/json/",
//     {
//         headers: {
//             'Accept': 'application/json',
//             'Content-Type': 'application/json'
//         },
//         method: "POST",
//         body: JSON.stringify({a: 1, b: 2})
//     })
//     .then(function(res){ console.log(res) })
