<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, Bootstrap Table!</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" rel="stylesheet">






   
     
 
   
  </head>
  <body>
   <table id="table"
data-show-print="true"
   >
  <thead>
    <tr>
      <th >ID</th>
      <th >Item Name</th>
      <th >Item Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>ID</td>
      <td>Item Name</td>
      <td>Item Price</td>
    </tr>
  </tbody>
</table>

<script src="vendor/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/print/bootstrap-table-print.min.js"></script>
<script>
  var $table = $('#table')

  $(function() {
    var data = [
     
    ]
    $table.bootstrapTable({data: data})
  })
</script>
   
  </body>
</html>