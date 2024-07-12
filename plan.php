<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PremTranslate: Language Translator</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8T94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        <div class="main-container">
            <div class="sidebar">
                <?php include_once 'trial.php'; ?>
            </div>
            <div class="content">
                <form action="" method="POST">
                    <?php
                        include 'generateid.php';
                        $planID = generatePlanID();
                    ?>
                    <div class="container p-4 bg-light mt-2">
                        <h1 class="text-center">Adding Plan</h1>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="planid" class="form-label">Plan ID</label>
                                <input type="text" name="planid" id="planid" class="form-control" value="<?php echo $planID; ?>" readonly>
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
                        <div class="col-md-3 mt-3">
                            <button type="submit" name="btnadd" class="btn btn-success">Add Plan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
