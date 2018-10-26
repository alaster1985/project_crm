let group_name = document.getElementById("groups");
let skill_name = document.getElementById("skills");
let company_name = document.getElementById("companies");
let position = document.getElementById("position");
let direction = document.getElementById("direction");
let stack_name = document.getElementById("stacks");
let member_name = document.getElementById("members");

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


httpGet(location.origin+"/students/groups")
    .then(response => funcSelectGroup(JSON.parse(response)))

function funcSelectGroup(extData) {
    for (let i = 0; i < extData.length; i++) {
        elem = new Option(extData[i]['group_name'], extData[i]['id']);
        group_name.appendChild(elem)
    }
}


httpGet(location.origin+"/skills")
    .then(response => funcSelectSkill(JSON.parse(response)));

function funcSelectSkill(extData) {
    for (let i = 0; i < extData.length; i++) {
        elem = new Option(extData[i]['skill_name'], extData[i]['id']);
        skill_name.appendChild(elem)
    }
}


httpGet(location.origin+"/company")
    .then(response => funcSelectCompany(JSON.parse(response)));

function funcSelectCompany(extData) {
    for (let i = 0; i < extData.length; i++) {
        elem = new Option(extData[i]['company_name'], extData[i]['id']);
        company_name.appendChild(elem)
    }
}


httpGet(location.origin+"/position")
    .then(response => funcSelectPosition(JSON.parse(response)));

function funcSelectPosition(extData) {
    for (let i = 0; i < extData.length; i++) {
        elem = new Option(extData[i]['position'], extData[i]['id']);
        position.appendChild(elem)
    }
}


httpGet(location.origin+"/direction")
    .then(response => funcSelectDirection(JSON.parse(response)));

function funcSelectDirection(extData) {
    for (let i = 0; i < extData.length; i++) {
        elem = new Option(extData[i]['direction'], extData[i]['id']);
        direction.appendChild(elem)
    }
}


httpGet(location.origin+"/stacks")
    .then(response => funcSelectStack(JSON.parse(response)));

function funcSelectStack(extData) {
    for (let i = 0; i < extData.length; i++) {
        elem = new Option(extData[i]['stack_name'], extData[i]['id']);
        stack_name.appendChild(elem)
    }
}

httpGet(location.origin+"/members")
    .then(response => funcSelectMember(JSON.parse(response)));

function funcSelectMember(extData) {
    for (let i = 0; i < extData.length; i++) {
        elem = new Option(extData[i]['name'], extData[i]['id']);
        member_name.appendChild(elem)
    }
}
