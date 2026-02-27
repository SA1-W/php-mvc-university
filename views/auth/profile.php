<div class="profile">
    <div>
        <strong>Username: </strong>
        <span><?= $user->username ?></span>
    </div>
    <div>
        <span>
            <strong>Permission level: </strong>
            <?= $user->role ?>
            <?php
            $role = $user->role;
            switch ($role) {

                case 1:
                    echo 'Weak Administartors';
                    break;

                case 2:
                    echo 'Administartors';
                    break;

                case 3:
                    echo 'Super-Administartors';
                    break;

                case 4:
                    echo 'Special Administrators';
                    break;

                default:
                    echo '?';
                    break;
            }
            ?>
        </span>
    </div>

</div>







<style>
    .profile {

        width: 400px;
        padding: 20px;
        border-radius: 10px;
        background-color: rgba(196, 196, 196, 0.5);
    }
</style>