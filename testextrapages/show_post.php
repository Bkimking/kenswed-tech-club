<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" rel="stylesheet">
    <style>
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
            background-color: #343a40;
        }

        .table_deg {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 30px;
            gap: 70px;
        }

        .th_deg {
            background-color: skyblue;
        }

        .img_deg {
            height: 100px;
            width: 150px;
            padding: 10px;
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
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    ' . $_SESSION['Message'] . '
                </div>';
                unset($_SESSION['Message']);
            }
            ?>

            <h1 class="title_deg">All Posts</h1>
            <table class="table_deg">
                <tr class="th_deg">
                    <th>Post title</th>
                    <th>Description</th>
                    <th>Post By</th>
                    <th>Post status</th>
                    <th>Usertype</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

                <!-- Example of PHP loop to display posts -->
                <?php
                // Assuming $posts is an array of objects fetched from database
                foreach ($posts as $post) {
                    echo '
                    <tr>
                        <td>' . $post->title . '</td>
                        <td>' . $post->description . '</td>
                        <td>' . $post->name . '</td>
                        <td>' . $post->post_status . '</td>
                        <td>' . $post->usertype . '</td>
                        <td>
                            <img src="postimage/' . $post->image . '" class="img_deg">
                        </td>
                        <td>
                            <a href="delete_post.php?id=' . $post->id . '" onclick="confirmation(event)" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="edit_post.php?id=' . $post->id . '" class="btn btn-success">Edit</a>
                        </td>
                    </tr>';
                }
                ?>

            </table>

            <?php include('footer.php'); ?>
        </div>
    </div>

    <!-- Bootstrap JS and SweetAlert JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        function confirmation(event) {
            event.preventDefault();

            const urlToRedirect = event.currentTarget.getAttribute('href');

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this post!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>

</body>

</html>
