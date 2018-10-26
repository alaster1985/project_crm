jsonPost(location.origin + '/students/getStudName', urlPart[3])
    .then(response => change_studentName(JSON.parse(response)));

function change_studentName(studName) {
    let studParam = document.getElementById('studParam');  //div
    let studentName = document.createElement('p');  //p in div
    let studentAddress = document.createElement('p');  //p in div

    studentName.innerHTML = studName[0]['name'] + '<button id="stname">Edit</button>';
    studentAddress.innerHTML = studName[0]['address'] + '<button id="staddress">Press to edit</button>';

    studParam.appendChild(studentName);
    studParam.appendChild(studentAddress);

    document.getElementById('stname').onclick = function () {

        studentName.innerHTML = "<input type='text' id='stnameInput' value=" + studName[0]['name'] + "><button id='stname'>Save</button>";

        document.getElementById('stname').onclick = function () {
            jsonPostEdit(location.origin + "/students/ChangeName", urlPart[3], document.getElementById('stnameInput').value);
            location.reload();
        }
    };
    document.getElementById('staddress').onclick = function () {
        studentAddress.innerHTML = "<input type='text' id='staddressInput' value=" + studName[0]['address'] + "><button id='stAddress'>Save</button>";

        document.getElementById('stAddress').onclick = function () {
            jsonPostEdit(location.origin + "/students/ChangeAddress", urlPart[3], document.getElementById('staddressInput').value);
            location.reload();
        }
    }
}

jsonPost(location.origin + '/students/getStudentContacts', urlPart[3])
    .then(response => change_studentContacts(JSON.parse(response)));

function change_studentContacts(studContacts) {
    let i;
    var contactId = [];
    for (i = 0; i < studContacts.length; i++) {
        var studcommunication_tool = document.createElement('p');
        var studcontact = document.createElement('p');
        var studcomment = document.createElement('p');
        studcommunication_tool.innerHTML = studContacts[i]['communication_tool'] + '<button id=' + "CommToolButton" + i + '>Edit</button>';
        studcommunication_tool.id = 'stCommTool' + i;
        studcontact.innerHTML = studContacts[i]['contact'] + '<button id=' + "ContactButton" + i + '>Edit</button>';
        studcontact.id = 'stCont' + i;
        studcomment.innerHTML = studContacts[i]['comment'] + '<button id=' + "CommentButton" + i + '>Edit</button>';
        studcomment.id = 'stComment' + i;
        contactId[i] = studContacts[i]['id'];
        studParam.appendChild(studcommunication_tool);
        studParam.appendChild(studcontact);
        studParam.appendChild(studcomment);


    }
    var CommTool = [];
    ContactTool = [];
    CommentTool = [];
    var sel = [];
    for (count = 0; count < studContacts.length; count++) {
        CommTool[count] = document.getElementById('CommToolButton' + count);
        ContactTool[count] = document.getElementById('ContactButton' + count);
        CommentTool[count] = document.getElementById('CommentButton' + count);
    }

    var selectList = [];
    CommTool.forEach(function (item, i, CommTool) {
        CommTool[i].addEventListener('click', function () {
            selectList[i] = document.getElementById('stCommTool' + i);
            selectList[i].innerHTML = "<select id=" + 'stCommToolInput' + i + "></select><button id = " + 'stCommTools' + i + ">Save</button>";
            httpGet(location.origin + "/communicationTools")
                .then(response => fun(JSON.parse(response)));

            function fun(extData) {
                for (let gr = 0; gr < extData.length; gr++) {
                    let selectOption = new Option(extData[gr]['communication_tool']);
                    document.getElementById("stCommToolInput" + i).appendChild(selectOption)
                }
                sel[i] = document.getElementById('stCommToolInput' + i);
            }

            document.getElementById('stCommTools' + i).onclick = function () {
                sel[i] = sel[i].options[sel[i].selectedIndex].text;
                jsonPostEdit(location.origin + "/students/ChangeCommTool", urlPart[3], sel[i], contactId[i]);
                location.reload();
            }
        })
    });
    var input1 = [];
    ContactTool.forEach(function (item, i, ContactTool) {
        ContactTool[i].addEventListener('click', function () {
            input1[i] = document.getElementById('stCont' + i);
            input1[i].innerHTML = "<input type='text' id=" + 'stContactInput' + i + " value=" + studContacts[i]['contact'] + "><button id=" + 'ContactButton' + i + ">Save</button>";
            document.getElementById('ContactButton' + i).onclick = function () {
                jsonPostEdit(location.origin + "/students/ChangeContact", urlPart[3], document.getElementById('stContactInput' + i).value, contactId[i]);
                location.reload();
            }
        })
    });
    var input2 = [];
    CommentTool.forEach(function (item, i, CommentTool) {
        CommentTool[i].addEventListener('click', function () {
            input2[i] = document.getElementById('stComment' + i);
            input2[i].innerHTML = "<input type='text' id=" + 'stCommentInput' + i + " value=" + studContacts[i]['comment'] + "><button id=" + 'CommentButton' + i + ">Save</button>";
            document.getElementById('CommentButton' + i).onclick = function () {
                jsonPostEdit(location.origin + "/students/ChangeContactComment", urlPart[3], document.getElementById('stCommentInput' + i).value, contactId[i]);
                location.reload();
            }
        })
    })

}

