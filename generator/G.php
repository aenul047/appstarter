<?php
$table = "pengda";
$id_table = "id";

// Berhasil generate file berdasarkan tabel database
$mysqli = new mysqli("localhost", "root", "", "event");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SHOW COLUMNS FROM " . $table;
$result = $mysqli->query($query);

if (empty($result)) echo "Table tidak ditemukan";

while ($row = $result->fetch_array()) {
    $rows[] = $row[0];
}

// Model
$models = '';
foreach ($rows as $row => $value) {
    $models .= '"' . $value . '",';
}

$fileModel = file_get_contents("Model.php");
$replace = str_replace('Table', $table, $fileModel);
file_put_contents('../app/Models/' . $table . "Model.php", $replace);

$fileModel = file_get_contents('../app/Models/' . $table . "Model.php");
$replace = str_replace('Primary', $id_table, $fileModel);
file_put_contents('../app/Models/' . $table . "Model.php", $replace);

$fileModel = file_get_contents('../app/Models/' . $table . "Model.php");
$replace = str_replace("'fields'", $models, $fileModel);
file_put_contents('../app/Models/' . $table . "Model.php", $replace);

// Controller
$file = file_get_contents("Controller.php");
$replace = str_replace('Generator', $table, $file);
file_put_contents('../app/Controllers/' . $table . "Controller.php", $replace);

$save = '';
foreach (array_slice($rows, 1) as $row => $value) {
    $save .= '"' . $value . '" => $this->request->getVar("' . $value . '"),' . "\n";
}

$fileModel = file_get_contents('../app/Controllers/' . $table . "Controller.php");
$replace = str_replace("SAVE", $save, $fileModel);
file_put_contents('../app/Controllers/' . $table . "Controller.php", $replace);

// View
$dir = "../app/Views/" . $table;
$dirT = "../app/Views/template";

if (is_dir($dir) == false) {
    mkdir($dir);
}

if (is_dir($dirT) == false) {
    mkdir($dirT);
}

if (is_dir($dir) == true && is_dir($dirT) == true) {

    $thead = '';
    foreach (array_slice($rows, 1) as $row => $value) {
        $thead .= '<th scope="col" class="text-center">' . $value . '</th>' . "\n";
    }

    $file = file_get_contents("Views/index.php");
    $replace = str_replace('THEAD', $thead, $file);
    file_put_contents('../app/Views/' . $table . "/index.php", $replace);

    $tbody = '';
    foreach ($rows as $row => $value) {
        $tbody .= '<td class="text-center"><?= $p["' . $value . '"]; ?></td>' . "\n";
    }
    $tbody .= '
        <td class="text-center">
            <a href="/VariableController/update/<?= $p["' . $rows[0] . '"]; ?>" class="btn btn-warning">Edit</a>
            <a href="/VariableController/detail/<?= $p["' . $rows[0] . '"]; ?>" class="btn btn-success">Detail</a>
            <a href="/VariableController/delete/<?= $p["' . $rows[0] . '"]; ?>" class="btn btn-danger">Delete</a>
        </td>
    ';
    $file = file_get_contents('../app/Views/' . $table . "/index.php");
    $replace = str_replace('TBODY', $tbody, $file);
    file_put_contents('../app/Views/' . $table . "/index.php", $replace);

    $file = file_get_contents('../app/Views/' . $table . "/index.php");
    $replace = str_replace('Variable', $table, $file);
    file_put_contents('../app/Views/' . $table . "/index.php", $replace);

    // $file = file_get_contents("Views/template.php");
    // $replace = str_replace('TITLE', $table, $file);
    // file_put_contents('../app/Views/template/template.php', $replace);

    // Add View
    $addForm = '';
    foreach (array_slice($rows, 1) as $row => $value) {
        $addForm .= '
        <div class="form-group row">
            <label for="' . $value . '" class="col-sm-2 ml-4 col-form-label">' . $value . '</label>
            <div class="col-sm-9">
                <input type="text" class="form-control <?= ($validation->hasError("' . $value . '")) ? "is-invalid" : ""; ?>" id="' . $value . '" name="' . $value . '" autofocus value="<?= old("' . $value . '"); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError("' . $value . '"); ?>
                </div>
            </div>
        </div>' . "\n";
    }

    $file = file_get_contents("Views/add.php");
    $replace = str_replace('FORM', $addForm, $file);
    file_put_contents('../app/Views/' . $table . "/add.php", $replace);

    $file = file_get_contents('../app/Views/' . $table . "/add.php");
    $replace = str_replace('Variable', $table, $file);
    file_put_contents('../app/Views/' . $table . "/add.php", $replace);

    // Update Views
    $update = '';
    foreach (array_slice($rows, 1) as $row => $value) {
        $update .= '<input type="hidden" name="id" value="<?= $' . $table . '["' . $id_table . '"]; ?>">
                <div class="form-group row">
                    <label for="' . $value . '" class="col-sm-2 ml-4 col-form-label">' . $value . '</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError("' . $value . '")) ? "is-invalid" : ""; ?>" id="' . $value . '" name="' . $value . '" autofocus value="<?= (old("' . $value . '")) ? old("' . $value . '") : $' . $table . '["' . $value . '"] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("' . $value . '"); ?>
                        </div>
                    </div>
                </div>' . "\n";
    }

    $file = file_get_contents("Views/update.php");
    $replace = str_replace('UPDATE', $update, $file);
    file_put_contents('../app/Views/' . $table . "/update.php", $replace);

    $file = file_get_contents('../app/Views/' . $table . "/update.php");
    $replace = str_replace('Variable', $table, $file);
    file_put_contents('../app/Views/' . $table . "/update.php", $replace);

    // Save Update
    $saveUpdate = '';
    foreach ($rows as $row => $value) {
        $saveUpdate .= '"' . $value . '" => $this->request->getVar("' . $value . '"),' . "\n";
    }

    $fileModel = file_get_contents('../app/Controllers/' . $table . "Controller.php");
    $replace = str_replace("STORE", $saveUpdate, $fileModel);
    file_put_contents('../app/Controllers/' . $table . "Controller.php", $replace);

    // Detail
    $detail = '';
    foreach ($rows as $row => $value) {
        $detail .= '<li class="list-group-item"><b>' . $value . '":</b><?= $' . $table . '["' . $value . '"];?><li>' . "\n";
    }

    $file = file_get_contents("Views/detail.php");
    $replace = str_replace('DETAIL', $detail, $file);
    file_put_contents('../app/Views/' . $table . "/detail.php", $replace);

    $file = file_get_contents('../app/Views/' . $table . "/detail.php");
    $replace = str_replace('Variable', $table, $file);
    file_put_contents('../app/Views/' . $table . "/detail.php", $replace);
}
/* free result set */
$result->close();

/* close connection */
$mysqli->close();
