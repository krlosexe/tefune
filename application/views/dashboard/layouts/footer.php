		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://luiscordero29.com/" target="_blank">Carlos Cardenas</a></p>
	   </div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='<?= base_url()?>assets/dashboard/js/SidebarNav.min.js' type='text/javascript'></script>

	<!-- DataTables -->
	<script src="<?php echo base_url();?>assets/dashboard/dataTables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/dataTables/js/dataTables.bootstrap.min.js"></script>

	<!-- DataTables EXPORT -->
	<script src="<?php echo base_url();?>assets/dashboard/dataTables-export/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/dataTables-export/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/dataTables-export/js/jszip.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/dataTables-export/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/dataTables-export/js/vfs_fonts.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/dataTables-export/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/dataTables-export/js/buttons.print.min.js"></script>






	<script>
      $('.sidebar-menu').SidebarNav();
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="<?= base_url()?>assets/dashboard/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="<?= base_url()?>assets/dashboard/js/jquery.nicescroll.js"></script>
	<script src="<?= base_url()?>assets/dashboard/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="<?= base_url()?>assets/dashboard/js/bootstrap.js"> </script>
    <script src="<?= base_url()?>assets/dashboard/js/custom.js"></script>
   <script>
      $("#page-wrapper").removeAttr("style");
      $("#page-wrapper").attr("style","height: 1024px");
    </script>



    <script>
    	

    	$('#table1').DataTable({
        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    	
    </script>
</body>
</html>