jsonPost(location.origin + '/students/getStudyInfo', urlPart[3])
    .then(response => change_studyInfo(JSON.parse(response)));

function change_studyInfo(studyInfo) {
    let i;
    for (i = 0; i < studyInfo.length; i++) {
        var group_name = document.createElement('p');
        var learning_status = document.createElement('p');
        var employment_status = document.createElement('p');
        group_name.innerHTML = studyInfo[i]['group_name'] + '<button id=' + "GroupNameButton" + i + '>Edit</button>';
        // GroupNameMass[i] = document.getElementById("GroupNameButton" + i);
        group_name.id = 'stGroupName' + i;
        learning_status.innerHTML = studyInfo[i]['learning_status'] + '<button id=' + "LearningStatusButton" + i + '>Edit</button>';
        learning_status.id = 'stLearningStatus' + i;
        employment_status.innerHTML = studyInfo[i]['employment_status'] + '<button id=' + "EmploymentStatusButton" + i + '>Edit</button>';
        employment_status.id = 'stEmploymentStatus' + i;
        studParam.appendChild(group_name);
        studParam.appendChild(learning_status);
        studParam.appendChild(employment_status);
    }
    //get skills
    jsonPost(location.origin + '/students/getSkills', urlPart[3])
        .then(response => change_studentSkills(JSON.parse(response)));

    function change_studentSkills(skills) {
        var skillMass = [];
        var skillId = [];
        var GroupId = [];
        for (i = 0; i < skills.length; i++) {
            var skill = document.createElement('p');
            skill.innerHTML = skills[i]['skill_name'] + '<button id=' + "SkillButton" + i + '>Edit</button>';
            skill.id = 'stSkill' + i;
            studParam.appendChild(skill);
            skillMass[i] = document.getElementById("SkillButton" + i);
            GroupId[i] = skills[i]['skillGroupId'];
        }
        var DirectionStatusMass = [];
        var StartDateMass = [];
        var FinishDateMass = [];
        var HomecomingDateMass = [];
        for (i = 0; i < studyInfo.length; i++) {
            var direction = document.createElement('p');
            var start_date = document.createElement('p');
            var finish_date = document.createElement('p');
            var homecoming_date = document.createElement('p');
            direction.innerHTML = studyInfo[i]['direction'] + '<button id=' + "DirectionButton" + i + '>Edit</button>';
            direction.id = 'stDirection' + i;
            start_date.innerHTML = studyInfo[i]['start_date'] + '<button id=' + "StartDateButton" + i + '>Edit</button>';
            start_date.id = 'stStartDate' + i;
            finish_date.innerHTML = studyInfo[i]['finish_date'] + '<button id=' + "FinishDateButton" + i + '>Edit</button>';
            finish_date.id = 'stFinishDate' + i;
            homecoming_date.innerHTML = studyInfo[i]['homecoming_date'] + '<button id=' + "HomecomingDateButton" + i + '>Edit</button>';
            homecoming_date.id = 'stHomecomingDate' + i;
            studParam.appendChild(direction);
            studParam.appendChild(start_date);
            studParam.appendChild(finish_date);
            studParam.appendChild(homecoming_date);
            DirectionStatusMass[i] = document.getElementById("DirectionButton" + i);
            StartDateMass[i] = document.getElementById("StartDateButton" + i);
            FinishDateMass[i] = document.getElementById("FinishDateButton" + i);
            HomecomingDateMass[i] = document.getElementById("HomecomingDateButton" + i);
        }
        //COMPANY select('company_name','position')
        jsonPost(location.origin + '/students/getStudyCompany', urlPart[3])
            .then(response => change_companyInfo(JSON.parse(response)));

        function change_companyInfo(company) {
            var CompaniesNameMass = [];
            var PositionsNameMass = [];
            let i;
            for (i = 0; i < company.length; i++) {
                var company_name = document.createElement('p');
                var position = document.createElement('p');
                company_name.innerHTML = company[i]['company_name'] + '<button id=' + "CompanyButton" + i + '>Edit</button>';
                company_name.id = 'stCompany' + i;
                position.innerHTML = company[i]['position'] + '<button id=' + "PositionButton" + i + '>Edit</button>';
                position.id = 'stPosition' + i;
                studParam.appendChild(company_name);
                studParam.appendChild(position);
                CompaniesNameMass[i] = document.getElementById("CompanyButton" + i)
                PositionsNameMass[i] = document.getElementById("PositionButton" + i)
            }

            //company name
            var sel6 = [];
            var companyList = [];
            CompaniesNameMass.forEach(function (item, i, CompaniesNameMass) {
                CompaniesNameMass[i].addEventListener('click', function () {
                    companyList[i] = document.getElementById('stCompany' + i);
                    companyList[i].innerHTML = "<select id=" + 'stCompanyNameInput' + i + "></select><button id = " + 'ButtonCompanyName' + i + ">Save</button>";
                    httpGet(location.origin + "/company")
                        .then(response => fun7(JSON.parse(response)));

                    function fun7(extData) {
                        for (let gr = 0; gr < extData.length; gr++) {
                            let selectOption = new Option(extData[gr]['company_name']);
                            document.getElementById('stCompanyNameInput' + i).appendChild(selectOption)
                        }
                        sel6[i] = document.getElementById('stCompanyNameInput' + i);
                    }

                    document.getElementById('ButtonCompanyName' + i).onclick = function () {
                        sel6[i] = sel6[i].options[sel6[i].selectedIndex].index + 1;
                        jsonPostEdit(location.origin + "/students/ChangeCompany", urlPart[3], sel6[i]);
                        location.reload();
                    }
                })
            });

            //position
            var sel7 = [];
            var positionList = [];
            PositionsNameMass.forEach(function (item, i, PositionsNameMass) {
                PositionsNameMass[i].addEventListener('click', function () {
                    positionList[i] = document.getElementById('stPosition' + i);
                    positionList[i].innerHTML = "<select id=" + 'stPositionNameInput' + i + "></select><button id = " + 'ButtonPosition' + i + ">Save</button>";
                    httpGet(location.origin + "/position")
                        .then(response => fun8(JSON.parse(response)));

                    function fun8(extData) {
                        for (let gr = 0; gr < extData.length; gr++) {
                            let selectOption = new Option(extData[gr]['position']);
                            document.getElementById('stPositionNameInput' + i).appendChild(selectOption)
                        }
                        sel7[i] = document.getElementById('stPositionNameInput' + i);
                    }

                    document.getElementById('ButtonPosition' + i).onclick = function () {
                        sel7[i] = sel7[i].options[sel7[i].selectedIndex].index + 1;
                        jsonPostEdit(location.origin + "/students/ChangeCompanyPosition", urlPart[3], sel7[i]);
                        location.reload();
                    }
                })
            });


        }

        //get direction
        var sel5 = [];
        var directionList = [];
        DirectionStatusMass.forEach(function (item, i, DirectionStatusMass) {
            DirectionStatusMass[i].addEventListener('click', function () {
                directionList[i] = document.getElementById('stDirection' + i);
                directionList[i].innerHTML = "<select id=" + 'stDirectionNameInput' + i + "></select><button id = " + 'ButtonDirection' + i + ">Save</button>";
                httpGet(location.origin + "/direction")
                    .then(response => fun4(JSON.parse(response)));

                function fun4(extData) {
                    for (let gr = 0; gr < extData.length; gr++) {
                        let selectOption = new Option(extData[gr]['direction']);
                        document.getElementById('stDirectionNameInput' + i).appendChild(selectOption)
                    }
                    sel5[i] = document.getElementById('stDirectionNameInput' + i);
                }

                document.getElementById('ButtonDirection' + i).onclick = function () {
                    sel5[i] = sel5[i].options[sel5[i].selectedIndex].index + 1;
                    jsonPostEdit(location.origin + "/students/ChangeDirection", urlPart[3], sel5[i]);
                    location.reload();
                }
            })
        });

        //Finish DATE CHANGE
        var finishDate = [];
        FinishDateMass.forEach(function (item, i, FinishDateMass) {
            FinishDateMass[i].addEventListener('click', function () {
                finishDate[i] = document.getElementById('stFinishDate' + i);
                finishDate[i].innerHTML = "<input type='date' id=" + 'stFinishDataInput' + i + " value=" + studyInfo[i]['finish_date'] + "><button id=" + 'ButtonFinishData' + i + ">Save</button>";
                document.getElementById('ButtonFinishData' + i).onclick = function () {
                    jsonPostEdit(location.origin + "/students/ChangeFinishDate", urlPart[3], document.getElementById('stFinishDataInput' + i).value, studyInfo[i]['group_name']);
                    location.reload();
                }
            })
        });
        //Start Date Change
        var startDate = [];
        StartDateMass.forEach(function (item, i, StartDateMass) {
            StartDateMass[i].addEventListener('click', function () {
                startDate[i] = document.getElementById('stStartDate' + i);
                startDate[i].innerHTML = "<input type='date' id=" + 'stStartDataInput' + i + " value=" + studyInfo[i]['start_date'] + "><button id=" + 'ButtonStartData' + i + ">Save</button>";
                document.getElementById('ButtonStartData' + i).onclick = function () {
                    jsonPostEdit(location.origin + "/students/ChangeStartDate", urlPart[3], document.getElementById('stStartDataInput' + i).value, studyInfo[i]['group_name']);
                    location.reload();
                }
            })
        });

        //Homecoming Date
        var homeDate = [];
        HomecomingDateMass.forEach(function (item, i, HomecomingDateMass) {
            HomecomingDateMass[i].addEventListener('click', function () {
                homeDate[i] = document.getElementById('stHomecomingDate' + i);
                homeDate[i].innerHTML = "<input type='date' id=" + 'stHomeComingDataInput' + i + " value=" + studyInfo[i]['homecoming_date'] + "><button id=" + 'ButtonHomeComing' + i + ">Save</button>";
                document.getElementById('ButtonHomeComing' + i).onclick = function () {
                    jsonPostEdit(location.origin + "/students/ChangeHomecomingDate", urlPart[3], document.getElementById('stHomeComingDataInput' + i).value, studyInfo[i]['group_name']);
                    location.reload();
                }
            })
        });
        //GET SKILLS
        var selectSkills = [];
        var sel = [];
        skillMass.forEach(function (item, i, skillMass) {
            skillMass[i].addEventListener('click', function () {
                selectSkills[i] = document.getElementById('stSkill' + i);
                selectSkills[i].innerHTML = "<select id=" + 'stSkills' + i + "></select><button id = " + 'ButtonSkill' + i + ">Save</button>";
                httpGet(location.origin + "/skills")
                    .then(response => fun2(JSON.parse(response)));

                function fun2(extData) {
                    for (let gr = 0; gr < extData.length; gr++) {
                        let selectOption = new Option(extData[gr]['skill_name']);
                        document.getElementById("stSkills" + i).appendChild(selectOption)
                    }
                    sel[i] = document.getElementById('stSkills' + i);
                }

                document.getElementById('ButtonSkill' + i).onclick = function () {
                    skillId[i] = sel[i].options[sel[i].selectedIndex].index + 1;
                    jsonPostEdit(location.origin + "/students/ChangeSkill", urlPart[3], GroupId[i], skillId[i]);
                    location.reload();
                }
            })
        });
    }

    //get groups

    var GroupNameMass = [];
    var LearningStatusMass = [];
    var EmploymentStatusMass = [];
    for (i = 0; i < studyInfo.length; i++) {
        GroupNameMass[i] = document.getElementById("GroupNameButton" + i);
        LearningStatusMass[i] = document.getElementById("LearningStatusButton" + i);
        EmploymentStatusMass[i] = document.getElementById("EmploymentStatusButton" + i);
    }

    var sel2 = [];
    var groupList = [];
    GroupNameMass.forEach(function (item, i, GroupNameMass) {
        GroupNameMass[i].addEventListener('click', function () {
            groupList[i] = document.getElementById('stGroupName' + i);
            groupList[i].innerHTML = "<select id=" + 'stGroupNameInput' + i + "></select><button id = " + 'ButtonGroupName' + i + ">Save</button>";
            httpGet(location.origin + "/students/groups")
                .then(response => fun3(JSON.parse(response)));

            function fun3(extData) {
                for (let gr = 0; gr < extData.length; gr++) {
                    let selectOption = new Option(extData[gr]['group_name']);
                    document.getElementById('stGroupNameInput' + i).appendChild(selectOption)
                }
                sel2[i] = document.getElementById('stGroupNameInput' + i);
            }

            document.getElementById('ButtonGroupName' + i).onclick = function () {
                sel2[i] = sel2[i].options[sel2[i].selectedIndex].index + 1;
                jsonPostEdit(location.origin + "/students/ChangeGroup", urlPart[3], sel2[i]);
                location.reload();
            }
        })
    });

    //get learning_status
    var sel3 = [];
    var learningStatusList = [];
    LearningStatusMass.forEach(function (item, i, LearningStatusMass) {
        LearningStatusMass[i].addEventListener('click', function () {
            learningStatusList[i] = document.getElementById('stLearningStatus' + i);
            learningStatusList[i].innerHTML = "<select id=" + 'stLearningStatusNameInput' + i + "></select><button id = " + 'ButtonLearningStatus' + i + ">Save</button>";
            httpGet(location.origin + "/learningStatus")
                .then(response => fun4(JSON.parse(response)));

            function fun4(extData) {
                for (let gr = 0; gr < extData.length; gr++) {
                    let selectOption = new Option(extData[gr]['learning_status']);
                    document.getElementById('stLearningStatusNameInput' + i).appendChild(selectOption)
                }
                sel3[i] = document.getElementById('stLearningStatusNameInput' + i);
            }

            document.getElementById('ButtonLearningStatus' + i).onclick = function () {
                sel3[i] = sel3[i].options[sel3[i].selectedIndex].text;
                jsonPostEdit(location.origin + "/students/ChangeLearningStatus", urlPart[3], sel3[i]);
                location.reload();
            }
        })
    });
    //get employment_status
    var sel4 = [];
    var employmentStatusList = [];
    EmploymentStatusMass.forEach(function (item, i, LearningStatusMass) {
        EmploymentStatusMass[i].addEventListener('click', function () {
            employmentStatusList[i] = document.getElementById('stEmploymentStatus' + i);
            employmentStatusList[i].innerHTML = "<select id=" + 'stEmploymentStatusNameInput' + i + "></select><button id = " + 'ButtonEmploymentStatus' + i + ">Save</button>";
            httpGet(location.origin + "/employmentStatus")
                .then(response => fun4(JSON.parse(response)));

            function fun4(extData) {
                for (let gr = 0; gr < extData.length; gr++) {
                    let selectOption = new Option(extData[gr]['employment_status']);
                    document.getElementById('stEmploymentStatusNameInput' + i).appendChild(selectOption)
                }
                sel4[i] = document.getElementById('stEmploymentStatusNameInput' + i);
            }

            document.getElementById('ButtonEmploymentStatus' + i).onclick = function () {
                sel4[i] = sel4[i].options[sel4[i].selectedIndex].text;
                jsonPostEdit(location.origin + "/students/ChangeEmploymentStatus", urlPart[3], sel4[i]);
                location.reload();
            }
        })
    });

}



