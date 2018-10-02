let group_name = document.getElementById("groups");

function httpGet(url) {
    return new Promise(function (resolve) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function () {
            if (this.status === 200) {
                resolve(this.responseText);
            }
        };
        xhr.send();
    });
}

httpGet('http://public/employees/groups')
    .then(response => fun(JSON.parse(response)));

function fun(extData) {
    let el;
    for (let gr = 0; gr < extData.length; gr++) {
        el = new Option(extData[gr]['group_name'], extData[gr]['id']);
        group_name.appendChild(el)
    }
}
