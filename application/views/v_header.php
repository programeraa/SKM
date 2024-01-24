<?php include "session_identitas.php"; ?>
<!doctype html>
    <html lang="en">

    <head>
        <title><?php echo $title; ?></title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

        <script src="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css"></script>
        
        <script src="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css"></script>


        <!-- Datatable CSS -->
        <!-- <link href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.3/b-2.3.5/datatables.min.css" rel="stylesheet"/> -->
        <link href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/datatables.min.css" rel="stylesheet"/>

        <!-- jQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Datatable JS -->
        <!-- <script src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.3/b-2.3.5/datatables.min.js"></script> -->
        <script src="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/datatables.min.js"></script>

        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url('plugin/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">

        <link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url('web_print.css'); ?>">

        <!-- Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <style type="text/css">
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh; /* Set the body to be at least the height of the viewport */
                margin: 0;
            }

            footer {
                margin-top: auto; /* Push the footer to the bottom */
            }

            /*.table th:first-child,
            .table td:first-child {
              position: sticky;
              left: 0;
              background-color: #f8f9fa;
          }*/

          .myTable {
              max-width: 600px;
              margin: 0 auto;
          }

          #myTable th, td {
              white-space: nowrap;
          }

          .dataTables_scroll {
            overflow: auto !important;
        }

        #myTable {
            width: 100% !important;
        }

        thead th.sticky {
          position: sticky !important;
      }

      .myTable .sticky{
        position: sticky;
        left: 0;
        background-color: #f8f9fa;
        z-index: 2;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
     bottom: .5em;
 }

 @media print {
    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-6 {
        width: 50%;
    }
}
</style>

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="">A&A INDONESIA</a>
            <a class="navbar-brand mr-0" href="<?= base_url('Komisi');?>"><?= $nama ?> - <?= $level_asli; ?></a>
        </div>
    </nav>