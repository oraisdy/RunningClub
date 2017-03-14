<li class="participants_container">
    <div class="participant_img_container">
        <?php foreach ($Friends as $user) { ?>
            <img onclick="inviteSomebody(this,<?php echo $user['id'];?>);" class="participant_img"
                 src=<?php echo $user['avatar_url'];?> title="<?php echo $user['login'] ?>" />
        <?php } ?>
    </div>
</li>