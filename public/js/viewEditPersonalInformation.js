var selectedGruppaEdit;
var learnStatusValue;

jsonPost(location.origin+"/students/studedition", urlPart[3])
    .then(response => studedit(JSON.parse(response)))
    .then(studedit(someth))

function studedit(studdata) {
    console.log(studdata)
    var studparam = document.getElementById('studParam');  //div

// add students fields START
    var studnamehtml = document.createElement('p');  //p in div
    var studaddresshtml = document.createElement('p');  //p in div
    var studcommenthtml = document.createElement('p');  //p in div
    var studgroup_namehtml = document.createElement('p');  //p in div
    var studlearning_statushtml = document.createElement('p');  //p in div

    studnamehtml.innerHTML = studdata['name'] + '<button id="stname">Press to edit</button>';
    studaddresshtml.innerHTML = studdata['address'] + '<button id="staddress">Press to edit</button>';
    studcommenthtml.innerHTML = studdata['comment'] + '<button id="stcomment">Press to edit</button>';
    studgroup_namehtml.innerHTML = studdata['group_name'] + '<button id="stgroup_name">Press to edit</button>';
    studlearning_statushtml.innerHTML = studdata['learning_status'] + '<button id="stlearning_status">Press to edit</button>';

    studparam.appendChild(studnamehtml);
    studparam.appendChild(studaddresshtml);
    studparam.appendChild(studcommenthtml);
    studparam.appendChild(studgroup_namehtml);
    studparam.appendChild(studlearning_statushtml);
// add students fields FINISH


    document.getElementById('stname').onclick = function () {
        studnamehtml.innerHTML = "<input type='text' id='stnameInput' value=" + studdata['name'] + "><button id='stname'>Press to edit</button>";
        studaddresshtml.innerHTML = "<input type='text' id='staddressInput' value=" + studdata['address'] + "><button id='staddress'>Press to edit</button>";
        studcommenthtml.innerHTML = "<input type='text' id='stcommentInput' value=" + studdata['comment'] + "><button id='stcomment'>Press to edit</button>";
        studgroup_namehtml.innerHTML = "";
        studlearning_statushtml.innerHTML = "";

//Group LEARNING STATUS START -------
        var learningStatus = document.createElement('select');
            let studlearningElement1 = new Option("learning", "learning");
            let studlearningElement2 = new Option("graduated", "graduated");
            let studlearningElement3 = new Option("feel_of", "feel_of");
            let studlearningElement4 = new Option("Other", "Other");
        learningStatus.appendChild(studlearningElement1);
        learningStatus.appendChild(studlearningElement2);
        learningStatus.appendChild(studlearningElement3);
        learningStatus.appendChild(studlearningElement4);
            document.getElementById('studlearning').appendChild(learningStatus);
        learningStatus.onchange = () => {
            learnStatusValue = learningStatus.options[learningStatus.selectedIndex].value
        }
//Group LEARNING FINISH -------




//Group SELECTOR START -------
        httpGet(location.origin+"/employees/groups")
            .then(response => fun(JSON.parse(response)))
            .then(fun(extData))
        function fun(extData) {
            var selectList = document.createElement('select');
            for (let gr = 0; gr < extData.length; gr++) {
                let studgroupElement = new Option(extData[gr]['group_name'], extData[gr]['id']);
                selectList.appendChild(studgroupElement);
                document.getElementById('studgroups').appendChild(selectList)
            }
            selectList.onchange = () => {
                selectedGruppaEdit = selectList.options[selectList.selectedIndex].value
            };
        }
//Group SELECTOR FINISH -------

        studparam.appendChild(studnamehtml)
        studparam.appendChild(studaddresshtml)
        studparam.appendChild(studcommenthtml);
        studparam.appendChild(studgroup_namehtml);

        document.getElementById('stname').onclick = function () {
            alert(selectedGruppaEdit);
             jsonPostEdit(location.origin+"/students/addata", urlPart[3], document.getElementById('stnameInput').value)
             jsonPostEdit(location.origin+"/students/chgroup", urlPart[3], selectedGruppaEdit);
             jsonPostEdit(location.origin+"/students/chearnstatus", urlPart[3], learnStatusValue);

            location.reload();
        }
    }
}
