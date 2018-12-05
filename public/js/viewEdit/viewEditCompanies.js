document.addEventListener("DOMContentLoaded", function (event) {


    jsonPost(location.origin + '/company/getCompanyName', urlPart[3])
        .then(response => change_CompanyNameAddress(JSON.parse(response)));

    function change_CompanyNameAddress(companyNameAddress) {
        // console.log(companyNameAddress);
        let employNameId = document.getElementById('name_company'); //div
        let employAddressId = document.getElementById('address_company');//div
        let employName = document.createElement('td');  //p in div
        let employAddress = document.createElement('td');  //p in div
        let companyCommentId = document.getElementById('company_comment');
        let companyName = document.createElement('td');

        employName.innerHTML = companyNameAddress[0]['company_name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="employName"></button>';
        employAddress.innerHTML = companyNameAddress[0]['address'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="employAddress"></button>';
        companyCommentId.innerHTML = companyNameAddress[0]['comment'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="companyAddress"></button>';

        companyCommentId.append(companyName);
        employNameId.appendChild(employName);
        employAddressId.appendChild(employAddress);
        document.getElementById('employName').onclick = function () {

            employName.innerHTML = "<input type='text' id='employNameInput' value='" + companyNameAddress[0]['company_name'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='employNameButton'></button>";

            document.getElementById('employNameButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeName", urlPart[3], document.getElementById('employNameInput').value);
                location.reload();
            }
        };
        document.getElementById('employAddress').onclick = function () {
            employAddress.innerHTML = "<input type='text' id='employAddressInput' value='" + companyNameAddress[0]['address'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='employAddressButton'></button>";

            document.getElementById('employAddressButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeAddress", urlPart[3], document.getElementById('employAddressInput').value);
                location.reload();
            }
        }


        document.getElementById('companyAddress').onclick = function () {
            companyCommentId.innerHTML = "<input type='text' id='companyCommentInput' value='" + companyNameAddress[0]['comment'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='companyCommentButton'></button>";

            document.getElementById('companyCommentButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeComment", urlPart[3], document.getElementById('companyCommentInput').value);
                location.reload();
            }
        }
    }

    jsonPost(location.origin + '/company/getCompanyStack', urlPart[3])
        .then(response => change_CompanyStack(JSON.parse(response)));

    function change_CompanyStack(companyStack) {
        //change stack comment
        //console.log(companyStack);
        let stackCommentId = document.getElementById('comment_company');
        let stackComment = document.createElement('td');
        stackComment.id = 'comment_company_td';
        stackComment.innerHTML = companyStack[0]['comment'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="ButtonStackComment"></button>';

        stackCommentId.appendChild(stackComment);


        document.getElementById('ButtonStackComment').onclick = function () {
            stackComment.innerHTML = "<input type='text' id='StackComment' value='" + companyStack[0]['comment'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='StackCommentButton'></button>";

            document.getElementById('StackCommentButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeCommentStack", urlPart[3], document.getElementById('StackComment').value);
                location.reload();
            }
        }

        //change stack


        var stackId = [];

        for (i = 0; i < companyStack.length; i++) {

            var stack = document.createElement('i');
            stack.innerHTML = companyStack[i]['stack_name'] + ' ';
            stack.id = 'companyStack';
            document.getElementById('stack_company').appendChild(stack);
            //GroupId[i] = skills[i]['skillGroupId'];
        }
        let stack_button = document.createElement('button');
        stack_button.id = 'StackButton';
        stack_button.className = 'btn btn-link  glyphicon glyphicon-pencil';
        document.getElementById('stack_company').appendChild(stack_button);


        document.getElementById('StackButton').onclick = function () {
            //document.getElementById('companyStack').innerHTML = "<sel" +
            //  "]ect class="form-control" id=" + 'stSelect' + " size="4" name="skill_id[]" multiple></select><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='stSkills'></button>";

            document.getElementById('stack_company').innerHTML = "<select class=\"form-control\" id=" + 'stStackSelect' + " size=\"4\" name=\"stack_id[]\" multiple></select><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='stStacks'></button>";

            httpGet(location.origin + "/stacks")
                .then(response => selectSkills(JSON.parse(response)));

            function selectSkills(extData) {
                for (let gr = 0; gr < extData.length; gr++) {
                    let selectOption = new Option(extData[gr]['stack_name']);
                    document.getElementById('stStackSelect').appendChild(selectOption)
                }
            }

            document.getElementById('stStacks').onclick = function () {
                var result = [];
                var resultCounterId = [];
                var opt;
                for (let i = 0; i < document.getElementById('stStackSelect').options.length; i++) {
                    opt = document.getElementById('stStackSelect').options[i];
                    if (opt.selected) {
                        result.push(opt.value || opt.text);
                        resultCounterId.push(document.getElementById('stStackSelect').options[i].index + 1);
                    }
                }
                //console.log(result);
                jsonPostEdit(location.origin + "/company/ChangeCompanyStack/", urlPart[3], document.getElementById('comment_company_td').textContent, resultCounterId);
                location.reload();
            }
        }
    }

    //get contact_person info

    jsonPost(location.origin + '/company/getContactPersonInfo', urlPart[3])
        .then(response => change_contactPersonInfo(JSON.parse(response)));

    //getContactPersonInfo
    function change_contactPersonInfo(ContactPersonInfo) {

        console.log(ContactPersonInfo);
        let nameContactId = document.getElementById('name_emploee_company');//div
        let nameContact = document.createElement('td');  //p in div

        nameContact.innerHTML = ContactPersonInfo[0]['name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="contactName"></button>';
        nameContactId.appendChild(nameContact);

        document.getElementById('contactName').onclick = function () {

            nameContact.innerHTML = "<input type='text' id='contactNameInput' value='" + ContactPersonInfo[0]['name'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='contactNameButton'></button>";

            document.getElementById('contactNameButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeContactName", urlPart[3], document.getElementById('contactNameInput').value, ContactPersonInfo[0]['person_id']);
                location.reload();
            }
        };

        var contactId = [];
        for (i = 0; i < ContactPersonInfo.length; i++) {

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
            employCommunication_tool.innerHTML = ContactPersonInfo[i]['communication_tool'];
            employCommunication_tool.id = 'employCommTool' + i;
            employContact.innerHTML = ContactPersonInfo[i]['contact'] +
                '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "ContactButton" + i + '></button>';
            employContact.id = 'employCont' + i;
            employComment.innerHTML = ContactPersonInfo[i]['comment'] +
                '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "CommentButton" + i + '></button>';
            employComment.id = 'employComment' + i;
            contactId[i] = ContactPersonInfo[i]['id'];
            document.getElementById('communication_tool').appendChild(div);
            div.appendChild(commToolDiv).appendChild(employCommunication_tool);
            div.appendChild(OtherDiv).appendChild(employContact);
            //div.appendChild(OtherDiv2).appendChild(employComment);

        }
        var CommTool = [];
        var ContactTool = [];
        var CommentTool = [];
        var sel = [];
        for (let count = 0; count < ContactPersonInfo.length; count++) {
            //CommTool[count] = document.getElementById('CommToolButton' + count);
            ContactTool[count] = document.getElementById('ContactButton' + count);
            CommentTool[count] = document.getElementById('CommentButton' + count);
        }

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
        //             jsonPostEdit(location.origin + "/company/ChangeCommTool", ContactPersonInfo[0]['person_id'], sel[i], contactId[i]);
        //             //location.reload();
        //         }
        //     })
        // });
        var input1 = [];
        ContactTool.forEach(function (item, i, ContactTool) {
            ContactTool[i].addEventListener('click', function () {
                input1[i] = document.getElementById('employCont' + i);
                input1[i].innerHTML = "<input type='text' id=" + 'employContactInput' + i + " value='" + ContactPersonInfo[i]['contact'] + "'><button class='btn btn-link  glyphicon glyphicon-floppy-saved' id=" + 'ContactButton' + i + "></button>";
                document.getElementById('ContactButton' + i).onclick = function () {
                    jsonPostEdit(location.origin + "/company/ChangeCommToolNumber", ContactPersonInfo[0]['person_id'], document.getElementById('employContactInput' + i).value, contactId[i]);
                    location.reload();
                }
            })
        });
        console.log(ContactPersonInfo[0]['person_id']);
        // var input2 = [];
        // CommentTool.forEach(function (item, i, CommentTool) {
        //     CommentTool[i].addEventListener('click', function () {
        //         input2[i] = document.getElementById('employComment' + i);
        //         input2[i].innerHTML = "<input type='text' id=" + 'employCommentInput' + i + " value='" + ContactPersonInfo[i]['comment'] + "'><button class='btn btn-link  glyphicon glyphicon-floppy-saved'  id=" + 'CommentButton' + i + "></button>";
        //         document.getElementById('CommentButton' + i).onclick = function () {
        //             jsonPostEdit(location.origin + "/students/ChangeContactComment", urlPart[3], document.getElementById('employCommentInput' + i).value, contactId[i]);
        //             location.reload();
        //         }
        //     })
        // })


        //     var position = document.createElement('p');
        //
        //     position.innerHTML = ContactPersonInfo[i]['position'] + '<button class=\'btn btn-link  glyphicon glyphicon-pencil\' id=' + "PositionButton" + i + '></button>';
        //     position.id = 'stPosition';
        //     PositionsNameMass = document.getElementById('position_emploee_company');
        //     PositionsNameMass.appendChild(position);
        //     PositionsNameMass= document.getElementById("PositionButton")
        //
        //
        // //position
        // var sel7 = [];
        // var positionList = [];
        // PositionsNameMass.forEach(function (item, i, PositionsNameMass) {
        //     PositionsNameMass[i].addEventListener('click', function () {
        //         positionList[i] = document.getElementById('stPosition' + i);
        //         positionList[i].innerHTML = "<select id=" + 'stPositionNameInput' + i + "></select><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id = " + 'ButtonPosition' + i + "></button>";
        //
        //         httpGet(location.origin + "/position")
        //             .then(response => fun8(JSON.parse(response)));
        //
        //         function fun8(extData) {
        //             for (let gr = 0; gr < extData.length; gr++) {
        //                 let selectOption = new Option(extData[gr]['position']);
        //                 document.getElementById('stPositionNameInput' + i).appendChild(selectOption)
        //             }
        //             sel7[i] = document.getElementById('stPositionNameInput' + i);
        //         }
        //
        //         document.getElementById('ButtonPosition' + i).onclick = function () {
        //             sel7[i] = sel7[i].options[sel7[i].selectedIndex].index + 1;
        //             jsonPostEdit(location.origin + "/employee/ChangeCompanyPosition", urlPart[3], sel7[i]);
        //             location.reload();
        //         }
        //     })
        //});

        // let direction_personId = document.getElementById('direction_emploee_company');
        let direction_personId = document.createElement('p');
        direction_personId.innerHTML = ContactPersonInfo[0]['direction'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="direction_person"></button>';
        document.getElementById('direction_emploee_company').appendChild(direction_personId);

        let position_personId = document.createElement('p');

        position_personId.innerHTML = ContactPersonInfo[0]['position'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="position_person"></button>';
        document.getElementById('position_emploee_company').appendChild(position_personId);


        let comment_personId = document.createElement('p');
        comment_personId.innerHTML = ContactPersonInfo[0]['comment'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="direction_person"></button>';
        document.getElementById('comment_emploee_company').appendChild(comment_personId);
        //document.getElementById('position_person').onclick = function () {

            // nameContact.innerHTML = "<input type='text' id='contactNameInput' value='" + ContactPersonInfo[0]['name'] + "'>" +
            //     "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='contactNameButton'></button>";
            //
            // document.getElementById('contactNameButton').onclick = function () {
            //     jsonPostEdit(location.origin + "/company/ChangeContactName", urlPart[3], document.getElementById('contactNameInput').value, ContactPersonInfo[0]['person_id']);
            //     location.reload();
            // }
        // };
            //CommTool[i].addEventListener('click', function () {
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
            //             jsonPostEdit(location.origin + "/company/ChangeCommTool", ContactPersonInfo[0]['person_id'], sel[i], contactId[i]);
            //             //location.reload();
            //         }
            //     })
            // });

        //let direction_personId = document.getElementById('direction_emploee_company');

    }


});