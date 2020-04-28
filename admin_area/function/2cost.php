<div class="container">
    <h1 class = "jumbotron text-center">2 Wheeler Parking Cost</h1>
    <table class="table table-striped table-bordered">
        <br>
        <thead>
          <tr>
            <th scope="col">Time</th>
            <th scope="col">Cost</th>
          </tr>
        </thead>
        <tbody>
            <?php 
                $admin_username = $_SESSION['username'];
                $shop_name = strtolower($admin_username);
                $shop_name = $shop_name."_price";

                $flag = 0;    
                $query = "select * from $shop_name where flag='$flag'";
                $run_query = mysqli_query($conn, $query);
                while ($row_query = mysqli_fetch_array($run_query))
                {
                    $min = $row_query['minutes'];
                    
                    $price = $row_query['price'];
            ?>
            <tr>
                <td><?php echo $min ?></td>
                <td><?php echo $price ?></td>   
            </tr>
        <?php } ?>
        </tbody>
      </table>
</div>
