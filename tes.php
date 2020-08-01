<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type='text/javascript'>
        $(window).load(function() {
            $("#ktp").change(function() {
                console.log($("#ktp option:selected").val());
                if ($("#ktp option:selected").val() == 'Tidak Ada') {
                    $('#no_ktp').prop('hidden', 'true');
                } else {
                    $('#no_ktp').prop('hidden', false);
                }
            });
        });
    </script>
</head>

<body>
    <label style="margin:20px;">
        KTP : <br />
        <select id="ktp" name="ktp" style="margin-left:20px;">
            <option value="Tidak Ada">Tidak Ada</option>
            <option value="Ada">Ada</option>
        </select>

        <input type="text" name="no_ktp" id="no_ktp" value="" hidden />
    </label>
</body>

</html>