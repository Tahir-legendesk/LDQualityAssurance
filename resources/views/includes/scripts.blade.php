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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>


<script>

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
</script>