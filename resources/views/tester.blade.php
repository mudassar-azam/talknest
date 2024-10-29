
<html>
<body>


<form action="/stock-data" method='get' >
    <input type="text" id="searchInput" placeholder="Search for a stock">
    <button id="searchButton">Search</button>
</form>

<div id="stockDetails"></div>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('#searchButton').click(function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            var searchTerm = $('#searchInput').val();

            $.ajax({
                url: '/stock-data?searchTerm=' + searchTerm,
                type: 'GET',
                success: function(data) {
                    if(data.length > 0) {
                        var stock = data[0];
                        var details = 'Company: ' + stock.name + '<br>' +
                            'Symbol: ' + stock.symbol + '<br>' +
                            'Price: ' + stock.price + '<br>' +
                            'Change: ' + stock.change + '<br>' +
                            'Change %: ' + stock.changesPercentage + '<br>';
                        $('#stockDetails').html(details);
                    } else {
                        $('#stockDetails').html('No stock found');
                    }
                },
                error: function() {
                    $('#stockDetails').html('Error fetching stock details');
                }
            });
        });
    });

</script>


</body>
</html>


