<?php require_once './core/configGeneral.php';
$peticionAjax = false;
require_once './../Turismo/admin/controller-admin/entrada.controlador.php';
$nat = new EntradaControlador();
$us = $nat->CtrMostrarEntradaPublicNat();
if ($us < 1) {
?>
    <script>
        window.location.replace("<?php echo SERVERURL ?>atractivosnaturales/");
    </script>

<?php
} else {
    $nat->CtrInsertarVistaAtrIfNoWasVisited($us['id_atractivo_turistico'], $us['at_vistas']);

?>
    <div class="container d-block" style="padding: 120px 20px 20px; ">
        <div class="intro" style="height: 69px;">
            <h2 class="text-center" style="color: rgb(49,52,55);"><?php echo $us['at_titulo'] ?></h2>
        </div>
        <div class="shadow ">
            <!-- IFrame  -->
            <iframe src="<?php echo SERVERURL;
                            echo $us['at_path_360']; ?>/index.html" name="panorama" width="100%" height="600" marginheight="0" marginwidth="0" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen=“true”>
            </iframe>

        </div>

        <div class="container mt-5 ">
            <div class="row">
                <div class="col ck-content pt-5 card text-break rounded-2 pl-5 pr-5 pb-5">
                    <?php echo base64_decode($us['at_contenido']) ?>
                </div>

            </div>

            <!-- Comentario -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="comment-form-container mt-4">
                        <form id="frm-comment">
                            <div class="input-row">
                                <input type="hidden" name="id_comentario_like" id="commentId" placeholder="Nombre" />
                                <input class="input-field" type="text" name="name" id="name" placeholder="Nombre" />
                            </div>
                            <div class="input-row">
                                <textarea class="input-field" type="text" name="comment" id="comment" placeholder="Añadir un comentario">  </textarea>
                            </div>
                            <div>
                                <!-- <button data-id="<?php //echo $us['id_atractivo_turistico']
                                                        ?>" type="button" class="btn-submit" id="submitButton" >Publicar</button> -->
                                <input data-id="<? echo $us['id_atractivo_turistico']?>" type="button" class="btn-submit" id="submitButton" value="Publicar" />
                                <div id="comment-message">Comentario agredaso satisfactoriamente</div>
                            </div>

                        </form>
                    </div>
                    <div id="output"></div>
                </div>
            </div>

        </div>


        <!-- <div class="row">
        <div class="container-fluid" style="padding: 20px 70px 20px;">
            <div class="row">
                <div class="col-md-12">

                    <article class="single-item">

                        <header class="header">

                            <div class="titleAndAuthor">
                                <span class="title">

                                    Iglesia de Machachi

                                </span>

                            </div>
                        </header>

                        <div class="thumbnail-wrap">
                            <img class="grid-preview-image" loading="lazy" alt="" src="<?php echo SERVERURL ?>view/img/turismo/DSC00815.jpg">


                        </div>

                        <footer class="stats">
                            <button class="single-stat invisible-button loves heart-button loved-0" style="outline:none;">

                                <i class="fa fa-heart icon-heart heart" aria-hidden="true"></i>
                                <span class="count">0</span>
                            </button>

                            <a class="single-stat comments" href="/ansawi/details/ExYNKEE">
                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                <span class="count">0 </span>
                            </a>

                            <a class="single-stat views" href="/ansawi/full/ExYNKEE">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span class="count">0 </span>
                            </a>
                        </footer>

                    </article>

                </div>
            </div>
        </div>
    </div> -->

    </div>


<?php
}
?>

<script>
    function postReply(commentId) {
        $('#commentId').val(commentId);
        $("#name").focus();
    }

    $("#submitButton").click(function() {
        $("#comment-message").css('display', 'none');
        var str = $("#frm-comment").serialize();

        $.ajax({
            url: '<?php echo SERVERURL ?>admin/ajax-admin/entrada.ajax.php',
            data: str,
            type: 'post',
            success: function(response) {
                var result = eval('(' + response + ')');
                if (response) {
                    $("#comment-message").css('display', 'inline-block');
                    $("#name").val("");
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
        var postid = $(this).data('id');
        $.post(
            "<?php echo SERVERURL ?>admin/ajax-admin/entrada.ajax.php", {
                comentarios: 'activo',
                id_post: <?php echo $us['id_atractivo_turistico'] ?>
            },
            function(data) {
                console.log(data);
                if (data != 0) {
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
                        var commentId = data[i]['id_comentario_like'];
                        parent = data[i]['id_comentario_padre'];

                        if (parent == "0") {
                            comments = "<div class='comment-row'>" +
                                "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" +
                                data[i]['uin_nombre'] +
                                " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" +
                                data[i]['cl_fecha'] +
                                "</span></div>" +
                                "<div class='comment-text'>" +
                                data[i]['cl_comentario'] +
                                "</div>" +
                                "<div><a class='btn-reply' onClick='postReply(" +
                                commentId + ")'>Reply</a></div>" +
                                "</div>";

                            var item = $("<li>").html(comments);
                            list.append(item);
                            var reply_list = $('<ul>');
                            item.append(reply_list);
                            listReplies(commentId, data, reply_list);
                        }
                    }
                    $("#output").html(list);
                } else {
                    $("#output").html("<div class='comment-text'>Se el primero en comentar</div>");

                }
            });
    }

    function listReplies(commentId, data, list) {
        for (var i = 0;
            (i < data.length); i++) {
            if (commentId == data[i].id_comentario_padre) {
                var comments = "<div class='comment-row'>" +
                    " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" +
                    data[i]['uin_nombre'] +
                    " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" +
                    data[i]['cl_fecha'] + "</span></div>" +
                    "<div class='comment-text'>" + data[i]['cl_comentario'] +
                    "</div>" +
                    "<div><a class='btn-reply' onClick='postReply(" +
                    data[i]['id_comentario_like'] + ")'>Responder</a></div>" +
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