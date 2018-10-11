
jsonPost('http://public/students/studedition', urlPart[3])
    .then(response => studedit(JSON.parse(response)))
    .then(studedit(someth))

function studedit(studdata) {
    console.log(studdata)
    var studparam = document.getElementById('studParam');  //div

    var studnamehtml = document.createElement('p');  //p in div
    var studaddresshtml = document.createElement('p');  //p in div
    var studcommenthtml = document.createElement('p');  //p in div
    var studgroup_namehtml = document.createElement('p');  //p in div

    studnamehtml.innerHTML = studdata['name'] + '<button id="stname">Press to edit</button>';
    studaddresshtml.innerHTML = studdata['address'] + '<button id="staddress">Press to edit</button>';
    studcommenthtml.innerHTML = studdata['comment'] + '<button id="stcomment">Press to edit</button>';
    studgroup_namehtml.innerHTML = studdata['group_name'] + '<button id="stgroup_name">Press to edit</button>';

    studparam.appendChild(studnamehtml);
    studparam.appendChild(studaddresshtml);
    studparam.appendChild(studcommenthtml);
    studparam.appendChild(studgroup_namehtml);

    document.getElementById('stname').onclick = function () {
        studnamehtml.innerHTML = "<input type='text' id='stnameInput' value=" + studdata['name'] + "><button id='stname'>Press to edit</button>";
        studaddresshtml.innerHTML = "<input type='text' id='staddressInput' value=" + studdata['address'] + "><button id='staddress'>Press to edit</button>";
        studcommenthtml.innerHTML = "<input type='text' id='stcommentInput' value=" + studdata['comment'] + "><button id='stcomment'>Press to edit</button>";

        studgroup_namehtml.innerHTML = "<input type='text' id='stgroup_nameInput' value=" + studdata['group_name'] + "><button id='stgroup_name'>Press to edit</button>";


        httpGet('http://public/employees/groups')
            .then(response => fun(JSON.parse(response)))
            .then(fun(extData))

        function fun(extData) {
            var selectList = document.createElement('select');
            for (let gr = 0; gr < extData.length; gr++) {
                let studgroupElement = new Option(extData[gr]['group_name'], extData[gr]['id']);
                selectList.appendChild(studgroupElement);
                document.getElementById('studgroups').appendChild(selectList)
            }
//            selectedGruppaEdit = selectList.options[selectList.selectedIndex].value;
            selectList.onchange = ()=> {selectedGruppaEdit = selectList.options[selectList.selectedIndex].value
                console.log(selectedGruppaEdit)};
        }

        studparam.appendChild(studnamehtml)
        studparam.appendChild(studaddresshtml)
        studparam.appendChild(studcommenthtml);
        studparam.appendChild(studgroup_namehtml);
        document.getElementById('stname').onclick = function () {

            console.log(selectedGruppaEdit);

            jsonPostEdit('http://public/students/addata', urlPart[3], document.getElementById('stnameInput').value)
            jsonPostEdit('http://public/students/chgroup', urlPart[3], document.getElementById('stgroup_nameInput').value)

            location.reload();
        }
    }
}
