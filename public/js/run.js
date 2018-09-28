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

var direction = document.getElementById("direction")  //Формировка Селекта снаправлениями
var groupSelector = document.getElementById("groups")
var div = document.getElementById("ext")
var extData ={}

function httpGet(url) {
  return new Promise(function(resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onload = function() {
      if (this.status == 200) {
        resolve(this.responseText);
      }
    };
    xhr.send();
  });
}
httpGet('http://public/employees/directions')
    .then(response =>  fun(JSON.parse(response)))
    .then(fun(extData))

function fun(extData) {
    console.log(extData)
		for (let key in extData) {
            var ll = new Option(extData[key].direction, `${key}`);
            direction.appendChild(ll)
        }
}

	direction.onchange = function() {


		var directionSelected = direction.options[direction.selectedIndex].value
        groupSelector.options.length = 0;
//		extData[directionSelected].sort()
			for (var key = 0 ; key <  extData[directionSelected].length; key++) {
				var k = extData[directionSelected][key]
				groupElement = new Option(`${k}`, `${k}`);
				if (k != "") groupSelector.appendChild(groupElement)
			}
	}
//
//
//  	groupSelector.onchange = function() {
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
// }
//
//
// // function jsonPost(url, data)
// // {
// //     // var timestamp =(new Date()).getTime();
// //     // data.timestamp = timestamp;
// // //      console.log(data)
// //     return new Promise((resolve, reject) => {
// //         var x = new XMLHttpRequest();
// //         x.onerror = () => reject(new Error('jsonPost failed'))
// //         //x.setRequestHeader('Content-Type', 'application/json');
// //         x.open("POST", url, true);
// //         x.send(JSON.stringify(data))
// //
// //         x.onreadystatechange = () => {
// //             if (x.readyState == XMLHttpRequest.DONE && x.status == 200){
// // //                  console.log(x.responseText)
// //                 resolve(JSON.parse(x.responseText))
// //                 console.log(x.responseText)
// //             }
// //             else if (x.status != 200){
// //                 reject(new Error('status is not 200'))
// //             }
// //         }
// //     })
// // }
//
