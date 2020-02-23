<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
        <style>
            .container {
            padding-top: 40px;  
        }
        </style>
        
        <script>
            $(document).on('click', '.number-spinner button', function () {    
                var btn = $(this),
                    oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                    newVal = 0;

                if (btn.attr('data-dir') == 'up') {
                    newVal = parseInt(oldValue) + 1;
                } else {
                    if (oldValue > 1) {
                        newVal = parseInt(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                btn.closest('.number-spinner').find('input').val(newVal);
            });
        </script>
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-xs-3 col-xs-offset-3">
                    <div class="input-group number-spinner">
                        <span class="input-group-btn">
                            <button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                        </span>
                        <input type="text" class="form-control text-center" value="1">
                        <span class="input-group-btn">
                            <button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>