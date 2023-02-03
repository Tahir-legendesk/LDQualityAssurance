<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<script src="assets/js/app.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script> 
{{-- <script>

    // search();

    function search() {
        var keyword = jQuery('#search').val();
        if ( keyword.length === 0 ) {

            $.post('{{ route('leader.search') }}', {
                _token: $('#token').val(),
                keyword: 'all_data'
            },
            function(data) {
                table_post_row(data);
             
            });

        }else{

            $.post('{{ route('leader.search') }}', {
                _token: $('#token').val(),
                keyword: keyword
            },
            function(data) {
                table_post_row(data);
            });


        }
    }

    
    function live_search(){
         search();
    }

    search();

    // table row with ajax
    function table_post_row(res) {
        console.log(res);
        let htmlView = '';
        if (res.leaders.length <= 0) {
            htmlView += `
           <tr>
              <td colspan="4">No data.</td>
          </tr>`;
        }
        $('tbody').empty();
        for (let i = 0; i < res.leaders.length; i++) {
            htmlView += '<tr><td>' + res.leaders[i].name + '</td><td>' + res.leaders[i].team.name + '</td><td>'+ res.leaders[i].email + '</td> <td>' + res.leaders[i].phone + '</td><td>' + res.leaders[i].gender + '</td><td>' + res.leaders[i].age + '</td><td>' + res.leaders[i].address + '</td><td><div class="button-items"><a href="/admin/leader/'+res.leaders[i].id+'/detail" class="btn btn-outline-warning waves-effect"> <i class="bx bxs-show font-size-16 "></i></a><a href="/admin/leader/'+res.leaders[i].id+'/edit"class="btn btn-outline-success waves-effect"><i class="bx bxs-pencil font-size-16 "></i></a><a href="/admin/leader/'+res.leaders[i].id+'/delete" class="btn btn-outline-danger waves-effect"><i class="bx bxs-trash font-size-16 "></i></a></div></td></tr>';
            }
        $('tbody').html(htmlView);
        
        var keyword = $('#search').val();
      
            
       
    }
</script> --}}