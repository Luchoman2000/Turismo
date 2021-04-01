<!--    Scripts -->

<script src="<?php echo SERVERURL ?>view/js/jquery.min.js"></script>
<script src="<?php echo SERVERURL ?>view/js/bootstrap.min.js"></script>
<script src="<?php echo SERVERURL ?>view/js/nav.js"></script>

<script>
    $(document).ready(function() {
        // when the user clicks on like


        $('.like').click(function() {
            var postid = $(this).data('id');
            var elem = document.getElementById('like_' + postid);

            if (elem.classList.contains('used')) {

            } else {
                $post = $(this);

                $.ajax({
                    url: '<?php echo SERVERURL ?>admin/ajax-admin/gastronomia.ajax.php',
                    type: 'POST',
                    data: {
                        'liked': 1,
                        'gas_id': postid,
                        'status': 1,
                        'usuinv': <?php echo $_SESSION['userinv']; ?>
                    },
                    success: function(response) {
                        <?php $_POST['status'] = 0 ?>
                        $post.removeClass("btn-primary");
                        $post.addClass("btn-secondary");
                        $post.addClass("used");
                        $post.find('span.likes_count').text(response);

                    }
                });
            }

        });
        $('.likeAtrNat').click(function() {
            var postid = $(this).data('id');
            var elem = document.getElementById('like_' + postid);

            if (elem.classList.contains('used')) {

            } else {
                $post = $(this);

                $.ajax({
                    url: '<?php echo SERVERURL ?>admin/ajax-admin/entrada.ajax.php',
                    type: 'POST',
                    data: {
                        'likedAtrNat': 1,
                        'atr_id': postid,
                        'usuinv': <?php echo $_SESSION['userinv']; ?>
                    },
                    success: function(response) {
                        // $post.removeClass("btn-primary");
                        // $post.addClass("btn-secondary");
                        $post.addClass("used");
                        $post.find('span.likes_count').text(response);

                    }
                });
            }

        });
    });
</script>

