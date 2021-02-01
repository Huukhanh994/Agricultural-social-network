<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail order</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div>
        <div class="col-md-12">
            <p style="text-align: center;color: red">This is automatic mail of system, do not reply this mail. Thanks!!!</p>
            <div class="row">
                <div class="col-md-6">
                    <h1 style="text-align: center;">Agricultural social network shopping</h1>
                </div>
                <div class="col-md-6">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Order ID</th>
                                <th>Photo</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{$orders['order_name']}}</td>
                                <td>#{{$orders['order_number']}}</td>
                                <td> <img src="../assets/images/gallery/chair.jpg" alt="iMac" width="80"> </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$orders['created_at']}}</td>
                                <td> <span class="label label-success font-weight-100">{{$orders['order_status']}}</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip"
                                        title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)"
                                        class="text-inverse" title="Delete" data-toggle="tooltip"><i
                                            class="ti-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>