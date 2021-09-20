<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 Datatables Example - positronx.io</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="mt-3">
            <table class="table table-bordered" id="users-data">
                <thead>
                    <tr>
                        <th id="id">Id</th>
                        <th id="name">Name</th>
                        <th id="email">Email</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>




</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    var data;
    var table = $('#users-data').DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            url: "<?=base_url('DataTable/index');?>",
            type: "GET",
            data: "<?=base_url('DataTable/index');?>"
        }

    });

    console.log(data);

});
</script>

</html>