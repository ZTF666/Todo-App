<?php include('srvr/DAO.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nabilelatif.web.app/">
    <meta property="og:title" content="ZTF , software,web and game dev">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Todo List</title>
    <link rel="stylesheet" href="css/Style.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <!--  -->
    <div class="background-container">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/moon2.png" alt="">
        <div class="stars"></div>
        <div class="twinkling"></div>
        <div class="clouds"></div>
    </div>
    <!--  -->
    <div class="container mt-5">
        <div class="jumbotron">
            <div class="">

                <form action="srvr/processing.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buy Oreos" aria-label="Task" name="task" id="task" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class=" btn btn-primary" type="submit">Go !</button>
                        </div>
                    </div>

                </form>

                <div class="card">

                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task</th>
                                <!-- <th scope="col">state</th> -->
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dao = new dao();

                            $data = $dao->ListTasks();
                            $i = 0;
                            foreach ($data as $task) {
                                $i += 1;
                            ?>


                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <?php if ($task->state == 0) { ?>
                                        <td><?php echo $task->task_label ?> ☑️ </td>
                                    <?php } else { ?>
                                        <td><del><?php echo $task->task_label ?></del> ✅ </td>
                                    <?php } ?>
                                    <!-- Uncomment if you wanna display the state , put here just for testing purposes -->
                                    <!-- <td><?php echo $task->state ?> </td> -->
                                    <td>
                                        <form action="srvr/processingAgain.php" method="post">
                                            <input type="hidden" name="task_id" value="<?php echo $task->task_id ?>">
                                            <button class="btn bg-transparent" name="delete" type="submit">🗑️</button>
                                            <button class="btn bg-transparent" name="done" type="submit">💪</button>
                                        </form>
                                    </td>

                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</body>

</html>