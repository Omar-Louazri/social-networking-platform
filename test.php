<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="./css/montiony.css">

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="./js/mentiony.js"></script>
</head>
<body>
    <textarea class="mentions" name="text"></textarea>
    


    <script>
        $('.mentions').mentionsInput({
            source: [
                {value: 'alex', uid: 'user:1'},
                {value: 'andrew', uid: 'user:2'},
                {value: 'angry birds', uid: 'game:5'},
                {value: 'assault', uid: 'game:3'}
            ], 
            showAtCaret: true
        });
    </script>
</body>