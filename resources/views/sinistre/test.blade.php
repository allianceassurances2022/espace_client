<!doctype html>
<html>

<body>
    <input id="name" type="text">
    <input type="button" id="submitid" class="next action-button" value="Suivant" />
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery CDN -->
    <script type='text/javascript'>
        $(function() {
            //  $('#submitid').on('click', function() {


            //  var vid = $("#vid").val();
            //var id=$(this).data('id');

            $.ajax({

                type: "get",
                url: '{{ route('ajaxdata') }}',
                dataType: 'json',
                /*   data: {
                       id: $("#vid").val()
                   }, // the value of input having id vid
                   */

                success: function(data) { // What to do if we succeed
                    $('#name').val(data.created_at);
                    //  $('#name').val(JSON.parse(response)[0].name); //<---- This line,
                    console.log(data.created_at);

                }
            });
        });
    </script>
</body>

</html>
