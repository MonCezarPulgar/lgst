<html>
    <head>
        <title>PremTranslate: Language Tanslator</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    </head>
    <body>
        <form action="" method = "POST">
            <div class = "container p-4 bg-light mt-2">
            <h1 class = "text-center">Adding Plan</h1>
                <div class = "row">
                    <div class = "col-md-6">
                        <label>Plan ID</label>
                        <input type="text" name = "planid" id = "planid" class = "form-control">
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-md-4">
                        <label>Plan Name</label>
                        <input type="text" name = "planname" id = "planname" class = "form-control">
                    </div>
                    <div class = "col-md-4">
                        <label>Price</label>
                        <input type="number" name = "price" id = "price" class = "form-control">
                    </div>
                    <div class = "col-md-4">
                        <label>Price</label>
                        <select name="duration" id = "duration" class = "form-control">
                            <option></option>
                            <option>1 Month</option>
                            <option>6 Months</option>
                            <option>1 Year</option>
                        </select>
                    </div>
                    <div class = "col-md-4">
                        <label>Description</label>
                        <textarea id="desc" name="desc" rows="4" cols="50"></textarea>
                    </div>
                </div>
                <div class = "col-md-3 mt-3">
                    <button type = "submit" name = "btnadd" class = "btn btn-success">Add Plan</button>
                </div>
            </div>
        </form>
    </body>
</html>