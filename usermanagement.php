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
                <h1 class = "text-center">Users Management</h1>
                <form action="" method = "POST">
                    <table class = "table table-hover p-4">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Zip Code</th>
                                <th>Birthdate</th>
                                <th>Email Address</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>   
                        </thead>
                        <tbody class = "bg-light">
                            <?php
                            include_once 'Class/User.php';
                            $u=new User();
                            $data=$u->displayusers();
                                while($row=$data->fetch_assoc()){
                                    echo'
                                        <tr>
                                            <td>'.$row['FirstName'].'</td>
                                            <td>'.$row['MiddleName'].'</td>
                                            <td>'.$row['LastName'].'</td>
                                            <td>'.$row['Address'].'</td>
                                            <td>'.$row['ZipCode'].'</td>
                                            <td>'.$row['Birthdate'].'</td>
                                            <td>'.$row['EmailAddress'].'</td>
                                            <td>'.$row['Password'].'</td>
                                            <td>'.$row['Role'].'</td>
                                            <td>'.$row['Status'].'</td>
                                            <td><button class = "btn btn-shadow-none" type = "submit"><i class = "fas fa-trash"></i></button></td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
