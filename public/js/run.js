var direction = document.getElementById("direction")  //Формировка Селекта снаправлениями
var citySelector = document.getElementById("groups")
var div = document.getElementById("ext")
var extData ={}
// var ex = JSON.parse(this.responseText)
// 			var extData = {};
// 			Object.keys(ex).sort().forEach(function(key) {extData[key] = ex[key]})
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

// ИЗМЕНИТЬ НАПРАВЛЕНИЕ ЗАПРОСА!!!
 httpGet('https://raw.githubusercontent.com/David-Haim/CountriesToCitiesJSON/master/countriesToCities.json')
    .then(response =>  fun(JSON.parse(response)))
    .then(fun(extData))
function fun(extData) {
	console.log(extData)
		for (let key in extData) {
			var ll = new Option(`${key}`, `${key}`);
			if (key != "") direction.appendChild(ll)
			}

	country.onchange = function() {
		var countrySelected = direction.options[direction.selectedIndex].value
	    citySelector.options.length = 0;
		extData[countrySelected].sort()
			for (var key = 0 ; key <  extData[countrySelected].length; key++) {
				var k = extData[countrySelected][key]
				cityElement = new Option(`${k}`, `${k}`);
				if (k != "") citySelector.appendChild(cityElement)
			}
	}
 	citySelector.onchange = function() {
 	    var city = citySelector.options[citySelector.selectedIndex].value;
 	    var yql =`select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="${city}") and u='c'`
 	    req = new XMLHttpRequest()
 	    req.open('GET', "https://query.yahooapis.com/v1/public/yql?" + 'q=' + encodeURIComponent(yql) + '&format=json', true)
 	    req.send()
 	    req.onreadystatechange = function()  {
        if (this.readyState === 4 && this.status === 200) {
			var nr = JSON.parse(this.response)
			document.getElementById("ext").innerHTML = ""
	 		for (var key in nr.query.results.channel.item.forecast[0]) {
			var req = nr.query.results.channel.item.forecast[0][key]
			var p = document.createElement("p");
			p.innerText = key + " = " + req
			div.appendChild(p)
	 		}
        }
 		}
 	}
}
