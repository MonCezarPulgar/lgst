<html>
    <head>
        <title>PremTranslate: Langauge Translator</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            .main-container {
                flex: 1;
                display: flex;
            }
            .sidebar {
                width: 250px; /* Adjust this width as needed */
                background-color: #f8f9fa;
                padding: 20px;
            }
            .content {
                flex: 1;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div main-container>
            <div class="sidebar">
                <?php include_once 'trial.php'; ?>
            </div>
            <div class = "content">
                <h1 class = "text-center">Plan Management</h1>
                <form action="" method = "POST">
                    <table class = "table table-hover p-4">
                        <thead class = "bg-info">
                            <tr>
                                <th>Plan ID</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Description</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody class = "bg-light">
                            <?php
                            include_once 'Class/User.php';
                            $u=new User();
                            $data=$u->displayplan();
                                while($row=$data->fetch_assoc()){
                                    echo'
                                        <tr>
                                            <td>'.$row['PlanId'].'</td>
                                            <td>'.$row['PlanName'].'</td>
                                            <td>'.$row['Price'].'</td>
                                            <td>'.$row['Duration'].'</td>
                                            <td>'.$row['Description'].'</td>
                                            <td><button type = "button" class = "btn shadow-none" data-bs-toggle="modal" data-bs-target="#UpdateModal" onclick="displayplan(&quot;'.$row['PlanId'].'&quot;,&quot;'.$row['PlanName'].'&quot;,&quot;'.$row['Price'].'&quot;,&quot;'.$row['Duration'].'&quot;,&quot;'.$row['Description'].'&quot;)"><i class = "fas fa-pen-to-square ms-2 text-dark"></i></button></td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                    <!-- Modal for Update Plan-->
                    <div class="modal fade" id="UpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="staticBackdropLabel"><b><i class = "fas fa-user ms-2"></i> Update Plan</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="planid" class="form-label">Plan ID</label>
                                <input type="text" name="planid" id="planid" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="planname" class="form-label">Plan Name</label>
                                <input type="text" name="planname" id="planname" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="duration" class="form-label">Duration</label>
                                <select name="duration" id="duration" class="form-control">
                                    <option value="" selected disabled>Select Duration</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="1 Year">1 Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="desc" class="form-label">Description</label>
                                <textarea id="desc" name="desc" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name = "btnupdate" class="btn btn-info rounded-pill text-white"><i class="fas fa-pen-to-square ms-2 text-dark"></i> Update</button>
                                    <button type="submit" name = "btndelete" class="btn btn-danger rounded-pill"><i class="fas fa-trash ms-2 text-dark"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<script>
    function displayplan(planid,planname,price,duration,desc){
        document.getElementById("planid").value=planid;
        document.getElementById("planname").value=planname;
        document.getElementById("price").value=price;
        document.getElementById("duration").value=duration;
        document.getElementById("desc").value=desc;
    }
</script>