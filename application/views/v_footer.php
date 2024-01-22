<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>



<?php 
$dari = isset($_GET['dari']) && strtotime($_GET['dari']) !== false ? date("d-m-Y", strtotime($_GET['dari'])) : null;
$ke = isset($_GET['ke']) && strtotime($_GET['ke']) !== false ? date("d-m-Y", strtotime($_GET['ke'])) : null;

$title = $title; 

if ($dari && $ke) {
    $title .= "\n\n Tanggal : " . $dari . ' sampai : ' . $ke;
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        var fromDate = <?php echo json_encode($dari); ?>;
        var toDate = <?php echo json_encode($ke); ?>;
        var title = <?php echo json_encode($title); ?>;

        title = title.replace(/\\n/g, '\n');

        var table = $('#myTable').DataTable({
            buttons: [{
                    extend: 'copyHtml5',
                    footer: true,
                    title: title
                },
                {
                    extend: 'csvHtml5',
                    footer: true,
                    title: title
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    title: title
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    title: title
                },
                {
                    extend: 'print',
                    footer: true,
                    title: title
                }
            ],
            dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            scrollX: true,
            autoWidth: true
        });

        table.buttons().container().appendTo('#table_wrapper .col-md-5:eq(0)');
    });
</script>



<!-- <script type="text/javascript">
	$(document).ready(function() {
		var table = $('#myTable').DataTable( {
			buttons: [
			{
				extend: 'copyHtml5',
				footer: true
			},
			{
				extend: 'csvHtml5',
				footer: true
			},
			{
				extend: 'excelHtml5',
				footer: true
			},
			{
				extend: 'pdfHtml5',
				footer: true
			},
			{
				extend: 'print',
				footer: true
			}
			],
			dom: 
			"<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
			"<'row'<'col-md-12'tr>>" +
			"<'row'<'col-md-5'i><'col-md-7'p>>",
			lengthMenu:[
			[10,25,50,100,-1],
			[10,25,50,100,"All"]
			],
			scrollX: true,
			autoWidth: true
		} );

		table.buttons().container()
		.appendTo( '#table_wrapper .col-md-5:eq(0)' );
	} );
</script> -->

<!-- Select2 -->
<script src="<?php echo base_url('plugin/select2/js/select2.full.min.js'); ?>"></script>

<script>
	$(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
      	theme: 'bootstrap4'
      })
  })
</script>

<script>
	function formatRupiah(input, resultId) {
        var formatTitik = input.value.replace(/\D/g, ''); // Hapus semua karakter selain angka
        var formattedValue = '';

        if (formatTitik.length > 0) {
        	formattedValue = (parseInt(formatTitik, 10)).toLocaleString("id-ID");
        }

        // Tampilkan yang diformat dengan tanda titik
        input.value = formattedValue;

        // Simpan yang tanpa tanda titik ke input hidden
        document.getElementById(resultId).value = formatTitik;
    }
</script>

<script>
	function formatRupiah2(input, resultId) {
        var formatTitik = input.value.replace(/\D/g, ''); // Hapus semua karakter selain angka
        var parsedValue = parseFloat(formatTitik) / 100; // Konversi ke float dan bagi 100
        var formattedValue = '';

        if (!isNaN(parsedValue)) {
            // Tambahkan dua angka di belakang koma
            formattedValue = parsedValue.toLocaleString("id-ID", { minimumFractionDigits: 2 });
        }

        // Tampilkan yang diformat dengan tanda titik
        input.value = formattedValue;

        // Simpan yang tanpa tanda titik ke input hidden
        document.getElementById(resultId).value = parsedValue;
    }
</script>

<script>
	document.getElementById('toggleForm').addEventListener('click', function() {
		var form = document.getElementById('pengurangan_listing1');

		if (form.style.display === 'none') {
			form.style.display = 'block';
		} else {
			form.style.display = 'none';
		}
	});
</script>

<script>
	document.getElementById('toggleForm2').addEventListener('click', function() {
		var form = document.getElementById('pengurangan_selling1');

		if (form.style.display === 'none') {
			form.style.display = 'block';
		} else {
			form.style.display = 'none';
		}
	});
</script>

<script>
	document.getElementById('toggleForm3').addEventListener('click', function() {
		var form = document.getElementById('pengurangan_listing2');

		if (form.style.display === 'none') {
			form.style.display = 'block';
		} else {
			form.style.display = 'none';
		}
	});
</script>

<script>
	document.getElementById('toggleForm4').addEventListener('click', function() {
		var form = document.getElementById('pengurangan_selling2');

		if (form.style.display === 'none') {
			form.style.display = 'block';
		} else {
			form.style.display = 'none';
		}
	});
</script>

<script>
	document.getElementById('toggleForm5').addEventListener('click', function() {
		var form = document.getElementById('pengurangan_afw1');

		if (form.style.display === 'none') {
			form.style.display = 'block';
		} else {
			form.style.display = 'none';
		}
	});
</script>

<script>
	document.getElementById('toggleForm6').addEventListener('click', function() {
		var form = document.getElementById('pengurangan_afw2');

		if (form.style.display === 'none') {
			form.style.display = 'block';
		} else {
			form.style.display = 'none';
		}
	});
</script>

<script>
	document.getElementById('toggleForm7').addEventListener('click', function() {
		var form = document.getElementById('pengurangan_afw3');

		if (form.style.display === 'none') {
			form.style.display = 'block';
		} else {
			form.style.display = 'none';
		}
	});
</script>

<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

</html>
