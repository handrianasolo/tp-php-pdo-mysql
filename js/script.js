// form datatable index
$(document).ready( function () {
    $('#index').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

    	columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    });
} );

// form datatable accueil
$(document).ready( function () {
    $('#accueil').DataTable({
        dom: 'frBtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    });
} );

// form show login and register
function showLogin() {
    $("#login-modal").removeClass("fade").modal("hide");
    $("#register-modal").addClass("fade").modal("show");
}

$(function () {
    $("#dialog-ok").on("click", function () {
        showLogin();
    });
});

// form comment
function postReply(commentId) {
    $('#commentId').val(commentId);
    $("#name").focus();
}

$("#submitButton").click(function () {
       $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();

    $.ajax({
        url: "../comment/comment-add.php",
        data: str,
        type: 'post',
        success: function (response)
        {
            var result = eval('(' + response + ')');
            if (response)
            {
                $("#comment-message").css('display', 'inline-block');
                $("#name").val("");
                $("#comment").val("");
                $("#commentId").val("");
               listComment();
            } else
            {
                alert("Failed to add comments !");
                return false;
            }
        }
    });
});

$(document).ready(function () {
       listComment();
});

function listComment() {
    $.post("../comment/comment-list.php",
            function (data) {
                   var data = JSON.parse(data);
                
                var comments = "";
                var replies = "";
                var item = "";
                var parent = -1;
                var results = new Array();

                var list = $("<ul class='outer-comment'>");
                var item = $("<li>").html(comments);

                for (var i = 0; (i < data.length); i++)
                {
                    var commentId = data[i]['comment_id'];
                    parent = data[i]['parent_comment_id'];

                    if (parent == "0")
                    {
                        comments = "<div class='comment-row'>"+
                        "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                        "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                        "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>"+
                        "</div>";

                        var item = $("<li>").html(comments);
                        list.append(item);
                        var reply_list = $('<ul>');
                        item.append(reply_list);
                        listReplies(commentId, data, reply_list);
                    }
                }
                $("#output").html(list);
            });
}

function listReplies(commentId, data, list) {
    for (var i = 0; (i < data.length); i++)
    {
        if (commentId == data[i].parent_comment_id)
        {
            var comments = "<div class='comment-row'>"+
            " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
            "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
            "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</a></div>"+
            "</div>";
            var item = $("<li>").html(comments);
            var reply_list = $('<ul>');
            list.append(item);
            item.append(reply_list);
            listReplies(data[i].comment_id, data, reply_list);
        }
    }
}



