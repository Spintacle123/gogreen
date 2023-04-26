<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css?ver=0.6">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=0.6" rel="stylesheet">
        <link href="vendor/Trumbowyg/dist/ui/trumbowyg.min.css?ver=0.6" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="vendor/Trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.css?ver=0.6">
        <style>
            body{
                background: #ccc;

            }

            form{
                background: #fff;
                padding: 20px;
            }

            h1{
                margin-top: 0;
                font-size: 25px;
            }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h1>SMTP Email</h1>
                        <a href="#" onclick="$('#server-info').show();">Edit server info</a>
                        <div id="server-info" style="display: none;">

                            <input type="text" id="fromname" placeholder="From Name" value="">
                            <input type="text" id="fromemail" placeholder="From Email" value="">
                            <hr>
                        </div>
                        <p id="multi-responce"></p>
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <textarea class="form-control" id="emails" name="emails" placeholder="Email list" autofocus required></textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="form-group">
                                <textarea id="message" name="message" class="form-control" placeholder="Your Message" rows="5" required></textarea>
                            </div>
                            <button type="button" onclick="multi_email();" class="btn btn-primary btn-lg col-lg-12" id="send">Send Now </button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>



        <!-- Import jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <script src="vendor/Trumbowyg/dist/trumbowyg.min.js" type="text/javascript"></script>
        <script src="vendor/Trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js"></script>
        <script src="vendor/Trumbowyg/dist/plugins/preformatted/trumbowyg.preformatted.js"></script>
        <script src="vendor/Trumbowyg/dist/plugins/colors/trumbowyg.colors.js"></script>
        <script src="main.js" type="text/javascript"></script>
        <script>

                                $('#message')
                                        .trumbowyg({
                                            btns: [
                                                ['highlight', 'viewHTML', 'foreColor', 'backColor', 'undo', 'redo'],
                                                ['formatting', 'strong', 'em', 'del'],
                                                ['link', 'insertImage', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                                                ['unorderedList', 'orderedList', 'horizontalRule', 'fontsize', 'fullscreen']
                                            ],
                                            autogrowOnEnter: true

                                        });
        </script>
    </body>
</html>