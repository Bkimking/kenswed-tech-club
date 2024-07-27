<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
            background-color: #343a40;
        }

        .div_center {
            text-align: center;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <div class="d-flex">
        <!-- Sidebar Navigation-->
        <?php include('sidebar.php'); ?>
        <!-- Sidebar Navigation end-->
        <div class="page-content container">

            <?php
            session_start();
            if (isset($_SESSION['Message'])) {
                echo '
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    ' . $_SESSION['Message'] . '
                </div>';
                unset($_SESSION['Message']);
            }
            ?>

            <h1 class="post_title">
                Add Post
            </h1>

            <div>
                <form action="add_post.php" method="POST" enctype="multipart/form-data">
                    <div class="div_center">
                        <label for="Title">Post Title</label>
                        <input type="text" name="title" placeholder="Enter your Post title" class="form-control" required>
                    </div>

                    <div class="div_center">
                        <label for="Description">Post Description</label>
                        <textarea name="description" placeholder="Enter your description" class="form-control" required></textarea>
                    </div>

                    <div class="div_center">
                        <label for="Image">Add Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                    <div class="div_center">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>

            <?php include('footer.php'); ?>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
