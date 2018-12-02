document.addEventListener("DOMContentLoaded", function (event) {

    jsonPost(location.origin + '/tasks/getTaskInfo', urlPart[3])
        .then(response => changeTaskInfo(JSON.parse(response)));

    function changeTaskInfo(taskInfo) {
        console.log(taskInfo);

    }









});