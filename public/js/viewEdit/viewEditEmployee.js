//class='btn btn-link  glyphicon glyphicon-pencil'
//class ='btn btn-link  glyphicon glyphicon-floppy-saved'
document.addEventListener("DOMContentLoaded", function (event) {
    //CHANGE NAME AND ADDRESS
    jsonPost(location.origin + '/students/getStudName', urlPart[3])
        .then(response => change_employeeName(JSON.parse(response)));

    function change_employeeName(employeeName) {
        //console.log(employeeName);
        let employNameId = document.getElementById('name_emploee'); //div
        let employAddressId = document.getElementById('address_emploee');//div
        let employName = document.createElement('td');  //p in div
        let employAddress = document.createElement('td');  //p in div


        employName.innerHTML = employeeName[0]['name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="employName"></button>';
        employAddress.innerHTML = employeeName[0]['address'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="employAddress"></button>';

        employNameId.appendChild(employName);
        employAddressId.appendChild(employAddress);
        document.getElementById('employName').onclick = function () {

            employName.innerHTML = "<input type='text' id='employNameInput' value='" + employeeName[0]['name'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='employNameButton'></button>";

            document.getElementById('employNameButton').onclick = function () {
                jsonPostEdit(location.origin + "/students/ChangeName", urlPart[3], document.getElementById('employNameInput').value);
                location.reload();
            }
        };
        document.getElementById('employAddress').onclick = function () {
            employAddress.innerHTML = "<input type='text' id='employAddressInput' value='" + employeeName[0]['address'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='employAddressButton'></button>";

            document.getElementById('employAddressButton').onclick = function () {
                jsonPostEdit(location.origin + "/students/ChangeAddress", urlPart[3], document.getElementById('employAddressInput').value);
                location.reload();
            }
        }


        //CHANGE COMMUNICATION TOOLS
        jsonPost(location.origin + '/students/getStudentContacts', urlPart[3])
            .then(response => change_employContacts(JSON.parse(response)));

        function change_employContacts(employeeContact) {
            //console.log(employeeContact);
            let i;
            var contactId = [];
            for (i = 0; i < employeeContact.length; i++) {
                let div = document.createElement('div');
                div.className = 'row';
                div.id = 'div' + i;
                let commToolDiv = document.createElement('div');
                commToolDiv.className = 'col-md-4 col-sm-12 col-xs-12 parametr';

                let OtherDiv = document.createElement('div');
                OtherDiv.className = 'col-md-4 col-sm-12 col-xs-12';
                let OtherDiv2 = document.createElement('div');
                OtherDiv2.className = 'col-md-4 col-sm-12 col-xs-12';

                let employCommunication_tool = document.createElement('p');
                let employContact = document.createElement('p');
                let employComment = document.createElement('p');
                employCommunication_tool.innerHTML = employeeContact[i]['communication_tool'];
                    //'<button class=\'btn btn-link  glyphicon glyphicon-pencil\'  id=' + "CommToolButton" + i + '></button>';
                employCommunication_tool.id = 'employCommTool' + i;
                employContact.innerHTML = employeeContact[i]['contact'] +
                    '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "ContactButton" + i + '></button>';
                employContact.id = 'employCont' + i;
                employComment.innerHTML = employeeContact[i]['comment'] +
                    '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "CommentButton" + i + '></button>';
                employComment.id = 'employComment' + i;
                contactId[i] = employeeContact[i]['id'];
                document.getElementById('contactInfo').appendChild(div);
                div.appendChild(commToolDiv).appendChild(employCommunication_tool);
                div.appendChild(OtherDiv).appendChild(employContact);
                div.appendChild(OtherDiv2).appendChild(employComment);

            }
            var CommTool = [];
            var ContactTool = [];
            var CommentTool = [];
            var sel = [];
            for (let count = 0; count < employeeContact.length; count++) {
                // CommTool[count] = document.getElementById('CommToolButton' + count);
                 ContactTool[count] = document.getElementById('ContactButton' + count);
                CommentTool[count] = document.getElementById('CommentButton' + count);
            }
            //
            // var selectList = [];
            // CommTool.forEach(function (item, i, CommTool) {
            //     CommTool[i].addEventListener('click', function () {
            //         selectList[i] = document.getElementById('employCommTool' + i);
            //         selectList[i].innerHTML = "<select id=" + 'employCommToolInput' + i + "></select><button class='btn btn-link  glyphicon glyphicon-floppy-saved' id = " + 'employCommTools' + i + "></button>";
            //         httpGet(location.origin + "/communicationTools")
            //             .then(response => CommToolSelect(JSON.parse(response)));
            //
            //         function CommToolSelect(extData) {
            //             for (let gr = 0; gr < extData.length; gr++) {
            //                 let selectOption = new Option(extData[gr]['communication_tool']);
            //                 document.getElementById("employCommToolInput" + i).appendChild(selectOption)
            //             }
            //             sel[i] = document.getElementById('employCommToolInput' + i);
            //         }
            //
            //         document.getElementById('employCommTools' + i).onclick = function () {
            //             sel[i] = sel[i].options[sel[i].selectedIndex].text;
            //             jsonPostEdit(location.origin + "/students/ChangeCommTool", urlPart[3], sel[i], contactId[i]);
            //             location.reload();
            //         }
            //     })
            // });
            var input1 = [];
            ContactTool.forEach(function (item, i, ContactTool) {
                ContactTool[i].addEventListener('click', function () {
                    input1[i] = document.getElementById('employCont' + i);
                    input1[i].innerHTML = "<input type='text' id=" + 'employContactInput' + i + " value='" + employeeContact[i]['contact'] + "'><button class='btn btn-link  glyphicon glyphicon-floppy-saved' id=" + 'ContactButton' + i + "></button>";
                    document.getElementById('ContactButton' + i).onclick = function () {
                        jsonPostEdit(location.origin + "/students/ChangeContact", urlPart[3], document.getElementById('employContactInput' + i).value, contactId[i]);
                        location.reload();
                    }
                })
            });
            var input2 = [];
            CommentTool.forEach(function (item, i, CommentTool) {
                CommentTool[i].addEventListener('click', function () {
                    input2[i] = document.getElementById('employComment' + i);
                    input2[i].innerHTML = "<input type='text' id=" + 'employCommentInput' + i + " value='" + employeeContact[i]['comment'] + "'><button class='btn btn-link  glyphicon glyphicon-floppy-saved'  id=" + 'CommentButton' + i + "></button>";
                    document.getElementById('CommentButton' + i).onclick = function () {
                        jsonPostEdit(location.origin + "/students/ChangeContactComment", urlPart[3], document.getElementById('employCommentInput' + i).value, contactId[i]);
                        location.reload();
                    }
                })
            })

        }

    }


    jsonPost(location.origin + '/employees/getInformation', urlPart[3])
        .then(response => change_studyInfo(JSON.parse(response)));

    function change_studyInfo(studyInfo) {
        // console.log(studyInfo);
        let i;
        var employCommentMass = [];
        var DirectionStatusMass = [];
        var ASPTMass = [];
        for (i = 0; i < studyInfo.length; i++) {


            let direction = document.createElement('p');
            let employComment = document.createElement('p');
            let candidate = document.createElement('p');
            direction.innerHTML = studyInfo[i]['direction'] + '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "EmployDirectionButton" + i + '></button>';
            direction.id = 'employDirection' + i;
            employComment.innerHTML = studyInfo[i]['comment'] + '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "EmployCommentButton" + i + '></button>';
            employComment.id = 'employCommenT' + i;
            if(studyInfo[i]['ASPT'] === 0) {
                candidate.innerHTML = 'No' + '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "ASPTBUTTON" + i + '></button>';
            }
            else{
                candidate.innerHTML = 'Yes' + '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "ASPTBUTTON" + i + '></button>';
            }
            candidate.id = 'candidate' + i;

            document.getElementById('ASPT').appendChild(candidate);
            document.getElementById('comment_emploee').appendChild(employComment);
            document.getElementById('direction_emploee').appendChild(direction);
            DirectionStatusMass[i] = document.getElementById("EmployDirectionButton" + i);
            employCommentMass[i] = document.getElementById('EmployCommentButton' + i);
            ASPTMass[i] = document.getElementById('ASPT');
        }

        // CHANGE DIRECTION_-_-
        var directionList = [];
        var sel5 = [];
        DirectionStatusMass.forEach(function (item, i, DirectionStatusMass) {
            DirectionStatusMass[i].addEventListener('click', function () {
                directionList[i] = document.getElementById('employDirection' + i);
                directionList[i].innerHTML = "<select id=" + 'employDirectionNameInput' + i + "></select><button class='btn btn-link  glyphicon glyphicon-floppy-saved' id = " + 'ButtonDirection' + i + "></button>";
                httpGet(location.origin + "/direction")
                    .then(response => fun4(JSON.parse(response)));

                function fun4(extData) {
                    for (let gr = 0; gr < extData.length; gr++) {
                        let selectOption = new Option(extData[gr]['direction']);
                        document.getElementById('employDirectionNameInput' + i).appendChild(selectOption)
                    }
                    sel5[i] = document.getElementById('employDirectionNameInput' + i);
                }

                document.getElementById('ButtonDirection' + i).onclick = function () {
                    sel5[i] = sel5[i].options[sel5[i].selectedIndex].index + 1;
                    jsonPostEdit(location.origin + "/employees/ChangeDirection", urlPart[3], sel5[i]);
                    location.reload();
                }
            })
        });

        //Change comment
        var employComm = [];
        employCommentMass.forEach(function (item, i, employCommentMass) {
            employCommentMass[i].addEventListener('click', function () {
                employComm[i] = document.getElementById('employCommenT' + i);
                employComm[i].innerHTML = "<input type='text' id=" + 'employCommentInput' + i + " value='" + studyInfo[i]['comment'] + "'><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id=" + 'ButtonEmployComment' + i + "></button>";
                document.getElementById('ButtonEmployComment' + i).onclick = function () {
                    jsonPostEdit(location.origin + "/employees/ChangeEmployeeComment", urlPart[3], document.getElementById('employCommentInput' + i).value);
                    location.reload();
                }
            })
        });

        //change ASPT
        var ASPTlist = [];
        var sel6 = [];
        var option = document.createElement('option');
        option.innerHTML = 0;
        var option1 = document.createElement('option');
        option1.innerHTML = 1;

        ASPTMass.forEach(function (item, i, ASPTMass) {
            ASPTMass[i].addEventListener('click', function () {
                ASPTlist[i] = document.getElementById('candidate' + i);
                ASPTlist[i].innerHTML = "<select id=" + 'employASPTInput' + i + "></select><button class='btn btn-link  glyphicon glyphicon-floppy-saved' id = " + 'ButtonDirection' + i + "></button>";

                document.getElementById('employASPTInput' + i).appendChild(option);
                document.getElementById('employASPTInput' + i).appendChild(option1);
                sel6[i] = document.getElementById('employASPTInput' + i);
                document.getElementById('ButtonDirection' + i).onclick = function () {
                    jsonPostEdit(location.origin + "/employees/ChangeASPT", urlPart[3], sel6[i].value);
                     location.reload();
                }
            })
        });





        //get skills
        jsonPost(location.origin + '/students/getSkills', urlPart[3])
            .then(response => change_employeeSkills(JSON.parse(response)));

        function change_employeeSkills(skills) {
            var skillMass = [];
            var skillId = [];
            var GroupId = [];
            for (i = 0; i < skills.length; i++) {
                var skill = document.createElement('i');
                skill.innerHTML = skills[i]['skill_name'] + ' ';
                skill.id = 'employSkill';
                document.getElementById('skills_emploee').appendChild(skill);
                skillMass[i] = document.getElementById("SkillButton" + i);
                GroupId[i] = skills[i]['skillGroupId'];
            }
            let skill_button = document.createElement('button');
            skill_button.id = 'SkillButton';
            skill_button.className='btn btn-link  glyphicon glyphicon-pencil';
            document.getElementById('skills_emploee').appendChild(skill_button);


            document.getElementById('SkillButton').onclick = function () {
                document.getElementById('skills_emploee').innerHTML = "<select class=\"form-control\" id=" + 'stSkillsSelect' + " size=\"4\" name=\"skill_id[]\" multiple></select><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='stSkills'></button>";
                httpGet(location.origin + "/skills")
                    .then(response => selectSkills(JSON.parse(response)));

                function selectSkills(extData) {
                    for (let gr = 0; gr < extData.length; gr++) {
                        let selectOption = new Option(extData[gr]['skill_name']);
                        document.getElementById('stSkillsSelect').appendChild(selectOption)
                    }
                }

                document.getElementById('stSkills').onclick = function () {
                    var result = [];
                    var resultCounterId = [];
                    var opt;
                    for (let i = 0; i < document.getElementById('stSkillsSelect').options.length; i++) {
                        opt = document.getElementById('stSkillsSelect').options[i];
                        if (opt.selected) {
                            result.push(opt.value || opt.text);
                            resultCounterId.push(document.getElementById('stSkillsSelect').options[i].index + 1);
                        }
                    }
                    // console.log(result);
                    jsonPostEdit(location.origin + "/students/ChangeSkills", urlPart[3], result, resultCounterId);
                    location.reload();
                }
            }
        }

    }

    //get company status
    jsonPost(location.origin + '/employee/getEmployeeCompany', urlPart[3])
        .then(response => change_companyInfo(JSON.parse(response)));

    function change_companyInfo(company) {
        // console.log(company);
        var CompaniesNameMass = [];
        var PositionsNameMass = [];
        let i;
        for (i = 0; i < company.length; i++) {
            var company_name = document.createElement('p');
            var position = document.createElement('p');

            company_name.innerHTML = company[i]['company_name'] + '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "CompanyButton" + i + '></button>';
            company_name.id = 'stCompany' + i;
            position.innerHTML = company[i]['position'] + '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "PositionButton" + i + '></button>';

            position.id = 'stPosition' + i;
            document.getElementById('it_company_emploee').appendChild(company_name);
            document.getElementById('position_emploee').appendChild(position);
            CompaniesNameMass[i] = document.getElementById("CompanyButton" + i)
            PositionsNameMass[i] = document.getElementById("PositionButton" + i)
        }

        //company name
        var sel6 = [];
        var companyList = [];
        CompaniesNameMass.forEach(function (item, i, CompaniesNameMass) {
            CompaniesNameMass[i].addEventListener('click', function () {
                companyList[i] = document.getElementById('stCompany' + i);
                companyList[i].innerHTML = "<select id=" + 'stCompanyNameInput' + i + "></select><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id = " + 'ButtonCompanyName' + i + "></button>";

                companyList[i].innerHTML = "<select id=" + 'stCompanyNameInput' + i + "></select><button id = " + 'ButtonCompanyName' + i + " class ='btn btn-link  glyphicon glyphicon-floppy-saved'></button>";
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
                    jsonPostEdit(location.origin + "/employee/ChangeCompany", urlPart[3], sel6[i]);
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
                positionList[i].innerHTML = "<select id=" + 'stPositionNameInput' + i + "></select><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id = " + 'ButtonPosition' + i + "></button>";

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
                    jsonPostEdit(location.origin + "/employee/ChangeCompanyPosition", urlPart[3], sel7[i]);
                    location.reload();
                }
            })
        });

    }

    jsonPost(location.origin + '/employee/getStudyCompanyStacks', urlPart[3])
        .then(response => company_stacks(JSON.parse(response)));
    function company_stacks(stacks) {
        //console.log(stacks);
        for (i = 0; i < stacks.length; i++) {
            let stack = document.createElement('i');
            stack.innerHTML = stacks[i]['stack_name'] + ' ';
            document.getElementById('stack_emploee').appendChild(stack);
        }
    }
});