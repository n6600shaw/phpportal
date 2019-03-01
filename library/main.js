
$(function () {

    $("#setting").resizable({
        handles: "n ,s"
    });

    jsonObj = { Name: "Value" };
    jsonString = JSON.stringify(jsonObj, null, '\t');
    $('textarea').val(jsonString);

    $("#parameterType").text($("#selectMethod option:selected").text());

    $("#selectMethod").change(function () {
        $("#parameterType").text($("#selectMethod option:selected").text())
    });


    $(window).ready(function () {
        resizeDiv($('#content'));
    });

    $(window).bind("resize", function () {
        resizeDiv($('#content'));
    });

    $('#refresh').click(function () {

        console.log('refresh');
        document.getElementById('iframe1').src += '';

    });


});

var resizeDiv = function (object) {
    object.height($(window).height() - $('#setting').height());
};

function goFolder(para) {

    var dirPath = $(para).attr('href');


    $.ajax({
        url: "/pportal/getContent.php", //the page containing php script
        type: "get", //request type,
        data: { action: "getContent", directory: dirPath },
        success: function (result) {
            $('#content').html(result);

        }
    });


};

function addVariable(item, event) {

    setSessionVar();

    var method = $('#selectMethod').val();

    //clear out query string in url
    $(item).attr('href', $(item).attr('name'));

    var baseHref = $(item).attr('href');

    //
    var parameterString = $('#parameterString').val();
    var parameterArray = $.parseJSON(parameterString);


    $('#iframe1').attr('src', baseHref);

    //GET
    if (method === 'get') {

        var query = baseHref + "?";
        $.each(parameterArray, function (i, v) {
            query = query + i + "=" + v + "&";
        });
        console.log(query);
        $(item).attr('href', query);

    }

    //POST
    else {


        $.each(parameterArray, function (i, v) {
            $('<input>').attr({
                type: 'hidden',
                id: i,
                name: i,
                value: v
            }).appendTo('#post-table');
        });

        //submit the form with post variables
        $("#post-table").attr('action', baseHref).submit();
        event.preventDefault();

    }
};

function setSessionVar() {

    var sessionStr = $('#sessionString').val();
    $.ajax({
        url: "/pportal/set-session.php", //the page containing php script
        type: "post", //request type,
        data: { sessionString: sessionStr },
        success: function (result) {
            console.log("ajax:" + result);
        }
    });


}