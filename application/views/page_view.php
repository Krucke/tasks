<?php foreach ($data as $task):?>
    <div class="card m-3">
        <div class="card-header">
            <p class="text-left mb-0">Имя пользователя: <?=$task['username']?></p>
            <p class="mb-0">Email пользователя: <?=$task['email_user']?></p>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['user'])){?>
                <form action="main/edit_task/<?=$task['id_task']?>" method="post">
                    <textarea class="form-control" name="text_edit"><?=$task['text_task']?></textarea>
                    <div class="d-flex align-items-center">
                        <p class="m-0">Статус задачи: <?=$task['name_stat']?></p>
                        <div class="d-flex align-items-center justify-content-end flex-fill">
                            <p class="p-0 m-0">Действия: </p>
                            <a href="../../main/confirm_task/<?=$task['id_task']?>" class="btn"><i class="fas fa-check-square"></i></a>
                            <button type="submit" name="edit" class="btn ed" data-user="true"><i class="fas fa-edit"></i></button>
                        </div>
                    </div>
                    <?php if ($task['update_task']!=0){?>
                        <p class="m-0">Примечание: задание было отредактированно администратором</p><?php } ?>
                </form>
            <?php } else { ?>
                <textarea class="form-control" readonly><?=$task['text_task']?></textarea>
                <p class="m-0">Статус задачи: <?=$task['name_stat']?></p>
            <?php }?>
        </div>
    </div>
<?php endforeach;?>