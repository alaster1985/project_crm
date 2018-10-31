let group_name = document.getElementById("groups");
let skill_name = document.getElementById("skills");
let company_name = document.getElementById("companies");
let position = document.getElementById("position");
let direction = document.getElementById("direction");
let member_name = document.getElementById("members");
let stack_name1 = document.getElementById("stacks1");
let stack_name2 = document.getElementById("stacks2");
let stack_name3 = document.getElementById("stacks3");


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

httpGet(location.origin+"/members")
    .then(response => funcSelectMember(JSON.parse(response)));

function funcSelectMember(extData) {
    for (let i = 0; i < extData.length; i++) {
        elem = new Option(extData[i]['name'], extData[i]['id']);
        member_name.appendChild(elem)
    }
}

// httpGet(location.origin+"/stacks")
//     .then(response => funcSelectStack1(JSON.parse(response)));

// function funcSelectStack1(extData) {
//     for (let i = 0; i < extData.length; i++) {
//         elem = new Option(extData[i]['stack_name'], extData[i]['id']);
//         stack_name1.appendChild(elem)
//     }
// }



httpGet(location.origin+"/stacks")
    .then(responseText => {
        startJSON = JSON.parse(responseText)
        filling(startJSON)
    })

async function filling(startJSON){
    stack1 = await function (startJSON) {
        for (let i = 0; i < startJSON.length; i++) {
            elem = new Option(startJSON[i]['stack_name'], startJSON[i]['id']);
            stack_name1.appendChild(elem)
        }
    }
    stacks1.onchange = function(){
        var val1 = stack_name1.options[stack_name1.selectedIndex].value;
        // alert(val1)
        for (let i = 0; i < startJSON.length; i++) {
            if (val1 == startJSON[i]['id']) {continue}
            // alert(startJSON[i]['id'])
            elem = new Option(startJSON[i]['stack_name'], startJSON[i]['id']);
            stack_name2.appendChild(elem)
        }
    }
    stacks2.onchange = function(){
        var val2 = stack_name2.options[stack_name2.selectedIndex].value;
        var val1 = stack_name1.options[stack_name1.selectedIndex].value;
        // alert(val2)
        for (let i = 0; i < startJSON.length; i++) {
            if ((val1 == startJSON[i]['id']) || (val2 == startJSON[i]['id'])) {continue}
            // alert(startJSON[i]['id'])
            elem = new Option(startJSON[i]['stack_name'], startJSON[i]['id']);
            stack_name3.appendChild(elem)
        }
    }
    stack1(startJSON)
}
