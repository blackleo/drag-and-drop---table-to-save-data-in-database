<?php
    require_once 'database.php';
    $sql = "SELECT * FROM table_data";
    $result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-4">
        <h2>Datatable</h2>
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong> Datatable updated.
        </div>
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong> Datatable updated.
        </div>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Q1</th>
                    <th scope="col">Q2</th>
                    <th scope="col">Q3</th>
                    <th scope="col">Q4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td scope="row"><?php echo $row['id'] ?></td>
                                <td data-id="q1" id="<?php echo $row['id'] ?>" draggable="true" class="box">
                                    <span id="editor" contentEditable="true"><?php echo $row['q1'] ?></span>
                                </td>
                                <td data-id="q2" id="<?php echo $row['id'] ?>" draggable="true" class="box">
                                    <span id="editor" contentEditable="true"><?php echo $row['q2'] ?></span>
                                </td>
                                <td data-id="q3" id="<?php echo $row['id'] ?>" draggable="true" class="box">
                                    <span id="editor" contentEditable="true"><?php echo $row['q3'] ?></span>
                                </td>
                                <td data-id="q4" id="<?php echo $row['id'] ?>" draggable="true" class="box">
                                    <span id="editor" contentEditable="true"><?php echo $row['q4'] ?></span>
                                </td>
                            </tr>
                        <?php    }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="app.js"></script>
  </body>

</html>