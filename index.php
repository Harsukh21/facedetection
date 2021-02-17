<!DOCTYPE html>
<html>
<head>
	<title>Face Detectioin - LaravelCode</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="facedetection.js"></script>
	<style type="text/css">
		 .picture-container {
            position: relative;
            width: 600px;
            height: auto;
            margin: 20px auto;
            border: 10px solid #fff;
            box-shadow: 0 5px 5px #000;
        }
        .picture {
            display: block;
            width: 100%;
            height: auto;
        }
		.face {
            position: absolute;
            border: 2px solid #FFF;
        }
	</style>
</head>
<body>
	<img id="picture" src="faces.jpg">
	<br />
	<a href="#" id="try-it">Click Here...</a>
	<script>
	    $('#try-it').click(function (e) {
            e.preventDefault();

            $('.face').remove();

            $('#picture').faceDetection({
                complete: function (faces) {                        
                    for (var i = 0; i < faces.length; i++) {
                        $('<div>', {
                            'class':'face',
                            'css': {
                                'position': 'absolute',
                                'left':     faces[i].x * faces[i].scaleX + 'px',
                                'top':      faces[i].y * faces[i].scaleY + 'px',
                                'width':    faces[i].width  * faces[i].scaleX + 'px',
                                'height':   faces[i].height * faces[i].scaleY + 'px'
                            }
                        })
                        .insertAfter(this);
                    }
                },
                error:function (code, message) {
                    alert('Error: ' + message);
                }
            });
        });
	</script>
</body>
</html>