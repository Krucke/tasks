<h3 class="text-center mt-3">Добавление новой задачи</h3>
<form action="main/create" method="post" id="task">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
    </div>
    <div class="form-group">
        <label for="nameuser">Имя пользователя</label>
        <input type="text" class="form-control" id="nameuser" placeholder="Евгений" name="username" required>
    </div>
    <div class="form-group">
        <label for="texttask">Текст задачи</label>
        <textarea class="form-control" id="texttask" rows="3" name="text_task" required></textarea>
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary mb-2" name="but" id="addtask">Добавить задачу</button>
    </div>
</form>
<form action="../../main/sort" method="post">
    <h3 class="text-center">Просмотр задач</h3>
    <div class="d-flex justify-content-between align-items-center mt-3 sel">
        <h5>Сортировать по столбцу: </h5>
        <select class="form-control col-sm-12 col-md-12 col-lg-2 col-xl-3" name="by_column">
            <option value="3">Email</option>
            <option value="2">Имя</option>
            <option value="8">Статус</option>
        </select>
        <h5>Сортировать по: </h5>
        <select class="form-control col-sm-12 col-md-12 col-lg-2 col-xl-3" name="by_alph">
            <option value="ASC">Возрастанию</option>
            <option value="DESC">Убыванию</option>
        </select>
        <button class="btn btn-primary see" name="sort" type="submit">Отсортировать</button>
    </div>
</form>

<?php foreach ($data['data'] as $task):?>
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

