<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#myTable').DataTable( {
			buttons: [ 'copy','csv', 'excel', 'pdf', 'print'],
			dom: 
			"<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
			"<'row'<'col-md-12'tr>>" +
			"<'row'<'col-md-5'i><'col-md-7'p>>",
			lengthMenu:[
			[10,25,50,100,-1],
			[10,25,50,100,"All"]
			]
		} );

		table.buttons().container()
		.appendTo( '#table_wrapper .col-md-5:eq(0)' );
	} );
</script>

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

<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

</html>
