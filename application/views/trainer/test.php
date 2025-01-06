<html>
<head>
    <title>OOP Clone</title>
</head>
<body>
<button>Clone</button>
<div class="one-container">
    <span>1</span>
</div>
<div class="two-container">
    <span>2</span>
</div>
<div class="three-container">
    <span>3</span>
</div>
<div class="container">
    <span class="num">#</span>
    <input class="input-text" type="text">
    <select class="input-select">
        <option selected></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var dataHolder = [];
        $("button").click(function(){
            $(".container").last().clone(true, true).appendTo("body");
        });
        $('.input-select').change(function() {
            var dataKey;
            var one = 0;
            var two = 0;
            var three = 0;
            $('.one-container').empty();
            $('.two-container').empty();
            $('.three-container').empty();
            $('.input-select').each(function() {
                if ($(this).val() == '1') {
                    one++;
                    $('.one-container').append('<input class="data" id="One_' + one + '" type="text" value="' + one + '" placeholder="' + one + '">');
                    console.log('one: ' + one);
                    dataKey = 'One_' + one;
                    $('#One_' + one).val(dataHolder[dataKey]);
                }
                if ($(this).val() == '2') {
                    two++;
                    $('.two-container').append('<input class="data" id="Two_' + two + '" type="text" value="' + two + '" placeholder="' + two + '">');
                    console.log('two: ' + two);
                    dataKey = 'Two_' + two;
                    $('#Two_' + two).val(dataHolder[dataKey]);
                }
                if ($(this).val() == '3') {
                    three++;
                    $('.three-container').append('<input class="data" id="Three_' + three + '" type="text" value="' + three +'" placeholder="' + three + '">');
                    console.log('three ' + three);
                    dataKey = 'Three_' + three;
                    $('#Three_' + three).val(dataHolder[dataKey]);
                }
                // $('#' + dataKey).val(dataHolder[dataKey]);
            });
            $('.data').change(function() {
                var dataKeyIndex = $(this).attr('id');
                dataHolder[dataKeyIndex] = $(this).val();
                console.log(dataKeyIndex + ':' + dataHolder[dataKeyIndex]);
            })
        });
    });
</script>
</body>
</html>
