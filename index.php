<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/favicon.png">
    <title> RubyMaine PHP & MySQL CRUD </title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        button.dt-button.btn-primary{
            background:var(--bs-primary)!important;
            color:white;
        }
    </style>
</head>

<body class="">
<nav class="navbar navbar-expand-lg navbar-light bg-dark bg-gradient">
  <div class="container">
    <a class="navbar-brand text-light text-shadow" href="" target="_blank"><img src="img/RM-CRUD.png" width="1270"> </a>
  </div>
</nav>

    <div class="container py-5 h-100">
        <div class="row">
            <div class="col-md-12" id="msg"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover table-bordered table-striped" id="authors-tbl">
                    <thead>
                        <tr class="bg-dark text-light bg-gradient bg-opacity-150">
                            <th class="px-1 py-1 text-center"> № </th>
                            <th class="px-1 py-1 text-center"> Исмингиз </th>
                            <th class="px-1 py-1 text-center"> Фамилингиз </th>
                            <th class="px-1 py-1 text-center"> Email - Почта манзилингиз </th>
                            <th class="px-1 py-1 text-center"> Туғилган кунингиз </th>
                            <th class="px-1 py-1 text-center"> Ўзгиртиришлар </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="add_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Ходим қўшиш </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="new-author-frm">
                            <div class="form-group">
                                <label for="first_name" class="control-label"> Исми: </label>
                                <input type="text" class="form-control rounded-0" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="control-label"> Фамилияси: </label>
                                <input type="text" class="form-control rounded-0" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label"> Email - Электрон почтаси: </label>
                                <input type="text" class="form-control rounded-0" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="control-label"> Туғилган куни: </label>
                                <input type="date" class="form-control rounded-0" id="birthdate" name="birthdate" required>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="new-author-frm"> Сақлаш </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Чиқиш </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="edit_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Ходимнинг маълумотларини таҳрирлаш! </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="edit-author-frm">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="first_name" class="control-label"> Исми: </label>
                                <input type="text" class="form-control rounded-0" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="control-label"> Фамилияси: </label>
                                <input type="text" class="form-control rounded-0" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label"> Email - Электрон почтаси: </label>
                                <input type="text" class="form-control rounded-0" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="control-label"> Туғилган куни: </label>
                                <input type="date" class="form-control rounded-0" id="birthdate" name="birthdate" required>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="edit-author-frm"> Сақлаш </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Чиқиш </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Ўчиришни тасдиқланг! </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="delete-author-frm">
                            <input type="hidden" name="id">
                            <p> Ушбу ходимни рўйхатдан учирилиб кетишига ишончиз комилми? </p>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" form="delete-author-frm"> Ха, ўчириб юборилсин! </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> Йўқ, рўйхатда қолдириш! </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->
</body>

</html>