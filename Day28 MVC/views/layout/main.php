<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title><?php echo $this->page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="header" style="background:yellow">

        <h1>Header</h1>

    </div>
    <h3 style="color: red"><?php echo $this->error; ?></h3>
    <div class="main" style="border: 1px solid red">
        <h3 style="color:greenyellow"><?php if (isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            }
            ?></h3>
        <h3 style="color: red"><?php if (isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?></h3>
        <?php echo $this->content;?>
    </div>

    <div class="footer" style="background: green">
        <h1>footer</h1>
    </div>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>
