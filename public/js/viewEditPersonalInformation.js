/*
var selectedGruppaEdit;
var learnStatusValue;

<<<<<<< HEAD
jsonPost('http://localhost:8000/students/studedition', urlPart[3])
=======
jsonPost(location.origin+"/students/studedition", urlPart[3])
>>>>>>> 882514bcca512efd6000a28491f63252940cd5ad
    .then(response => studedit(JSON.parse(response)))
    //.then(studedit(someth))

function studedit(studdata) {
    console.log(studdata)
    var studparam = document.getElementById('studParam');  //div

// add students fields START
    var studnamehtml = document.createElement('p');  //p in div
    var studaddresshtml = document.createElement('p');  //p in div

    var studcommunication_tool = document.createElement('p');
    var studcontact = document.createElement('p');
    var studcomment = document.createElement('p');

    var studcommenthtml = document.createElement('p');  //p in div
    var studgroup_namehtml = document.createElement('p');  //p in div
    var studlearning_statushtml = document.createElement('p');  //p in div
    //var studcontacts = document.createElement('p');  //p in div
    var studemployment_statushtml = document.createElement('p');
    var studCV = document.createElement('p');


    studnamehtml.innerHTML = studdata['name'] + '<button id="stname">Press to edit</button>';
    studaddresshtml.innerHTML = studdata['address'] + '<button id="staddress">Press to edit</button>';

    studcommunication_tool.innerHTML = studdata['communication_tool'] + '<button id="stcommtool">Press to edit</button>';
    studcontact.innerHTML = studdata['contact'] + '<button id="stcontact">Press to edit</button>';
    studcomment.innerHTML = studdata['comment'] + '<button id="stcomcomment">Press to edit</button>';

    studcommenthtml.innerHTML = studdata['comment'] + '<button id="stcomment">Press to edit</button>';
    studgroup_namehtml.innerHTML = studdata['group_name'] + '<button id="stgroup_name">Press to edit</button>';
    studlearning_statushtml.innerHTML = studdata['learning_status'] + '<button id="stlearning_status">Press to edit</button>';
    studemployment_statushtml.innerHTML = studdata['employment_status'] + '<button id="employment_status">Press to edit</button>';
    studCV.innerHTML = studdata['CV'] + '<button id="CV">Press to edit</button>';
    //studcontacts.innerHTML = studdata['']

    studparam.appendChild(studnamehtml);
    studparam.appendChild(studaddresshtml);
    studparam.appendChild(studcommenthtml);
    studparam.appendChild(studgroup_namehtml);
    studparam.appendChild(studlearning_statushtml);
    studparam.appendChild(studemployment_statushtml);
    studparam.appendChild(studCV);
    studparam.appendChild(studcommunication_tool);
    studparam.appendChild(studcontact);
    studparam.appendChild(studcomment);
// add students fields FINISH


    document.getElementById('stname').onclick = function () {

        studnamehtml.innerHTML = "<input type='text' id='stnameInput' value=" + studdata['name'] + "><button id='stname'>Press to edit</button>";
        studaddresshtml.innerHTML = "<input type='text' id='staddressInput' value=" + studdata['address'] + "><button id='staddress'>Press to edit</button>";

        studcommunication_tool.innerHTML  = "<input type='text' id='stnameInput' value=" + studdata['communication_tool'] + "><button id='stname'>Press to edit</button>";
        studcontact.innerHTML  = "<input type='text' id='stnameInput' value=" + studdata['contact'] + "><button id='stname'>Press to edit</button>";
        studcomment.innerHTML  = "<input type='text' id='stnameInput' value=" + studdata['comment'] + "><button id='stname'>Press to edit</button>";

        studcommenthtml.innerHTML = "<input type='text' id='stcommentInput' value=" + studdata['comment'] + "><button id='stcomment'>Press to edit</button>";
        studgroup_namehtml.innerHTML = "";
        studlearning_statushtml.innerHTML = "";
        studemployment_statushtml.innerHTML= "";
        studCV.innerHTML = "<input type='text' id='stCV' value=" + studdata['CV'] + "><button id='stCV'>Press to edit</button>";

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

//Group EMPLOYMENT STATUS START -------
        var employmentStatus = document.createElement('select');
        let employmentElement1 = new Option("in_IT_not_in_direction", "in_IT_not_in_direction");
        let employmentElement2 = new Option("refused", "refused");
        let employmentElement3 = new Option("not_relevant_in_IT", "not_relevant_in_IT");
        let employmentElement4 = new Option("in_search", "in_search");
        employmentStatus.appendChild(employmentElement1);
        employmentStatus.appendChild(employmentElement2);
        employmentStatus.appendChild(employmentElement3);
        employmentStatus.appendChild(employmentElement4);
        document.getElementById('studemployment').appendChild(employmentStatus);
        learningStatus.onchange = () => {
            learnStatusValue = learningStatus.options[learningStatus.selectedIndex].value
        }

//Group EMPLOYMENT STATUS FINISH -------

//CV START -------



//CV FINISH -------


//Group SELECTOR START -------
<<<<<<< HEAD
        httpGet('http://localhost:8000/employees/groups')
=======
        httpGet(location.origin+"/employees/groups")
>>>>>>> 882514bcca512efd6000a28491f63252940cd5ad
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
<<<<<<< HEAD
             jsonPostEdit('http://localhost:8000/students/addata', urlPart[3], document.getElementById('stnameInput').value)
             jsonPostEdit('http://localhost:8000/students/chgroup', urlPart[3], selectedGruppaEdit);
             jsonPostEdit('http://localhost:8000/students/chearnstatus', urlPart[3], learnStatusValue);
=======
             jsonPostEdit(location.origin+"/students/addata", urlPart[3], document.getElementById('stnameInput').value)
             jsonPostEdit(location.origin+"/students/chgroup", urlPart[3], selectedGruppaEdit);
             jsonPostEdit(location.origin+"/students/chearnstatus", urlPart[3], learnStatusValue);
>>>>>>> 882514bcca512efd6000a28491f63252940cd5ad

            location.reload();
        }
    }
}
*/
jsonPost('http://localhost:8000/students/getStudName', urlPart[3])
    .then(response => change_studentName(JSON.parse(response)))

function change_studentName(studname){
    console.log(studname);

}