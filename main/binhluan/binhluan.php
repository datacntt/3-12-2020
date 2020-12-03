<?php
$idtl = $_GET['idtl'];
?>
<html>
    <title>Comment cho trang web</title>
    <script src="jquery-3.2.1.min.js"></script>
<body>
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <h1>Comment of user...</h1>
    <div class="comment-form-container">
        <form id="frm-comment">
            <div class="input-row">
                <input type="hidden" name="comment_id" id="commentId" placeholder="Name" value="" />

                <input class="input-field" type="text" name="name" id="name" value="<?php echo $_SESSION['username'] ?>" readonly />
            </div>
            <div class="input-row">

                <input class="input-field" type="text" name="comment" id="comment" placeholder="Add a Comment" style="height:80px" />
                <input type="hidden" name="idtl" id="idtl" placeholder="Tailieu" value="<?php echo $_GET['idtl']; ?>" />
            </div>
            <div>
                <input type="button" class="btn-submit" id="submitButton" value="Publish" />
                <div id="comment-message">Comments Added Successfully!</div>
            </div>

        </form>
    </div>
    <div id="output"></div>
    <script>
        function postReply(commentId) {
            $('#commentId').val(commentId);
            $("#comment").focus();
        }

        $("#submitButton").click(function() {
            $("#comment-message").css('display', 'none');
            var str = $("#frm-comment").serialize();

            $.ajax({
                url: "comment-add.php",
                data: str,
                type: 'post',
                success: function(response) {
                    var result = eval('(' + response + ')');
                    if (response) {
                        $("#comment-message").css('display', 'inline-block');
                        //$("#name").val("");
                        $("#comment").val("");
                        $("#commentId").val("");
                        listComment();
                    } else {
                        alert("Failed to add comments !");
                        return false;
                    }
                }
            });
        });

        $(document).ready(function() {
            listComment();
        });

        function listComment() {
            $.post("comment-list.php?idtl=" + <?php echo $_GET['idtl']; ?>,
                function(data) {
                    var data = JSON.parse(data);

                    var comments = "";
                    var replies = "";
                    var item = "";
                    var parent = -1;
                    var results = new Array();

                    var list = $("<ul class='outer-comment'>");
                    var item = $("<li>").html(comments);

                    for (var i = 0;
                        (i < data.length); i++) {
                        var commentId = data[i]['comment_id'];
                        parent = data[i]['parent_comment_id'];

                        if (parent == "0") {
                            comments = "<div class='comment-row'>" +
                                "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['username'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +
                                "<div class='comment-text'>" + data[i]['comment'] + "</div>" +
                                "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>" +
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
            for (var i = 0;
                (i < data.length); i++) {
                if (commentId == data[i].parent_comment_id) {
                    var comments = "<div class='comment-row'>" +
                        " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['username'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +
                        "<div class='comment-text'>" + data[i]['comment'] + "</div>" +
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</a></div>" +
                        "</div>";
                    var item = $("<li>").html(comments);
                    var reply_list = $('<ul>');
                    list.append(item);
                    item.append(reply_list);
                    listReplies(data[i].comment_id, data, reply_list);
                }
            }
        }
    </script>
</body>

</html>
<?php
$idtl = $_GET['idtl'];
$chuoi = "<script>";
$chuoi = $chuoi . "alert('Chúc mừng bạn có username là " . $_SESSION['username'] . " đã đăng nhập thành công !')" . "</script>";
echo $chuoi;
?>