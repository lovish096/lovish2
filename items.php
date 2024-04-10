<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Tim hortons</title>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        function showCongratulations() {
  var popup = document.getElementById("popup");
  popup.style.display = "block";
  
  setTimeout(function() {
    popup.style.display = "none";
  }, 1500);
}
       
    </script>
<style>
    .menu { display: flex;}
    table tr td:last-child {
    width: 270px;
}

</style>
</head>

<body>
<section>
    <ol>
        <li class="sign"><a href="index.php">Home</a></li>
        <li class="sign"><a href="items.php">Items</a></li>
        <li class="sign"><a href="me.html">About</a></li>
        <li class="sign"><a href="resources.html">Resources</a></li>
</section>
<h3> Tim Hortons Drinks</h3>
<p>Tim Hortons offers a variety of beverages ranging from coffee to specialty drinks.
     Here's a definition for some of the popular Tim Hortons drinks:</p>
<dl>
<dt>Coffee </dt>
<dd>Tim Hortons is renowned for its coffee, offering a range of options including regular coffee, 
    decaf, and dark roast. They also offer flavored coffees such as French Vanilla and Hazelnut</dd>
<dt>Double Double</dt>
<dd>A famous Tim Hortons specialty, the Double Double refers to a coffee with two creams and 
    two sugars. It's a popular choice for many regular customers.</dd>
<dt>Hot Chocolate</dt>
<dd>A comforting beverage made with rich chocolate and steamed milk, often topped with whipped cream.</dd>
</dl>
<article class="menu">
<nav>
<img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://images.unsplash.com/photo-1626201628988-0a5d4788acb9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjN8fGJsYWNrYmVycnklMjBEUklOS3xlbnwwfHwwfHx8MA%3D%3D"
height="700px">
    </nav>
    <nav>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h4>Our item details here</h4>
                        <a href="create.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add New order detail</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM items";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>item</th>";
                            echo "<th>price</th>";
                            echo "<th>order it</th>";
                           echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['item'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>";
                               echo  '<a href="javascript:void(0);" onclick="showCongratulations()">Order item</a>';
                                echo "</td>";
                                echo "<td>";
                                echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View item" data-toggle="tooltip"> read</a>';
                                echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update item" data-toggle="tooltip"> edit</a>';
                                echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete item" data-toggle="tooltip"> delete</a>';
                                echo "</td>";

                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="popup" style="display: none;">
  <p>Congratulations! Your order is comming soon!</p>
</div>
                </nav>
    

</article>
    
</body>
</html>


